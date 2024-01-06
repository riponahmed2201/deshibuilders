<?php

namespace App\Http\Controllers\Backend\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\LedgerGroupRequest;
use App\Models\LedgerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LedgerGroupController extends Controller
{
    public function index()
    {
        $results = DB::table('ledger_groups')->latest('id')->paginate(10);

        return view('backend.ledger.ledgerGroup.index', ['results' => $results]);
    }

    public function create()
    {
        return view('backend.ledger.ledgerGroup.form');
    }

    public function store(LedgerGroupRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            LedgerGroup::create($input);
            return back()->with('success', 'Ledger group created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = LedgerGroup::findOrFail($id);
        return view('backend.ledger.ledgerGroup.form', $data);
    }

    public function update(LedgerGroupRequest $request, $id)
    {
        $data = LedgerGroup::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.ledgerGroup.index'))->with('success', 'Ledger group updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = LedgerGroup::findOrFail($request->ledger_group_id);
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
