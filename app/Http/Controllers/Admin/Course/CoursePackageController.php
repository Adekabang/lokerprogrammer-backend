<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CoursePackageRequest;
use App\Models\Course\CoursePackage;
use Yajra\DataTables\Facades\DataTables;

class CoursePackageController extends Controller
{
    // Package page
    public function index()
    {
        $packages = CoursePackage::latest()->get();
        return \view('pages.admin.course.course-package.index', \compact('packages'));
    }

    public function create()
    {
        $model = new CoursePackage();
        return view('pages.admin.course.course-package.form', compact('model'));
    }

    // Processing Modal Add Package
    public function store(CoursePackageRequest $request)
    {
        $data = $request->all();
        $model = CoursePackage::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CoursePackage::findOrFail($id);
        return view('pages.admin.course.course-package.show', compact('model'));
    }

    public function edit($id)
    {
        $model = CoursePackage::findOrFail($id);
        return view('pages.admin.course.course-package.form', compact('model'));
    }

    // Processing Modal Edit Package
    public function update(CoursePackageRequest $request, $id)
    {
        $data = $request->all();
        $item = CoursePackage::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Package
    public function destroy($id)
    {
        $package = CoursePackage::findOrFail($id);
        $package->delete();
    }

    public function dataTable()
    {
        $model = CoursePackage::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('coursePackage.show', $model->id),
                    'url_edit' => route('coursePackage.edit', $model->id),
                    'url_destroy' => route('coursePackage.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
