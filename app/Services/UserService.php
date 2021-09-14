<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function show()
    {
        $users = User::orderBy('email', 'asc')->paginate(10);
        return $users;
    }
    public function createUser($request)
    {
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->phone),
            'phone' => $request->phone,
        ]);
    }
}