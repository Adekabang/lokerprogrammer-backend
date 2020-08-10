<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class LessonCourseRequest extends FormRequest
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
            'lesson_name' => 'required|unique:course_lessons,lesson_name',
            'duration' => 'required',
            'episode' => 'required',
            'course_id' => 'required|exists:courses,id',
            'status' => 'required|string|in:PUBLISH,PENDING',
            'video' => 'required|unique:course_lessons,video',
        ];
    }
}
