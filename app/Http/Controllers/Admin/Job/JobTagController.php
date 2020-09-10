<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job\JobTagRequest;
use App\Models\Job\Tag;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JobTagController extends Controller
{
    // Tag page
    public function index()
    {
        $tags = Tag::latest()->get();
        return \view('pages.admin.job.tag.index', \compact('tags'));
    }

    public function create()
    {
        $model = new Tag();
        return view('pages.admin.job.tag.form', compact('model'));
    }

    // Processing Modal Add Tag
    public function store(JobTagRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tag_name);
        $model = Tag::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = Tag::findOrFail($id);
        return view('pages.admin.job.tag.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Tag::findOrFail($id);
        return view('pages.admin.job.tag.form', compact('model'));
    }

    // Processing Modal Edit Tag
    public function update(JobTagRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tag_name);
        $item = Tag::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Tag
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
    }

    public function dataTable()
    {
        $model = Tag::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('jobTag.show', $model->id),
                    'url_edit' => route('jobTag.edit', $model->id),
                    'url_destroy' => route('jobTag.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
