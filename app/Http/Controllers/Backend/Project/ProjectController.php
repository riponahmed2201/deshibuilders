<?php

namespace App\Http\Controllers\Backend\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $results = DB::table('projects')->latest('id')->paginate(10);

        return view('backend.project.index', ['results' => $results]);
    }

    public function create()
    {
        return view('backend.project.form');
    }

    public function store(ProjectRequest $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->designation_name);
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            Project::create($input);
            return back()->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Project::findOrFail($id);
        return view('backend.project.form', $data);
    }

    public function update(ProjectRequest $request, $id)
    {
        $data = Project::findOrFail($id);
        $input = $request->all();
        $input['slug'] = Str::slug($request->designation_name);
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('admin.project.index'))->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Project::findOrFail($request->project_id);
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
