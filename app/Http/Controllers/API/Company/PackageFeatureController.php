<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company\CompanyPackageFeature;
use App\Http\Resources\Company\PackageFeatur as PackageFeatureResource;
use Illuminate\Http\Request;

class PackageFeatureController extends BaseController
{
    public function index() {
        $fackageFeature = CompanyPackageFeature::with('companyPackage')->get();
        return $this->sendResponse(PackageFeatureResource::collection($fackageFeature),'Package Feature Company retrieved successfully.');
    }

    public function show($slug){
        $fackageFeature = CompanyPackageFeature::with('companyPackage')->where('slug', $slug)->first();
        
        if (is_null($fackageFeature)) {
            return $this->sendError('Package Feature Company Not Found');
        }

        return $this->sendResponse(new PackageFeatureResource($fackageFeature), 'Package Feature Company retrieved successfully.');
    }
}
