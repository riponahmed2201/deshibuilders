<?php

namespace App\Http\Controllers\Backend\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\LedgerTypeRequest;
use App\Models\LedgerType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LedgerTypeController extends Controller
{
    public function index()
    {
        $results = DB::table('ledger_types')->latest('id')->paginate(10);

        return view('backend.ledger.ledgerType.index', ['results' => $results]);
    }

    public function create()
    {
        return view('backend.ledger.ledgerType.form');
    }

    public function store(LedgerTypeRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            LedgerType::create($input);
            return back()->with('success', 'Ledger type created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = LedgerType::findOrFail($id);
        return view('backend.ledger.ledgerType.form', $data);
    }

    public function update(LedgerTypeRequest $request, $id)
    {
        $data = LedgerType::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.ledgerType.index'))->with('success', 'Ledger type updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $data = LedgerType::findOrFail($request->ledger_type_id);
        $input['status'] = $request->status;

        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()]);
        }

        if ($bug == 0) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
}
