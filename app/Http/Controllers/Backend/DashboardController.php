<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LedgerGroup;
use App\Models\LedgerName;
use App\Models\LedgerType;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::count();
        $data['ledgerTypes'] = LedgerType::count();
        $data['ledgerGroups'] = LedgerGroup::count();
        $data['ledgerNames'] = LedgerName::count();

        return view('backend.dashboard.admin-dashboard', $data);
    }
}
