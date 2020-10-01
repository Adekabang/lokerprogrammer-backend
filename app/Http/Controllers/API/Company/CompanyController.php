<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company\Company;
use App\Http\Resources\Company\Company as CompanyResource;
use App\Http\Resources\Company\SearchCompany;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    public function index(){
        $company = Company::with('category','jobs')->get();
        return $this->sendResponse(CompanyResource::collection($company),'Company retrieved successfully.');
    }
    
    public function show($slug) {
       $company = company::with('category','jobs')->where('slug', $slug)->first();
       
       if (is_null($company)) {
           return $this->sendError('Company not found.');
       }

       return $this->sendResponse(new CompanyResource($company), 'Company retrieved successfully.');
    }

    public function search(Request $request, $keyword)
    {
        $company = company::with('category','jobs')
            ->where('company_name', 'like', "%" . $keyword . "%")
            ->orWhere('location', 'like', '%'. $keyword . '%')
            ->get();
        // ->toArray();
        // return $courses;
        if (is_null($company)) {
            return $this->sendError('Company not found.');
        }

        return $this->sendResponse(new SearchCompany($company), 'Company retrieved successfully.');
    }
}
