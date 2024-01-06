<?php

namespace App\Http\Controllers\Backend\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\LedgerNameRequest;
use App\Models\LedgerGroup;
use App\Models\LedgerName;
use App\Models\LedgerType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class LedgerNameController extends Controller
{
    public function index()
    {
        $results = DB::table('ledger_names')
            ->leftJoin('ledger_types', 'ledger_names.ledger_type', '=', 'ledger_types.id')
            ->leftJoin('ledger_groups', 'ledger_names.ledger_group', '=', 'ledger_groups.id')
            ->select('ledger_names.*', 'ledger_types.name as ledger_type_name', 'ledger_groups.name as ledger_group_name')
            ->latest('ledger_names.id')->paginate(10);

        return view('backend.ledger.ledgerName.index', ['results' => $results]);
    }

    public function create()
    {
        $data['ledgerTypes'] = LedgerType::latest()->get();
        $data['ledgerGroups'] = LedgerGroup::latest()->get();

        return view('backend.ledger.ledgerName.form', $data);
    }

    public function store(LedgerNameRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            LedgerName::create($input);
            return back()->with('success', 'Ledger name created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['ledgerTypes'] = LedgerType::latest()->get();
        $data['ledgerGroups'] = LedgerGroup::latest()->get();

        $data['editModeData'] = LedgerName::findOrFail($id);

        return view('backend.ledger.ledgerName.form', $data);
    }

    public function update(LedgerNameRequest $request, $id)
    {
        $data = LedgerName::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.ledgerName.index'))->with('success', 'Ledger name updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = LedgerName::findOrFail($request->ledger_name_id);
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
