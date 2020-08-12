<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url=route('blog.edit',$row->id);
                           $btn = '<a href="'.$url.'" data-toggle="tooltip"  data-id="" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                            return $btn;
                    })
                    ->addColumn('image',function($row){
                        $url= asset('backend/assets/img/blog/'.$row->image);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
       
        return view('pages.admin.blog.blog_list.index');
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

        $data=Blog::create([

            'category_id'           => $request->category_id,
            'judul_blog'            => $request->judul_blog,
            'slug_blog_id'          => Str::slug($request->judul_blog),
            'content_blog'          => $request->content_blog,
            'image'                 => $new_name

        ]);
       
        return redirect('admin/blog')->withToastSuccess('data blog has created!');
        // return response()->json($data);
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
        Blog::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);

    }
    
}
