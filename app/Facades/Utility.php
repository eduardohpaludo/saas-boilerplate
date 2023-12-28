<?php

namespace App\Facades;

use App\Models\GeneralSetting;

class Utility
{

    public function getsettings($value = '')
    {
        $setting = GeneralSetting::select('value');
        if (!empty(tenant('id'))) {
            $setting->where('tenant_id', tenant('id'));
        } else {
            $setting->whereNull('tenant_id');
        }
        $set =  $setting->where('key', $value)->first();
        $val = '';
        if (!empty($set->value)) {

            $val = $set->value;
        }
        return $val;
    }

}
