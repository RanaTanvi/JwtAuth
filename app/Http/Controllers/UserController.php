<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userRepository->getAllUsers();

            return response()->json(['status' => 'success', 'data' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateUserRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        try {
            $user = $this->userRepository->createUser($request->all());
            if ($user) {
                return response()->json(['status' => 'success', 'message' => 'User Created Successfully'], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $user = $this->userRepository->updateUser($id, $request->all());

            if ($user) {
                return response()->json(['status' => 'success', 'message' => 'Record updated successfully'], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'error', 'message' => 'Record not found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->id;
            $delete = $this->userRepository->deleteUser($id);
            if ($delete) {

                return response()->json(['status' => 'success', 'message' => 'User Deleted Successfully'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

        return response()->json(['status' => 'error', 'message' => 'Record not found']);
    }
}
