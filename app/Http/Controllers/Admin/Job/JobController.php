<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job\JobRequest;
use App\Models\Company\Company;
use App\Models\Job\{CategoryJob, Job, JobTag, Tag};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class JobController extends Controller
{
    // Jobs list page
    public function index()
    {
        $jobs = Job::with('category', 'companies')->latest()->get();
        // \dd($jobs);
        return \view('pages.admin.job.index', \compact('jobs'));
    }

    // Form add job
    public function create()
    {
        $category = CategoryJob::all();
        $tags = Tag::all();
        $company = Company::all();
        return \view('pages.admin.job.crud-job.create', \compact('category', 'tags', 'company'));
    }

    // Processing form add a job
    public function store(JobRequest $request)
    {
        // Instance for Job models
        $job = new Job();
        $job->name = $request->job_name;
        $job->slug = Str::slug($request->job_name);
        $job->company_id = $request->company_id;
        $job->status = $request->status;
        $job->category_id = $request->category_id;
        $job->location = $request->location;
        $job->requirement = $request->requirement;
        $job->required_skill = $request->required_skill;
        $job->description = $request->description;
        $job->save();

        $job->tags()->attach($request->tag_id);

        return redirect('admin/job')->withToastSuccess('Job has created!');
    }

    // Show all jobs in the backend
    public function showAll()
    {
        $jobs = Job::latest()->get();
        return \view('pages.admin.job.show', \compact('jobs'));
    }

    // Form edit job
    public function edit($id)
    {
        $categories = CategoryJob::all();
        $tags = Tag::all();
        $company = Company::all();
        $job = Job::with('category', 'companies')->findOrFail($id);
        return \view('pages.admin.job.crud-job.edit', \compact('job', 'categories', 'tags', 'company'));
    }

    // Processing form edit job
    public function update(JobRequest $request, $id)
    {
        $job = Job::findOrFail($id);

        Job::where('id', $id)->update([
            'name' => $request->job_name,
            'slug' => Str::slug($request->job_name),
            'company_id' => $request->company_id,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'requirement' => $request->requirement,
            'required_skill' => $request->required_skill,
            'description' => $request->description
        ]);
        $job->tags()->sync($request->tag_id);

        return redirect('admin/job')->withToastSuccess('Job has updated!');
    }

    // Processing delete job
    public function destroy($id)
    {
        $item =  Job::findOrFail($id);
        $item->delete();

        return redirect('admin/job')->withToastSuccess('Job has deleted!');
    }
}
