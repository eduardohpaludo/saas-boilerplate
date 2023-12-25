<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRegisterRequest;
use App\Models\Tenant;
use App\Models\User;
use App\Services\TenantService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        return view('tenants.index', ['tenants' => $tenants]);
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(TenantRegisterRequest $request, TenantService $tenantService)
    {
//        //validation
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|max:255',
//            'domain_name' => 'required|string|max:255|unique:domains,domain',
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);
//        $tenant = Tenant::create([
//            'name' => $validatedData['name'],
//            'email' => $validatedData['email'],
//        ]);
//
//        $tenant->domains()->create([
//            'domain' => $validatedData['domain_name'].'.'.config('app.domain')
//        ]);
        return $tenantService->createTenant($request);

        //return redirect()->route('tenants.index');
    }
}
