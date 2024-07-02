<?php

namespace App\Http\Controllers\Api;

use App\Request\Users\CreateUserValidation;
use App\Request\Users\LogInUserValidation;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }   

    public function register(CreateUserValidation $CreateUserValidation)
    {
        if(!empty($CreateUserValidation->getErrors())){
            return response()->json([$CreateUserValidation->getErrors(), 406]);  
        } 

       $user = $this->userService->CreateUser($CreateUserValidation->all());
       $message['user'] = $user;
       $message['token'] = $user->createToken('MyApp')->plainTextToken;
       
       return $this->sendResponse($message);
    }

    public function login(LogInUserValidation $LogInUserValidation)
    {
        if(!empty($LogInUserValidation->getErrors())){
            return response()->json([$LogInUserValidation->getErrors(), 406]);  
        } 
            
        $request = $LogInUserValidation->all();
        
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) 
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success);
        } else {
            return $this->sendError('Unauthorised.', 'fail', 401);
        }

    }
    
}