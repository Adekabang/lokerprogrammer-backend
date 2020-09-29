<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Member\MemberCertification;
use App\Http\Resources\Member\Certification as CertificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberCertificationController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $certification = MemberCertification::where('members_id', $user->id)->get();
        return $this->sendResponse(CertificationResource::collection($certification), 'Member certification retrieved successfully.');
    }

    public function updateMemberCertification(Request $request)
    {
        $user = Auth::user();
        $certification = MemberCertification::where('members_id', $user->id)->first();
        if (is_null($certification)) {
            return $this->sendError('Member certification not found.');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'certification_name' => 'required',
            'description' => 'required',
            'attachment_image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $certification->members_id = $certification->members_id;
        $uploadFolder = 'certifications';
        $image = $request->file('attachment_image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        $certification->attachment_image = basename($image_uploaded_path);
        $certification->certification_name = $input['certification_name'];
        $certification->description = $input['description'];
        $certification->save();

        return $this->sendResponse(new CertificationResource($certification), 'Certification updated successfully.');
    }
}
