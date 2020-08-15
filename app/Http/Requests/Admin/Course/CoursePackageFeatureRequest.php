<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CoursePackageFeatureRequest extends FormRequest
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
            'course_packages_id' => 'required|exists:course_packages,id',
            'feature_name' => [
                'required',
                Rule::unique('course_package_features', 'feature_name')->ignore($this->coursePackageFeature)
            ],
        ];
    }
}
