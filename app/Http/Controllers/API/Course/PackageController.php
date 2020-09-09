<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Course\Package as PackageResource;
use App\Models\Course\CoursePackageFeature;

class PackageController extends BaseController
{

    public function index()
    {
        $packages = CoursePackageFeature::with('coursePackage')->latest()->get();

        return $this->sendResponse(PackageResource::collection($packages), 'Course package retrieved successfully.');
    }

    public function show($id)
    {
        $package = CoursePackageFeature::with('coursePackage')->find($id);

        if (is_null($package)) {
            return $this->sendError('Package not found.');
        }

        return $this->sendResponse(new PackageResource($package), 'Course package retrieved successfully.');
    }
}
