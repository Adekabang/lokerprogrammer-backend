<?php

namespace App\Http\Controllers\API\MemberLanguage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language\Language;
use App\Http\Resources\Language\Language as LanguageResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
class LanguageController extends BaseController
{
    public function index(){
        $languages = Language::all();
        return $this->sendResponse(LanguageResource::collection($languages), 'Language retrieved successfully.');
    }
    public function updateLanguage(Request $request, $id){
        $languages = Language::where('id',$id)->first();
        if (is_null($languages)) {
            return $this->sendError('Language certification not found.');
        }
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'persentase' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
       $languages->update($data);

        return $this->sendResponse(new LanguageResource($languages), 'Languages updated successfully.');
    }
}
