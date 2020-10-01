<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company\CompanyPackage;
use App\Http\Resources\Company\Package as PackageResource;
use Illuminate\Http\Request;

class PackageController extends BaseController
{
    public function index() {
        $package = CompanyPackage::all();
        return $this->sendResponse(PackageResource::collection($package), 'Package Company retrieved successfully.');
    }

    public function show($slug) {
        $package = CompanyPackage::where('slug', $slug)->first();

        if(is_null($package)){
            return $this->sendError('Package Company Not Found. ');
        }
        return $this->sendResponse(new PackageResource($package), 'Package Company retrieved successfully.');
    }
}
