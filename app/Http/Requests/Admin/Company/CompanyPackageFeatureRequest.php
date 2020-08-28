<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyPackageFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_packages_id' => 'required|exists:company_packages,id',
            'feature_name' => [
                'required',
                Rule::unique('company_package_features', 'feature_name')->ignore($this->companyPackageFeature)
            ],
        ];
    }
}
