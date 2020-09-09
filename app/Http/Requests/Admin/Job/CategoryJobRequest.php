<?php

namespace App\Http\Requests\Admin\Job;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryJobRequest extends FormRequest
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
            'category_name' => [
                'required',
                Rule::unique('category_jobs', 'category_name')->ignore($this->categoryJob)
            ]
        ];
    }
}
