<?php

namespace App\Http\Controllers\Admin\Job;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Job\{JobList, JobCategory};

class JobListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JobList::with(['job_categories'])->select('job_lists.*');
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                    return $btn;
                })
                ->addColumn('requirement_job', function ($row) {
                    $requirement_job = html_entity_decode($row->requirement, ENT_QUOTES, 'UTF-8');

                    return $requirement_job;
                })
                ->addColumn('required_skill_job', function ($row) {
                    $required_skill_job = html_entity_decode($row->required_skill, ENT_QUOTES, 'UTF-8');

                    return $required_skill_job;
                })
                ->addColumn('description_job', function ($row) {
                    $description_job = html_entity_decode($row->description, ENT_QUOTES, 'UTF-8');

                    return $description_job;
                })
                ->rawColumns(['action', 'requirement_job', 'required_skill_job', 'description_job'])
                ->make(true);
        }

        return view('pages.admin.joblist.index');
    }

    public function getCategory()
    {
        $data = JobCategory::all();
        return json_encode(array('data' => $data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        JobList::updateOrCreate(
            ['id' => $request->Item_id],
            [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'requirement' => $request->requirement,
                'required_skill' => $request->required_skill,
                'description' => $request->description,
                'slug' => Str::slug($request->name)
            ]
        );

        return response()->json(['success' => 'Data saved successfully.']);
    }

    public function edit($id)
    {
        $item = JobList::find($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobList::find($id)->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
