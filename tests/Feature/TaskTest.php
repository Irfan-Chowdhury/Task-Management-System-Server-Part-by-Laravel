<?php

use App\Models\Task;
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
    $this->get(route('tasks.index'))->assertOk();
});


it('returns correct view', function() {
    $this->get(route('tasks.index'))
        ->assertOk()
        ->assertViewIs('pages.tasks.index');
});

/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
|
*/


test('name - required|string|min:3|max:191|unique:tasks,name', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('tasks.store'), array_merge(TaskData(), ['name' =>'']))
        ->assertInvalid(['name' => 'required']);

    // string
    $this->post(route('tasks.store'), array_merge(TaskData(), ['name' => 12]))
        ->assertSessionHasErrors('name');

    // min:3
    $this->post(route('tasks.store'), array_merge(TaskData(), ['name' => 'ab']))
        ->assertSessionHasErrors('name');

    // max:255
    $this->post(route('tasks.store'), array_merge(TaskData(), ['name' => Str::random(500)]))
        ->assertSessionHasErrors('name');
});

test('description - required|string', function () {
    // $this->withoutExceptionHandling();

    // required
    $this->post(route('tasks.store'), array_merge(TaskData(), ['description' =>'']))
        ->assertInvalid(['description' => 'required']);

    // string
    $this->post(route('tasks.store'), array_merge(TaskData(), ['description' => 12]))
        ->assertSessionHasErrors('description');
});


/*
|--------------------------------------------------------------------------
| Store
|--------------------------------------------------------------------------
|
*/

test('Task Store', function () {
    $this->withoutExceptionHandling();
    $response = $this->post(route('tasks.store'), TaskData());
    $response->assertStatus(200);
});

/*
|--------------------------------------------------------------------------
| Update
|--------------------------------------------------------------------------
|
*/

test('Task Update', function () {
    $this->withoutExceptionHandling();
    $task = Task::latest()->first();
    $response = $this->post(route('tasks.update',$task->id), array_merge(TaskData(), ['name' => Str::random(10)]));
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| Delete
|--------------------------------------------------------------------------
*/

test('Deleted- Successfully', function () {
    // $this->withoutExceptionHandling();
    $task = Task::latest()->first();
    $result = $this->get(route('tasks.destroy', $task->id));
    expect($result)->toBeTruthy();
});
