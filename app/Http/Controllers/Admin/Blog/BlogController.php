<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data_blog=Blog::all();
       
        return view('pages.admin.blog.blog_list.index',compact('data_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=BlogCategory::all();
        return view('pages.admin.blog.blog_list.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([


            'category_id'   => 'required',
            'judul_blog'    => 'required',
            'content_blog'  => 'required',
            'image'         => 'required',

        ]);
        
        
        $image=$request->file('image');
        $new_name = $image->getClientOriginalExtension();
        $image->move(public_path('backend/assets/img/blog'), $new_name);

        Blog::create([

            'category_id'           => $request->category_id,
            'judul_blog'            => $request->judul_blog,
            'slug_blog_id'          => Str::slug($request->judul_blog),
            'content_blog'          => $request->content_blog,
            'image'                 => $new_name

        ]);
          
        return redirect('admin/blog')->withToastSuccess('data blog has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::findOrFail($id);
        $categories=BlogCategory::all();
        return view('pages.admin.blog.blog_list.edit',compact('blog','categories'));
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
        $blog = Blog::findOrFail($id);

        if($request->image !=''){
            $path=public_path().'/backend/assets/img/blog';
            $image = $request->file('image');
             //code for remove old file
             if (isset($blog->image) && file_exists('backend/assets/img/blog/'.$blog->image)) {  
                unlink('backend/assets/img/blog/'.$blog->image);
            }
             //upload new file
          $image = $request->image;
          $filename = $image->getClientOriginalName();
          $image->move($path, $filename);

          $blog->update([
              'category_id'           => $request->category_id,
              'judul_blog'            => $request->judul_blog,
              'slug_blog_id'          => Str::slug($request->category_id),
              'content_blog'          => $request->content_blog,
              'image'                 => $filename
  
          ]);
        }
        
        return redirect('admin/blog')->withToastSuccess('data blog has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_blog=Blog::findOrFail($id);
        $delete_blog->delete();
        return redirect('admin/blog')->withToastSuccess('data blog has Deleted!');
    }
    
}
