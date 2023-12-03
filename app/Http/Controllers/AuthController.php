<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUserAction;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserRessource;
use App\Notifications\UserCreationNotification;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    //login
    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);
        if (!($token = auth()->attempt($credentials))) {
            return response()->json(['error' => 'Email ou mot de passe incorrect'], 401);
        }
        return response()->json(['user' => new UserRessource(Auth()->user()), 'token'=> auth()->user()->createToken('authToken')->plainTextToken]);
    }


    /**
     * @param RegisterRequest $request
     * @param CreateUserAction $createUserAction
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request , CreateUserAction $createUserAction)
    {
        $user = $createUserAction->execute($request->validated());
        $user->notify(new UserCreationNotification($user));
        return response()->json([
            'message'=>'Vote compte a été crée',
            "user"=>new UserRessource($user)
        ]);
    }
}
