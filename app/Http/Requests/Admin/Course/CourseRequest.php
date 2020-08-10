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
            'category_course' => 'required|exist:category_courses,id',
            'course_name' => 'required',
            'course_author' => 'required',
            'price' => 'required',
            'category_course' => 'required',
            'description' => 'required',
            'status' => 'required|string|in:PUBLISH,PENDING'
        ];
    }
}
