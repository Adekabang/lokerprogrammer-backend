<?php

namespace App\Http\Controllers\API\MemberSkills;

use App\Http\Controllers\Controller;
use App\Models\Skills\Skills;
use App\Http\Resources\Skills\Skills as SkillsResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SkillsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::with('category_skills')->get();
        return $this->sendResponse(SkillsResource::collection($skills),'Skills retrieved successfully');
    }

    public function show($id){
        $skills = Skills::with('category_skills')->find($id);
        if (is_null($skills)) {
            return $this->sendError('Skills Not Found !!');
        }
        return $this->sendResponse(new SkillsResource($skills), 'Skills retrieved successfully');
    }

    public function update(Request $request, $id){
       
        $skills = Skills::with('category_skills')->find($id)->first();

        if(is_null($skills)){
            return $this->sendError('Skills Not Found !!');
        }
        $input=$request->all();
        $validator=Validator::make($input,[
            'category_skills_id' => ['required'],
            'skill_name' => ['required'],
            'skills_persentase' =>['required']
        ]);

        if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
        }

        $skills->category_skills_id = $input['category_skills_id'];
        $skills->skill_name = $input['skill_name'];
        $skills->skills_persentase = $input['skills_persentase'];
        $skills->save();

        return $this->sendResponse(new SkillsResource($skills),'Skills updated successfully.');
    }

}
