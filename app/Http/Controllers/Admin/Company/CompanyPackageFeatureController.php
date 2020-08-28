<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyPackageFeatureRequest;
use App\Models\Company\{CompanyPackageFeature, CompanyPackage};
use Yajra\DataTables\Facades\DataTables;

class CompanyPackageFeatureController extends Controller
{
    // Package Feature page
    public function index()
    {
        $packages = CompanyPackage::all();
        $features = CompanyPackageFeature::with('companyPackage')->latest()->get();
        return \view('pages.admin.company.company-package-feature.index', \compact('features', 'packages'));
    }

    public function create()
    {
        $packages = CompanyPackage::all();
        $model = new CompanyPackageFeature();
        return view('pages.admin.company.company-package-feature.form', compact('model', 'packages'));
    }

    // Processing Modal Add Package Feature
    public function store(CompanyPackageFeatureRequest $request)
    {
        $data = $request->all();
        $model = CompanyPackageFeature::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CompanyPackageFeature::with('companyPackage')->findOrFail($id);
        return view('pages.admin.company.company-package-feature.show', compact('model'));
    }

    public function edit($id)
    {
        $packages = CompanyPackage::all();
        $model = CompanyPackageFeature::with('companyPackage')->findOrFail($id);
        // \dd($model);
        return view('pages.admin.company.company-package-feature.form', compact('model', 'packages'));
    }

    // Processing Modal Edit Package Feature
    public function update(CompanyPackageFeatureRequest $request, $id)
    {
        $data = $request->all();
        $item = CompanyPackageFeature::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Package Feature
    public function destroy($id)
    {
        $package = CompanyPackageFeature::findOrFail($id);
        $package->delete();
    }

    public function dataTable()
    {
        $model = CompanyPackageFeature::with('companyPackage')->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('companyPackageFeature.show', $model->id),
                    'url_edit' => route('companyPackageFeature.edit', $model->id),
                    'url_destroy' => route('companyPackageFeature.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
