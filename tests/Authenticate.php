<?php

namespace Tests;

use App\Models\Landlord\Language;
use App\Models\User;

trait Authenticate
{
    public function userAuthenticated()
    {
        $this->post('/login',[
            'email' => 'manager@gmail.com',
            'password' => 'manager123',
        ]);

        $this->assertAuthenticated();
    }
}
