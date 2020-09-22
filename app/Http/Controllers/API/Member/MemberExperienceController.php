<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Member\MemberExperience;
use App\Http\Resources\Member\Experience as ExperienceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class MemberExperienceController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $experience = MemberExperience::where('members_id', $user->id)->first();
        return $this->sendResponse(new ExperienceResource($experience), 'Member experiences retrieved successfully.');
    }

    public function updateMemberExperience(Request $request)
    {
        $user = Auth::user();
        $experience = MemberExperience::where('members_id', $user->id)->first();
        if (is_null($experience)) {
            return $this->sendError('Member experience not found.');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_perusahaan' => 'string',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $experience->members_id = $experience->members_id;
        $experience->nama_perusahaan = $input['nama_perusahaan'];
        $experience->tanggal_masuk = $input['tanggal_masuk'];
        $experience->tanggal_keluar = $input['tanggal_keluar'];
        $experience->save();

        return $this->sendResponse(new ExperienceResource($experience), 'Experience updated successfully.');        
    }
}
