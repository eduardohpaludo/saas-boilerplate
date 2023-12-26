<?php

namespace App\Services\App\Users;

use App\Http\Requests\App\Users\StoreUserRequest;
use App\Http\Requests\App\Users\UpdateUserRequest;
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

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index');
    }
}
