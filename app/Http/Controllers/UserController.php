<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $this->authorize(User::class);
        return response()->json(['success' => User::all()]);
    }

    public function show(User $user)
    {
            return response()->json($user, 200);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        return response()->json(['success' => $user->delete()], 200);
    }

    public function statistics()
    {
        $this->authorize(User::class);
        $worker =User::where('role_id',1)->get()->count();
        $employer =User::where('role_id',2)->get()->count();
        return response()->json(['worker' =>$worker, 'employer'=>$employer],200);
    }
}
