<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\Apply;
use App\Http\Resources\Job\Apply as ApplyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplyController extends BaseController
{
    public function index()
    {
        // Ambil data loker yg di apply ini sesuai dgn user yg sedang login!
        $applies = Apply::orderby('created_at', 'DESC')->get();
        return $this->sendResponse(ApplyResource::collection($applies), 'Apply Job retrieved successfully.');
    }

    // Fungsi ini mungkin tdk diperlukn oleh Member
    // Status apply loker diterima atau tidak,
    // Akan ditentukn oleh Company nantinya.
    // Jgn dihapus, cukup comment route ny saja.
    public function update(Request $request, $id)
    {
        $applies = Apply::where('id', $id)->first();
        if (is_null($applies)) {
            return $this->sendError('Apply Job not found.');
        }
        $data = $request->all();

        $validator = Validator::make($data, [
            'status_apply' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $applies->user_id = $applies->user_id;
        $applies->job_id = $applies->job_id;
        $applies->update($data);
        return $this->sendResponse(new ApplyResource($applies), 'Apply Job updated successfully.');
    }
}
