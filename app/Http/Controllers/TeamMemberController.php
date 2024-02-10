<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamMember\StoreMemberRequest;
use App\Http\Requests\TeamMember\UpdateMemberRequest;
use App\Models\User;
use App\Services\MemberService;
use Exception;
use Illuminate\Support\Facades\Auth;

class TeamMemberController extends Controller
{
    public function index(MemberService $memberService)
    {
        $this->authorize('viewMember', Auth::user());

        $teamMembers = $memberService->getAllData();

        return view('pages.team-members.index', compact('teamMembers'));
    }

    public function store(StoreMemberRequest $request, MemberService $memberService)
    {
        try {
            $this->authorize('createMember', Auth::user());

            $memberService->createTeamMember($request);

            return redirect()->back()->with(['success' => 'Data Created Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update(UpdateMemberRequest $request, $memberId, MemberService $memberService)
    {
        try {
            $this->authorize('updateMember', Auth::user());

            $memberService->updateTeamMember($request, $memberId);

            return redirect()->back()->with(['success' => 'Data Updated Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($memberId, MemberService $memberService)
    {
        try {
            $this->authorize('deleteMember', Auth::user());

            $memberService->deleteTeamMember($memberId);

            return redirect()->back()->with(['success' => 'Data Deleted Successfully']);

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
