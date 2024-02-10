<?php

use App\Models\Project;

beforeEach(function () {
    $this->userAuthenticated();
});

it('gives back a successful response for project page', function () {
    $this->get(route('projects.index'))->assertOk();
});

it('returns correct view', function() {
    $this->get(route('projects.index'))
        ->assertOk()
        ->assertViewIs('pages.projects.index');
});

/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
|
*/


test('name - required  | Unique | string | min:3 | max: 191', function () {
    // $this->withoutExceptionHandling();

    $this->post(route('projects.store'), array_merge(ProjectData(), ['name' =>'']))
        ->assertInvalid(['name' => 'required']);

    $this->post(route('projects.store'), array_merge(ProjectData(), ['name' =>'ProplePro HRM']))
        ->assertSessionHasErrors('name');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['name' => 12]))
        ->assertSessionHasErrors('name');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['name' => 'ab']))
        ->assertSessionHasErrors('name');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['name' => 'fdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdsfdsfffffffffffffffffffffffffffffssssssssssssssssssssdgfd']))
        ->assertSessionHasErrors('name');
});


test('code - required  | Unique | string | min:3 | max: 191', function () {
    // $this->withoutExceptionHandling();

    $this->post(route('projects.store'), array_merge(ProjectData(), ['code' =>'']))
        ->assertInvalid(['code' => 'required']);

    $this->post(route('projects.store'), array_merge(ProjectData(), ['code' =>'P-123']))
        ->assertSessionHasErrors('code');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['code' => 12]))
        ->assertSessionHasErrors('code');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['code' => 'ab']))
        ->assertSessionHasErrors('code');

    $this->post(route('projects.store'), array_merge(ProjectData(), ['code' => 'fdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfdfdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdsfdsfffffffffffffffffffffffffffffssssssssssssssssssssdgfd']))
        ->assertSessionHasErrors('code');
});

/*
|--------------------------------------------------------------------------
| Store
|--------------------------------------------------------------------------
|
*/

test('Project Store', function () {
    $this->withoutExceptionHandling();
    $response = $this->post(route('projects.store'), ProjectData());
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| Update
|--------------------------------------------------------------------------
|
*/

test('Project Update', function () {
    $this->withoutExceptionHandling();
    $project = Project::latest()->first();
    $response = $this->post(route('projects.update',$project->id), ProjectData());
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| Delete
|--------------------------------------------------------------------------
*/


test('Deleted- Successfully', function () {
    // $this->withoutExceptionHandling();
    $project = Project::latest()->first();
    $result = $this->get(route('projects.destroy', $project->id));
    expect($result)->toBeTruthy();
});
