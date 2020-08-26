<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\CategoryBlog;
use App\Http\Requests\Admin\Blog\CategoryBlogRequest;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class BlogCategorieController extends Controller
{
    public function index()
    {
        $categories = CategoryBlog::latest()->get();
        return \view('pages.admin.blog.category_blog.index', \compact('categories'));
    }
    public function create()
    {
        $model = new CategoryBlog();
        return view('pages.admin.blog.category_blog.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryBlogRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = CategoryBlog::create($data);

        return $model;
    }

    public function edit($id)
    {
        $model = CategoryBlog::findOrFail($id);
        return view('pages.admin.blog.category_blog.form', compact('model'));
    }

    public function show($id)
    {
        $model = CategoryBlog::findOrFail($id);
        return view('pages.admin.blog.category_blog.show', compact('model'));
    }

    // Processing Modal Edit Category
    public function update(CategoryBlogRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = CategoryBlog::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = CategoryBlog::findOrFail($id);
        $category->delete();
    }


    public function dataTable()
    {

        $model = CategoryBlog::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('category-blog.show', $model->id),
                    'url_edit' => route('category-blog.edit', $model->id),
                    'url_destroy' => route('category-blog.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
