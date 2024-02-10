<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamMember\StoreMemberRequest;
use App\Http\Requests\TeamMember\UpdateMemberRequest;
use App\Services\MemberService;
use Illuminate\Support\Facades\Auth;

class TeamMemberController extends Controller
{
    public function index(MemberService $memberService)
    {
        $this->authorize('viewMember', Auth::user());

        $teamMembers = $memberService->getAllData();

        return view('pages.team-members.index', compact('teamMembers'));
    }

    public function datatable(MemberService $memberService)
    {
        return $memberService->yajraDataTable();
    }

    public function store(StoreMemberRequest $request, MemberService $memberService)
    {
        $this->authorize('createMember', Auth::user());

        $result = $memberService->createTeamMember($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function edit($memberId, MemberService $memberService)
    {
        $result = $memberService->getMemberById($memberId);

        return response()->json($result);
    }

    public function update(UpdateMemberRequest $request, $memberId, MemberService $memberService)
    {
        $this->authorize('updateMember', Auth::user());

        $result = $memberService->updateTeamMember($request, $memberId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function destroy($memberId, MemberService $memberService)
    {
        $this->authorize('deleteMember', Auth::user());

        $result = $memberService->deleteTeamMember($memberId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
