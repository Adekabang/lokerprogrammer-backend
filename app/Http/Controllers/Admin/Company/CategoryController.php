<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CategoryCompanyRequest;
use App\Models\Company\CategoryCompany;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    // Category page
    public function index()
    {
        $categories = CategoryCompany::latest()->get();
        return \view('pages.admin.company.category.index', \compact('categories'));
    }

    public function create()
    {
        $model = new CategoryCompany();
        return view('pages.admin.company.category.form', compact('model'));
    }

    // Processing Modal Add Category
    public function store(CategoryCompanyRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $model = CategoryCompany::create($data);

        return $model;
    }

    public function show($id)
    {
        $model = CategoryCompany::findOrFail($id);
        return view('pages.admin.company.category.show', compact('model'));
    }

    public function edit($id)
    {
        $model = CategoryCompany::findOrFail($id);
        return view('pages.admin.company.category.form', compact('model'));
    }

    // Processing Modal Edit Category
    public function update(CategoryCompanyRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->category_name);
        $item = CategoryCompany::findOrFail($id);
        $item->update($data);
    }

    // Processing Delete Category
    public function destroy($id)
    {
        $category = CategoryCompany::findOrFail($id);
        $category->delete();
    }

    public function dataTable()
    {
        $model = CategoryCompany::query()->latest();
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('companyCategory.show', $model->id),
                    'url_edit' => route('companyCategory.edit', $model->id),
                    'url_destroy' => route('companyCategory.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
