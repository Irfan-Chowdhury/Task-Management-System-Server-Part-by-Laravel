<?php

use App\Models\Landlord\Feature;
use App\Models\User;

it('login view load', function () {

    $response = $this->get('/login');

    $response->assertStatus(200);
});


// test('user login with username and password and can access feature', function () {

//     User::factory()->create();
//     $this->post('/super-admin',[
//         'username' => 'admin',
//         'password' => 'password',
//     ]);

//     $this->assertAuthenticated();
// });

