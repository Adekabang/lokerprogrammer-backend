<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'category_course' => 'required|exists:category_courses,id',
            'sub_category_course' => 'required|exists:sub_category_courses,id',
            'course_name' => 'required',
            'course_author' => 'required',
            'label' => 'required|string|in:FREE,PREMIUM',
            'category_course' => 'required',
            'description' => 'required',
            'status' => 'required|string|in:PUBLISH,PENDING'
        ];
    }
}
