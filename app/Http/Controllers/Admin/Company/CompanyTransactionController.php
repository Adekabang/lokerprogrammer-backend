<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyTransactionRequest;
use App\Models\Company\{CompanyPackage,CompanyTransaction};
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class CompanyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=CompanyPackage::all();
        $user=User::all();
        $Transaction = CompanyTransaction::with('company_package','user')->get();
        return view('pages.admin.company.transaction.index',compact('Transaction','packages','user'));
    }
   
    public function show($id)
    {
        $model = CompanyTransaction::with(['company_package','user'])->findOrFail($id);
        return view('pages.admin.company.transaction.show', compact('model'));
    }

  
    public function edit($id)
    {
        
        $packages = CompanyPackage::all();
        $user = User::all();
        $model = CompanyTransaction::with('company_package','user')->findOrFail($id);
        return \view('pages.admin.company.transaction.form', \compact('model','packages','user'));
    }

  
    public function update(CompanyTransactionRequest $request, $id)
    {
        $item = CompanyTransaction::findOrFail($id);
        $item ->transaction_status = $request->transaction_status;
        $item->update();
    }

  
    public function destroy($id)
    {
        $Transaction = CompanyTransaction::findOrFail($id);
        $Transaction->delete();
    }

    public function datatable(){
        $model = CompanyTransaction::with('company_package','user')->latest();
        return DataTables::of($model)
            ->addColumn('Action', function($model){
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('companyTransaction.show',$model->id),
                        'url_edit' => route('companyTransaction.edit', $model->id),
                        'url_destroy' => route('companyTransaction.destroy', $model->id)
                    ]);
                })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
