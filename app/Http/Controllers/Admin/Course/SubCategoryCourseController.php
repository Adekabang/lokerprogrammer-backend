<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\SubCategoryCourseRequest;
use App\Models\Course\{SubCategoryCourse, CategoryCourse};
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryCourseController extends Controller
{
    // Category page
    public function index()
    {
        $subcategories = SubCategoryCourse::latest()->get();
        return \view('pages.admin.course.subcategory.index', \compact('subcategories'));
    }

    public function create()
    {
        $categories = CategoryCourse::all();
        $model = new SubCategoryCourse();
        return view('pages.admin.course.subcategory.form', compact('model', 'categories'));
    }

    // Processing Modal Add Category
    public function store(SubCategoryCourseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->subcategory_name);
        $model = SubCategoryCourse::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = SubCategoryCourse::with('category')->findOrFail($id);
        return view('pages.admin.course.subcategory.show', compact('model'));
    }

    public function edit($id)
    {
        $categories = CategoryCourse::all();
        $model = SubCategoryCourse::findOrFail($id);
        return view('pages.admin.course.subcategory.form', compact('model', 'categories'));
    }

    // Processing Modal Edit Category
    public function update(SubCategoryCourseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->subcategory_name);
        $item = SubCategoryCourse::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $subcategory = SubCategoryCourse::findOrFail($id);
        $subcategory->delete();
    }

    public function dataTable()
    {
        $model = SubCategoryCourse::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('courseSubCategory.show', $model->id),
                    'url_edit' => route('courseSubCategory.edit', $model->id),
                    'url_destroy' => route('courseSubCategory.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
