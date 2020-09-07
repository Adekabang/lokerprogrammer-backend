<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CourseTransactionRequest;
use App\Models\Course\{CourseTransaction, CoursePackage};
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class CourseTransactionController extends Controller
{
    
    public function index()
    {   
        $packages = CoursePackage::all();
        $user = User::all();
        $transacationCourse = CourseTransaction::with(['course_package','user'])->get();
        return \view('pages.admin.course.courseTransaction.index', \compact('transacationCourse','packages','user'));
    }


   
    public function show($id)
    {
        
        $model = CourseTransaction::with(['course_package','user'])->findOrFail($id);
        return view('pages.admin.course.courseTransaction.show', compact('model'));
    }

    
    public function edit($id)
    {
        $packages = CoursePackage::all();
        $user = User::all();
        $model = CourseTransaction::with(['course_package','user'])->findOrFail($id);
        return \view('pages.admin.course.courseTransaction.form', \compact('model','packages','user'));
    }

    
    public function update(CourseTransactionRequest $request, $id)
    {
        $item = CourseTransaction::findOrFail($id);
        $item ->transaction_status = $request->transaction_status;
        $item->update();
    }

    
    public function destroy($id)
    {
       
        $courseTransactions = CourseTransaction::findOrFail($id);
        $courseTransactions->delete();
    }

    public function dataTable()
    {
        $model = CourseTransaction::with(['course_package','user'])->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('courseTransaction.show', $model->id),
                    'url_edit' => route('courseTransaction.edit', $model->id),
                    'url_destroy' => route('courseTransaction.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
