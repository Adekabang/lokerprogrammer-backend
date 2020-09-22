<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Member\MemberEducation;
use App\Http\Resources\Member\Education as EducationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class MemberEducationController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $education = MemberEducation::where('members_id', $user->id)->first();
        return $this->sendResponse(new EducationResource($education), 'Member educations retrieved successfully.');
    }

    public function updateMemberEducation(Request $request)
    {
        $user = Auth::user();
        $education = MemberEducation::where('members_id', $user->id)->first();
        if (is_null($education)) {
            return $this->sendError('Member education not found.');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_sekolah' => 'string',
            'jenjang' => 'string',
            'bidang_stude' => 'string',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $education->members_id = $education->members_id;
        $education->nama_sekolah = $input['nama_sekolah'];
        $education->jenjang = $input['jenjang'];
        $education->bidang_studi = $input['bidang_studi'];
        $education->tanggal_masuk = $input['tanggal_masuk'];
        $education->tanggal_keluar = $input['tanggal_keluar'];
        $education->save();

        return $this->sendResponse(new EducationResource($education), 'Education updated successfully.');        
    }
}
