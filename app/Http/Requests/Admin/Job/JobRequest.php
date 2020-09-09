<?php

namespace App\Http\Requests\Admin\Job;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'category_id' => 'required|exists:category_jobs,id',
            'company_id' => 'required|exists:companies,id',
            'job_name' => 'required|string',
            'status' => 'required|string|in:READY,CLOSED',
            'location' => 'required',
            'requirement' => 'required',
            'required_skill' => 'required',
            'description' => 'required',
            'tag_id' => 'required'
        ];
    }
}
