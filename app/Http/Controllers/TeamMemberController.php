<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamMember\StoreMemberRequest;
use App\Http\Requests\TeamMember\UpdateMemberRequest;
use App\Services\MemberService;
use Exception;

class TeamMemberController extends Controller
{
    public function index(MemberService $memberService)
    {
        $teamMembers = $memberService->getAllData();

        return view('pages.team-members.index', compact('teamMembers'));
    }

    public function store(StoreMemberRequest $request, MemberService $memberService)
    {
        try {
            $memberService->createTeamMember($request);

            return redirect()->back()->with(['success' => 'Data Created Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update(UpdateMemberRequest $request, $memberId, MemberService $memberService)
    {
        try {
            $memberService->updateTeamMember($request, $memberId);

            return redirect()->back()->with(['success' => 'Data Updated Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($memberId, MemberService $memberService)
    {
        try {
            $memberService->deleteTeamMember($memberId);

            return redirect()->back()->with(['success' => 'Data Deleted Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
