<?php

use App\Models\User;

it('login Page Load', function () {

    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('user login with email and password and can access feature', function () {

    // User::factory()->create();
    $this->post('/login',[
        'email' => 'manager@gmail.com',
        'password' => 'manager123',
    ]);

    $this->assertAuthenticated();
});

it('gives back a successful response for Dashboard page', function () {
    $this->post('/login',[
        'email' => 'manager@gmail.com',
        'password' => 'manager123',
    ]);
    $this->get(route('dashboard'))->assertOk();
});

