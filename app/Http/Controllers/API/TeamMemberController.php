<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMember\StoreMemberRequest;
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
        // $this->authorize('createMember', Auth::user());

        return $memberService->createTeamMember($request);

        // return response()->json($result);
        // return $this->success('Team Data Saved Successfully');
    }

    public function destroy(int $memberId, MemberService $memberService)
    {
        // $this->authorize('deleteMember', Auth::user());

        return $memberService->deleteTeamMember($memberId);

        // return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
