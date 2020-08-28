<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'category_company' => 'required|exists:category_companies,id',
            'company_name' => 'required',
            'company_author' => 'required',
            'label' => 'required|string|in:FREE,PREMIUM',
            'category_company' => 'required',
            'description' => 'required',
            'status' => 'required|string|in:PUBLISH,PENDING'
        ];
    }
}
