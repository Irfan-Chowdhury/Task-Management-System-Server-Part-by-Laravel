<?php

use App\Models\Landlord\Feature;
use App\Models\User;

it('login view load', function () {

    $response = $this->get('/login');

    $response->assertStatus(200);
});
