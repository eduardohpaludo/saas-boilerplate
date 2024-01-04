<?php

namespace App\Services\Central;


use App\Facades\UtilityFacades;
use App\Http\Requests\Central\GeneralSettingRequest;
use App\Http\Requests\Central\Setting\SettingUpdateRequest;
use App\Models\Central\GeneralSetting;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;

class GeneralSettingService
{
    public function paymentSettingUpdate(SettingUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        foreach ($data as $key => $value) {
            UtilityFacades::storesettings([
                'key'   => $key,
                'value' => $value
            ]);
        }

        return redirect()->back()->with('success', __('Payment setting updated successfully'));
        // $payment = GeneralSetting::fill([
        //     'key' => ''
        // ]);

    }
}