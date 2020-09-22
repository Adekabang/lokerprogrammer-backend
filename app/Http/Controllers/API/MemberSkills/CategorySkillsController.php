<?php

namespace App\Http\Controllers\API\MemberSkills;

use App\Http\Controllers\Controller;
use App\Models\Skills\CategorySkills;
use App\Http\Resources\Skills\CategorySkills as CategorySkillsResource; 
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;

class CategorySkillsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorySkill = CategorySkills::all();
        return $this->sendResponse(CategorySkillsResource::collection($categorySkill), 'Category Skills retrieved successfully');
    }

    public function show($id)
    {
        $categorySkill = CategorySkills::find($id);
        if(is_null($categorySkill)){
            return $this->sendError('Category Skills not Found !!');
        }
        return $this->sendResponse(new CategorySkillsResource($categorySkill), 'Category Skills retrieved successfully');
    }

   
}
