<?php

namespace App\Http\Controllers\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\PackageRequest;
use App\Models\Company\Company;
use App\Models\Company\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class PackageController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Package::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPackage">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePackage">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.company.package.index');
    }

    public function store(PackageRequest $request)
    {
        Package::updateOrCreate(['id' => $request->id],
            [
                'package_name' => $request->package_name,
                'price_package' => $request->price_package,
                'package_expired' => $request->package_expired
            ]);

        return response()->json(['success'=>'Package saved Succesfully']);
    }

    public function edit($id)
    {
        $data = Package::findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Package::findOrFail($id);
        $data->delete();
        return response()->json(['sucess'=>'Package Deleted Succesfully']);
    }
}
