<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CoursePackageFeatureRequest;
use App\Models\Course\{CoursePackageFeature, CoursePackage};

class CoursePackageFeatureController extends Controller
{
    // Package Feature page
    public function index()
    {
        $packages = CoursePackage::all();
        $features = CoursePackageFeature::with('coursePackge')->latest()->get();
        return \view('pages.admin.course.course-package-feature.index', \compact('features', 'packages'));
    }

    // Processing Modal Add Package Feature
    public function store(CoursePackageFeatureRequest $request)
    {
        $data = $request->all();
        CoursePackageFeature::create($data);

        return redirect('admin/coursePackageFeature')->withToastSuccess('Feature Package has created!');
    }

    // Processing Modal Edit Package Feature
    public function update(CoursePackageFeatureRequest $request, $id)
    {
        $data = $request->all();
        $item = CoursePackageFeature::findOrFail($id);
        $item->update($data);

        return redirect('admin/coursePackageFeature')->withToastSuccess('Feature Package has updated!');
    }

    // Processing Delete Package Feature
    public function destroy($id)
    {
        $package = CoursePackageFeature::findOrFail($id);
        $package->delete();

        return redirect('admin/coursePackageFeature')->withToastSuccess('Feature Package has deleted!');
    }
}
