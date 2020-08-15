<?php

namespace App\Http\Controllers\Admin\Company;
use App\models\Company\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyRequest;
use App\Models\Company\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $url=route('company.edit',$row->id);
                    $btn = '<a href="'.$url.'" data-toggle="tooltip"  data-id="" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                    return $btn;
                })
                ->addColumn('package_id',function($row){
                    return isset($row->package) ? $row->package->package_name : '-';
                })
                ->rawColumns(['package_id','action'])
                ->make(true);
        }
        return view('pages.admin.company.index');
    }

    public function create()
    {
        $data = Company::all();
        $package = Package::all();
        return view('pages.admin.company.crud-company.create', compact('data', 'package'));
    }

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

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $package = Package::all();
        return view('pages.admin.company.crud-company.edit', compact('company', 'package'));
    }

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

    public function destroy($id)
    {
        $data = Company::findOrFail($id)->delete();
        return response()->json(['success'=>'Company Deleted Succesfully']);
    }
}
