<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CategoryCourseRequest;
use App\Models\Course\CategoryCourse;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    // Category page
    public function index()
    {
        $categories = CategoryCourse::latest()->get();
        return \view('pages.admin.course.category.index', \compact('categories'));
    }

    public function create()
    {
        $model = new CategoryCourse();
        return view('pages.admin.course.category.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryCourseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = CategoryCourse::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CategoryCourse::findOrFail($id);
        return view('pages.admin.course.category.show', compact('model'));
    }

    public function edit($id)
    {
        $model = CategoryCourse::findOrFail($id);
        return view('pages.admin.course.category.form', compact('model'));
    }

    // Processing Modal Edit Category
    public function update(CategoryCourseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = CategoryCourse::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = CategoryCourse::findOrFail($id);
        $category->delete();
    }

    public function dataTable()
    {
        $model = CategoryCourse::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('courseCategory.show', $model->id),
                    'url_edit' => route('courseCategory.edit', $model->id),
                    'url_destroy' => route('courseCategory.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
