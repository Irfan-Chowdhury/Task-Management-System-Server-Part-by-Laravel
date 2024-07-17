<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends BaseController
{
    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => '123',
            'position' => 'admin',
            'role_id' => 1,
            'password' => bcrypt($request->password),
        ]);
        $success['token'] =  $user->createToken('TMS')->plainTextToken;
        $success['name']  =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $data['token']  =  $user->createToken('TMS')->plainTextToken;
            $data['userId'] =  $user->id;
            $data['name']   =  $user->name;
            $data['email']  =  $user->email;

            return $this->sendResponse($data, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->sendResponse([], 'Logout Successfully');
    }
}

