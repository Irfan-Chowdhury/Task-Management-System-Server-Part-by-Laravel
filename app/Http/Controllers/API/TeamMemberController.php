<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\MemberService;
use Illuminate\Http\Request;

class TeamMemberController extends BaseController
{
    public function index(MemberService $memberService)
    {
        // $this->authorize('viewMember', Auth::user());

        $teamMembers = $memberService->getAllData();

        return $this->sendResponse(UserResource::collection($teamMembers), null);

    }
}
