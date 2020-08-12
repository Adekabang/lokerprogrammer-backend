<?php

namespace App\Http\Controllers\Admin\Company;
use App\models\Company\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyRequest;
use App\Models\Company\Package;
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
        $company = Company::latest()->get();
        return view('pages.admin.company.index', compact('company'));
    }


    public function create()
    {
        $data = Company::all();
        $package = Package::all();
        return view('pages.admin.company.crud-company.create', compact('data', 'package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = new Company();
        $data->company_name = $request->company_name;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->description = $request->description;
        $data->expired_date = $request->expired_date;
        $data->user_id = '1';
        $data->package_id = $request->package_id;
        $data->save();

        return  redirect('admin/company')->withToastSuccess('Company has Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $package = Package::all();
        return view('pages.admin.company.crud-company.edit', compact('company', 'package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        Company::where('id', $id)->update([
           'company_name' => $request->company_name,
           'location' => $request->location,
           'contact' => $request->contact,
           'description' => $request->description,
           'expired_date' => $request->expired_date,
           'package_id' => $request->package_id
        ]);

        return  redirect('admin/company')->withToastSuccess('Company has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::findOrFail($id)->delete();

        return redirect('admin/company')->withToastSuccess('Company has Deleted');
    }
}
