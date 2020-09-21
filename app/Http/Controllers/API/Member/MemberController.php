<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Member\Member as MemberResource;
use App\Models\Member\Member;
use Illuminate\Support\Facades\Auth;

class MemberController extends BaseController
{

  public function index()
  {
    $social = Member::with('user')->get();
    return $this->sendResponse(MemberResource::collection($social), 'Members retrieved successfully.');
  }

  public function show($id)
  {
    $user = Auth::user();
    $social = Member::with('user')->where('users_id', $user->id)->first();

    if (is_null($social)) {
      return $this->sendError('Member not found.');
    }

    return $this->sendResponse(new MemberResource($social), 'Member retrieved successfully.');
  }
}
