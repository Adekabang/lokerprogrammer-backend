<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogCategory;
use Illuminate\Support\Str;

class BlogCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=BlogCategory::latest()->get();
        return view('pages.admin.blog.category_blog.categoryBlog',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_name'     => 'required',
        ]);

      $data=$request->all();
      $data['slug']=Str::slug($request->category_name);
      BlogCategory::create($data);
      return redirect('admin/category_Blog')->withToastSuccess('Category blog has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $data=$request->all();
        $data['slug']=Str::slug($request->category_name);
        $item=BlogCategory::findOrFail($id);
        
        $item->update($data);
        return redirect('admin/category_Blog')->withToastSuccess('Category blog has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category_blog=BlogCategory::findOrFail($id);
        $category_blog->delete();
        return redirect('admin/category_Blog')->withToastSuccess('Category blog has Deleted!');
    }
}
