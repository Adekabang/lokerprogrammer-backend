<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CategoryCourseRequest;
use App\Models\Course\CategoryCourse;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Category page
    public function index()
    {
        $categories = CategoryCourse::latest()->get();
        return \view('pages.admin.course.category.index', \compact('categories'));
    }

    // Processing Modal Add Category
    public function store(CategoryCourseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        CategoryCourse::create($data);

        return redirect('admin/category')->withToastSuccess('Category has created!');
    }

    // Processing Modal Edit Category
    public function update(CategoryCourseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = CategoryCourse::findOrFail($id);
        $item->update($data);

        return redirect('admin/category')->withToastSuccess('Category has updated!');
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = CategoryCourse::findOrFail($id);
        $category->delete();

        return redirect('admin/category')->withToastSuccess('Category has deleted!');
    }
}
