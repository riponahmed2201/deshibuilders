<?php

namespace App\Http\Controllers\Backend\Voucher;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditVoucherRequest;
use App\Models\BankCash;
use App\Models\CreditVoucher;
use App\Models\LedgerName;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CreditVoucherController extends Controller
{
    public function index()
    {
        $results = DB::table('credit_vouchers')->latest('id')->paginate(10);

        return view('backend.voucher.credit.index', ['results' => $results]);
    }

    public function create()
    {
        $data['projects'] = Project::where('status', 'YES')->get();
        $data['ledgerNames'] = LedgerName::where('status', 'YES')->get();
        $data['bankCashes'] = BankCash::where('status', 'YES')->get();

        return view('backend.voucher.credit.form', $data);
    }

    public function store(CreditVoucherRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            CreditVoucher::create($input);
            return back()->with('success', 'Credit voucher created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['projects'] = Project::where('status', 'YES')->get();
        $data['ledgerNames'] = LedgerName::where('status', 'YES')->get();
        $data['bankCashes'] = BankCash::where('status', 'YES')->get();

        $data['editModeData'] = CreditVoucher::findOrFail($id);

        return view('backend.voucher.credit.form', $data);
    }

    public function update(CreditVoucherRequest $request, $id)
    {
        $data = CreditVoucher::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.creditVoucher.index'))->with('success', 'Credit voucher updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $data = CreditVoucher::findOrFail($request->credit_voucher_id);
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
