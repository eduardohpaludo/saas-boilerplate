<?php

namespace App\Services;

use App\Http\Requests\TenantRegisterRequest;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;

class TenantService
{
    protected function tenantData($request): array
    {
        return [
            'password' => bcrypt($request['password'])
        ];
    }

    public function createTenant(TenantRegisterRequest $request): RedirectResponse
    {
        $tenant = Tenant::create(
            $request->safe()->except(['password']) + $this->tenantData($request)
        );

        $domain = $tenant->createDomain([
            'domain' => $request->domain . '.saas.test',
        ]);

        return redirect()->route('tenants.index');
    }
}
