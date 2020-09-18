<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
       
        return view('pages.member.setting.index',array('user' => Auth::user()));
    }

    public function update(Request $request, $id)
    {
    
        
        $user = Auth::user()->find($id);
        if ($request->hasFile('images')) {
            $image = $request->file('images');

            if ($image != '') {
                $fileName =$image->getClientOriginalName();
                // Image::make($image)->resize(300, 300)->save( public_path('backend/assets/img/avatar/' . $fileName ));
                $image->move(public_path('backend/assets/img/avatar/'), $fileName);
                $user->email= $request->email;
                $user->password = Hash::make($request->password);
                $user->images = $fileName;
            }
        }
        $user->update();
        return back()->with('success','You have successfully update data profil.');
        
    }

}
