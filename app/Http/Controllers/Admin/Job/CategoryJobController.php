<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job\CategoryJobRequest;
use App\Models\Job\CategoryJob;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryJobController extends Controller
{
    // Category page
    public function index()
    {
        $categories = CategoryJob::latest()->get();
        return \view('pages.admin.job.category.index', \compact('categories'));
    }

    public function create()
    {
        $model = new CategoryJob();
        return view('pages.admin.job.category.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryJobRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = CategoryJob::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CategoryJob::findOrFail($id);
        return view('pages.admin.job.category.show', compact('model'));
    }

    public function edit($id)
    {
        $model = CategoryJob::findOrFail($id);
        return view('pages.admin.job.category.form', compact('model'));
    }

    // Processing Modal Edit Category
    public function update(CategoryJobRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = CategoryJob::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = CategoryJob::findOrFail($id);
        $category->delete();
    }

    public function dataTable()
    {
        $model = CategoryJob::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('jobCategory.show', $model->id),
                    'url_edit' => route('jobCategory.edit', $model->id),
                    'url_destroy' => route('jobCategory.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
