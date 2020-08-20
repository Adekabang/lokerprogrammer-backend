<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Category_blog;
use App\Http\Requests\Admin\Blog\CategoryBlogRequest;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class BlogCategorieController extends Controller
{
    public function index()
    {
        $categories = Category_blog::latest()->get();
        return \view('pages.admin.blog.category_blog.index', \compact('categories'));
    }
    public function create()
    {
        $model = new Category_blog();
        return view('pages.admin.blog.category_blog.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryBlogRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = Category_blog::create($data);

        return $model;
    }

    public function edit($id)
    {
        $model = Category_blog::findOrFail($id);
        return view('pages.admin.blog.category_blog.form', compact('model'));
    }

    public function show($id)
    {
        $model = Category_blog::findOrFail($id);
        return view('pages.admin.blog.category_blog.show', compact('model'));
    }

     // Processing Modal Edit Category
     public function update(CategoryBlogRequest $request, $id)
     {
         $data = $request->all();
         $data['slug'] = Str::slug($request->category_name);
         $item = Category_blog::findOrFail($id);
         $item->update($data);
     }

      // Processing Delete Category
    public function destroy($id)
    {
        $category = Category_blog::findOrFail($id);
        $category->delete();
    }


    public function dataTable()
    {
       
            $model = Category_blog::query()->latest();
            return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('category_Blog.show', $model->id),
                    'url_edit' => route('category_Blog.edit', $model->id),
                    'url_destroy' => route('category_Blog.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
        
       
    }
    
}
