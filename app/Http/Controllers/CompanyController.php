<?php

namespace App\Http\Controllers;

use App\Models\Company\CompanyPackage;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_packages = CompanyPackage::with('features')->get();
        return \view('pages.front.company.index', \compact('company_packages'));
    }
}
