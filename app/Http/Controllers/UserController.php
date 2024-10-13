<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterUserRequest $request)
    {
        
        $user = $this->userService->createUser($request->validated());

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}
