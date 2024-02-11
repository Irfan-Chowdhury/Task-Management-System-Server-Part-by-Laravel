<?php

use App\Models\User;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->userAuthenticated();
});

/*
|--------------------------------------------------------------------------
| General
|--------------------------------------------------------------------------
|
*/

it('gives back a successful response for project page', function () {
    $this->get(route('team-members.index'))->assertOk();
});


it('returns correct view', function() {
    $this->get(route('team-members.index'))
        ->assertOk()
        ->assertViewIs('pages.team-members.index');
});


/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
|
*/


test('name - required|string|min:3|max:255', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['name' =>'']))
        ->assertInvalid(['name' => 'required']);

    // string
    $this->post(route('team-members.store'), array_merge(ProjectData(), ['name' => 12]))
        ->assertSessionHasErrors('name');

    // min:3
    $this->post(route('team-members.store'), array_merge(ProjectData(), ['name' => 'ab']))
        ->assertSessionHasErrors('name');

    // max:255
    $this->post(route('team-members.store'), array_merge(ProjectData(), ['name' => Str::random(500)]))
        ->assertSessionHasErrors('name');
});


test('email - required|email|unique:users,email', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['email' =>'']))
        ->assertInvalid(['email' => 'required']);

    // email
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['email' => 12]))
        ->assertSessionHasErrors('email');

    // unique
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['email' => 'manager@gmail.com']))
        ->assertSessionHasErrors('email');
});

test('employee_id - required|string|unique:users,employee_id', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['employee_id' =>'']))
        ->assertInvalid(['employee_id' => 'required']);

    // string
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['employee_id' => 12]))
        ->assertSessionHasErrors('employee_id');

    // unique
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['employee_id' => 'BAT-12345']))
        ->assertSessionHasErrors('employee_id');
});

test('position - required|string|max:255', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['position' =>'']))
        ->assertInvalid(['position' => 'required']);

    // string
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['position' => 12]))
        ->assertSessionHasErrors('position');

    // max:255
    $this->post(route('team-members.store'), array_merge(ProjectData(), ['position' => Str::random(500)]))
        ->assertSessionHasErrors('position');
});

test('password - required|string|min:5', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['password' =>'']))
        ->assertInvalid(['password' => 'required']);

    // string
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['password' => 12]))
        ->assertSessionHasErrors('password');

    // min:5
    $this->post(route('team-members.store'), array_merge(TeamMemberData(), ['password' => 'ab']))
        ->assertSessionHasErrors('password');

});


/*
|--------------------------------------------------------------------------
| Store
|--------------------------------------------------------------------------
|
*/

test('Team Member Store', function () {
    $this->withoutExceptionHandling();
    $response = $this->post(route('team-members.store'), TeamMemberData());
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| Update
|--------------------------------------------------------------------------
|
*/

test('Team Member Update', function () {
    $this->withoutExceptionHandling();
    $user = User::latest()->first();
    $response = $this->post(route('team-members.update',$user->id), array_merge(TeamMemberData(), ['name' => Str::random(10)]));
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| Delete
|--------------------------------------------------------------------------
*/


test('Deleted- Successfully', function () {
    // $this->withoutExceptionHandling();
    $user = User::latest()->first();
    $result = $this->get(route('team-members.destroy', $user->id));
    expect($result)->toBeTruthy();
});
