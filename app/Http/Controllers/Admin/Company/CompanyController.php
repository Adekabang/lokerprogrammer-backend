<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyRequest;
use App\Models\Company\{CategoryCompany, Company};
use Illuminate\Support\Str;


class CompanyController extends Controller
{
    // Companys list page
    public function index()
    {
        $companies = Company::with('category')->latest()->get();
        return \view('pages.admin.company.index', \compact('companies'));
    }

    // Form add company
    public function create()
    {
        $category = CategoryCompany::all();
        return \view('pages.admin.company.crud-company.create', \compact('category'));
    }

    // Processing form add a company
    public function store(CompanyRequest $request)
    {
        // Validasi image terpisah, krn mau custom nama image
        $request->validate([
            'thumbnail' => 'required|image',
        ]);
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/company', $filenamenya, 'public');
        } else {
            $gambarnya = 'assets/img/company/thumbnail.jpg';
        }
        // Instance for Company models
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->category_id = $request->category_company;
        $company->slug = Str::slug($request->company_name);
        $company->company_author = $request->company_author;
        $company->label = $request->label;
        $company->thumbnail = $gambarnya;
        $company->description = $request->description;
        $company->status = $request->status;
        $company->save();

        return redirect('admin/company')->withToastSuccess('Company has created!');
    }

    // Show all companies in the backend
    public function showAll()
    {
        $companies = Company::latest()->get();
        return \view('pages.admin.company.show', \compact('companies'));
    }

    // Form edit company
    public function edit($id)
    {
        $category = CategoryCompany::all();
        $company = Company::findOrFail($id);
        return \view('pages.admin.company.crud-company.edit', \compact('company', 'category'));
    }

    // Processing form edit company
    public function update(CompanyRequest $request, $id)
    {
        $item = Company::findOrFail($id);
        // If no image uploaded
        $pic = $item->thumbnail;

        // If there's image uploaded
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/company', $filenamenya, 'public');
        } else {
            $gambarnya = $pic;
        }

        Company::where('id', $id)->update([
            'category_id' => $request->category_company,
            'company_name' => $request->company_name,
            'slug' => Str::slug($request->company_name),
            'company_author' => $request->company_author,
            'label' => $request->label,
            'thumbnail' => $gambarnya,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('admin/company')->withToastSuccess('Company has updated!');
    }

    // Processing delete company
    public function destroy($id)
    {
        $item =  Company::findOrFail($id);
        $item->delete();

        return redirect('admin/company')->withToastSuccess('Company has deleted!');
    }
}
