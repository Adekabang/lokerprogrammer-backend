<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Member\MemberSocial;
use App\Http\Resources\Member\Social as SocialResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberSocialController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $social = MemberSocial::where('members_id', $user->id)->first();
        return $this->sendResponse(new SocialResource($social), 'Member socials retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $social = MemberSocial::with('member')->where('members_id', $user->id)->first();

        if (is_null($social)) {
            return $this->sendError('Member social not found.');
        }

        return $this->sendResponse(new SocialResource($social), 'Member social retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $social = MemberSocial::where('members_id', $user->id)->first();
        if (is_null($social)) {
            return $this->sendError('Member social not found.');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'gmail' => [
                'required', 'unique:member_socials,gmail,' . $social->id
            ],
            'github' => [
                'required', 'unique:member_socials,github,' . $social->id
            ],
            'whatsapp' => [
                'required', 'unique:member_socials,whatsapp,' . $social->id
            ],
            'linkedin' => [
                'required', 'unique:member_socials,linkedin,' . $social->id
            ]
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $social->members_id = $social->members_id;
        $social->gmail = $input['gmail'];
        $social->github = $input['github'];
        $social->whatsapp = $input['whatsapp'];
        $social->linkedin = $input['linkedin'];
        $social->save();

        return $this->sendResponse(new SocialResource($social), 'Social updated successfully.');
    }
}
