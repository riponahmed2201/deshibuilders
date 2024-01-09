<?php

namespace App\Http\Controllers\Backend\BankCash;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankCashRequest;
use App\Models\BankCash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BankCashController extends Controller
{
    public function index()
    {
        $results = DB::table('bank_cashes')->latest('id')->paginate(10);

        return view('backend.bankCash.index', ['results' => $results]);
    }

    public function create()
    {
        return view('backend.bankCash.form');
    }

    public function store(BankCashRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            BankCash::create($input);
            return back()->with('success', 'Bank cash created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = BankCash::findOrFail($id);
        return view('backend.bankCash.form', $data);
    }

    public function update(BankCashRequest $request, $id)
    {
        $data = BankCash::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.bankCash.index'))->with('success', 'Bank cash updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $data = BankCash::findOrFail($request->bank_cash_id);
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
