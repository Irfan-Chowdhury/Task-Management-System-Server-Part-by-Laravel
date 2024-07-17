<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMember\StoreMemberRequest;
use App\Http\Requests\TeamMember\UpdateMemberRequest;
use App\Http\Resources\UserResource;
use App\Services\MemberService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TeamMemberController extends BaseController
{
    use ApiResponse;

    public function index(MemberService $memberService)
    {
        $teamMembers = $memberService->getAllData();

        return $this->sendResponse(UserResource::collection($teamMembers), null);

    }

    public function store(StoreMemberRequest $request, MemberService $memberService)
    {
        return $memberService->createTeamMember($request);
    }


    public function update(UpdateMemberRequest $request, $memberId, MemberService $memberService)
    {
        return $memberService->updateTeamMember($request, $memberId);
    }

    public function destroy(int $memberId, MemberService $memberService)
    {
        return $memberService->deleteTeamMember($memberId);
    }
}
