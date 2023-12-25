<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Users\StoreUserRequest;
use App\Http\Requests\TenantRegisterRequest;
use App\Models\Tenant;
use App\Models\User;
use App\Services\App\Users\UserService;
use App\Services\TenantService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('app.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('app.users.create');
    }

    public function store(StoreUserRequest $request, UserService $userService)
    {
        return $userService->createTenant($request);

    }
}
