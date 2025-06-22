<?php

namespace App\Http\Controllers\Api\User;

use App\DTOs\User\DTOsUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\User\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller 
{
    protected UserServices $UserServices;
    
    public function __construct(UserServices $UserServices)
    {
        $this->UserServices = $UserServices;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->UserServices->getAllUsers();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $result = $this->UserServices->createUser(DTOsUser::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->UserServices->getUserById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $result = $this->UserServices->updateUser(DTOsUser::fromUpdateRequest($request), $id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->UserServices->deleteUser($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
}
