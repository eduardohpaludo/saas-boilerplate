<?php

namespace App\Services\Central\Plan;

use App\Http\Requests\Central\Plan\PlanStoreRequest;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;

class PlanService
{
    public function create(PlanStoreRequest $request): RedirectResponse
    {

        $data = $request->validated();
        
        $plan = Plan::create($data);

        return redirect()->back()->with('success', __('Plan created successfully'));
        // $payment = GeneralSetting::fill([
        //     'key' => ''
        // ]);

    }
}