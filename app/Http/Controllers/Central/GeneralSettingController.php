<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\Setting\SettingUpdateRequest;
use App\Models\Central\GeneralSetting;
use App\Services\Central\GeneralSettingService;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $query = GeneralSetting::get();
        $settings = collect([
            'stripe_public_key' => $query->where('key', 'stripe_public_key')->first()?->value,
            'stripe_private_key' => $query->where('key', 'stripe_private_key')->first()?->value,
        ]);

        return view('central.settings.index', [
            'settings' => $settings,
        ]);
    }

    public function paymentSettingUpdate(SettingUpdateRequest $request, GeneralSettingService $service)
    {
        return $service->paymentSettingUpdate($request);

    }
}
