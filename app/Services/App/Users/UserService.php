<?php

namespace App\Services\App\Users;

use App\Http\Requests\App\Users\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserService
{
    protected function userData($request): array
    {
        return [
            'password' => bcrypt($request['password'])
        ];
    }

    public function createTenant(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create(
            $request->safe()->except(['password']) + $this->userData($request)
        );

        return redirect()->route('users.index');
    }
}
