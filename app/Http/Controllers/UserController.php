<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService as UserSvc;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    private $userSvc;
   
    public function __construct( UserSvc $userSvc)
    {
        $this->userSvc = $userSvc;
    }

    public function index()
    {
        $users = $this->userSvc->show();

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
            $this->userSvc->createUser($request);
            DB::commit();

            return redirect("/user")->with('message', 'Đăng ký thành công !');
        } catch (Exception $exception) {
            DB::rollBack();

            return redirect("/adduser")->with('message', 'Đăng ký thất bại !');
        }
    }
}
