<?php

namespace App\Http\Controllers\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\PackageRequest;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::latest()->get();
        return view('pages.admin.company.package.index', compact('package'));
    }


    public function store(PackageRequest $request)
    {
        $data = $request->all();
        Package::create($data);

        return redirect('admin/package')->withToastSuccess('Package has created');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, $id)
    {
        $data = $request->all();
        $item = Package::findOrFail($id);
        $item->update($data);

        return redirect('admin/package')->withToastSuccess('Package has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Package::findOrFail($id);
        $data->delete();

        return redirect('admin/package')->withToastSuccess('Package has Deleted');
    }
}
