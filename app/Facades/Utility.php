<?php

namespace App\Facades;

use App\Models\Central\GeneralSetting;

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


    public function storesettings($formatted_array)
    {
        $row = GeneralSetting::where('key', $formatted_array['key'])->first();
        if (empty($row)) {
            GeneralSetting::create($formatted_array);
        } else {
            $row->update($formatted_array);
        }
        $affected_row = GeneralSetting::find($formatted_array['key']);
        return $affected_row;

    }

}
