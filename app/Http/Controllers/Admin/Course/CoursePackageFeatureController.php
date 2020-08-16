<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CoursePackageFeatureRequest;
use App\Models\Course\{CoursePackageFeature, CoursePackage};
use Yajra\DataTables\Facades\DataTables;

class CoursePackageFeatureController extends Controller
{
    // Package Feature page
    public function index()
    {
        $packages = CoursePackage::all();
        $features = CoursePackageFeature::with('coursePackage')->latest()->get();
        return \view('pages.admin.course.course-package-feature.index', \compact('features', 'packages'));
    }

    public function create()
    {
        $packages = CoursePackage::all();
        $model = new CoursePackageFeature();
        return view('pages.admin.course.course-package-feature.form', compact('model', 'packages'));
    }

    // Processing Modal Add Package Feature
    public function store(CoursePackageFeatureRequest $request)
    {
        $data = $request->all();
        $model = CoursePackageFeature::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CoursePackageFeature::with('coursePackage')->findOrFail($id);
        return view('pages.admin.course.course-package-feature.show', compact('model'));
    }

    public function edit($id)
    {
        $packages = CoursePackage::all();
        $model = CoursePackageFeature::with('coursePackage')->findOrFail($id);
        // \dd($model);
        return view('pages.admin.course.course-package-feature.form', compact('model', 'packages'));
    }

    // Processing Modal Edit Package Feature
    public function update(CoursePackageFeatureRequest $request, $id)
    {
        $data = $request->all();
        $item = CoursePackageFeature::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Package Feature
    public function destroy($id)
    {
        $package = CoursePackageFeature::findOrFail($id);
        $package->delete();
    }

    public function dataTable()
    {
        $model = CoursePackageFeature::with('coursePackage')->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('coursePackageFeature.show', $model->id),
                    'url_edit' => route('coursePackageFeature.edit', $model->id),
                    'url_destroy' => route('coursePackageFeature.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
