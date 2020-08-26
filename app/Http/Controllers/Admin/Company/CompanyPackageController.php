<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyPackageRequest;
use App\Models\Company\CompanyPackage;
use Yajra\DataTables\Facades\DataTables;

class CompanyPackageController extends Controller
{
    // Package page
    public function index()
    {
        $packages = CompanyPackage::latest()->get();
        return \view('pages.admin.company.company-package.index', \compact('packages'));
    }

    public function create()
    {
        $model = new CompanyPackage();
        return view('pages.admin.company.company-package.form', compact('model'));
    }

    // Processing Modal Add Package
    public function store(CompanyPackageRequest $request)
    {
        $data = $request->all();
        $model = CompanyPackage::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CompanyPackage::findOrFail($id);
        return view('pages.admin.company.company-package.show', compact('model'));
    }

    public function edit($id)
    {
        $model = CompanyPackage::findOrFail($id);
        return view('pages.admin.company.company-package.form', compact('model'));
    }

    // Processing Modal Edit Package
    public function update(CompanyPackageRequest $request, $id)
    {
        $data = $request->all();
        $item = CompanyPackage::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Package
    public function destroy($id)
    {
        $package = CompanyPackage::findOrFail($id);
        $package->delete();
    }

    public function dataTable()
    {
        $model = CompanyPackage::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('companyPackage.show', $model->id),
                    'url_edit' => route('companyPackage.edit', $model->id),
                    'url_destroy' => route('companyPackage.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
