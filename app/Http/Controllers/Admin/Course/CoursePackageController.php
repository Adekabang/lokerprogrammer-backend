<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CoursePackageRequest;
use App\Models\Course\CoursePackage;

class CoursePackageController extends Controller
{
    // Package page
    public function index()
    {
        $packages = CoursePackage::latest()->get();
        return \view('pages.admin.course.course-package.index', \compact('packages'));
    }

    // Processing Modal Add Package
    public function store(CoursePackageRequest $request)
    {
        $data = $request->all();
        CoursePackage::create($data);

        return redirect('admin/coursePackage')->withToastSuccess('Package has created!');
    }

    // Processing Modal Edit Package
    public function update(CoursePackageRequest $request, $id)
    {
        $data = $request->all();
        $item = CoursePackage::findOrFail($id);
        $item->update($data);

        return redirect('admin/coursePackage')->withToastSuccess('Package has updated!');
    }

    // Processing Delete Package
    public function destroy($id)
    {
        $package = CoursePackage::findOrFail($id);
        $package->delete();

        return redirect('admin/coursePackage')->withToastSuccess('Package has deleted!');
    }
}
