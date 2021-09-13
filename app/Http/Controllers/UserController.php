<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::orderBy('email', 'asc')->paginate(10);

        return view('user', compact("users"));
    }

    public function create()
    {
        return view('CreateUser');
    }
    public function store(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->phone),
                'phone' => $request->phone,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
                'deleted_at' => date("Y-m-d h:i:s"),
            ]);
            DB::commit();

            return redirect("/user")->with('status', 'Đăng ký thành công !');
        }
         catch (Exception $exception) {
            DB::rollBack();

            return redirect("/adduser")->with('status', 'Đăng ký thất bại !');
        }
    }
}
