<?php

namespace App\Http\Controllers\Central\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\Plan\PlanStoreRequest;
use App\Models\Plan;
use App\Services\Central\Plan\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return view('central.plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('central.plans.create');
    }

    public function store(PlanStoreRequest $request, PlanService $service)
    {
        return $service->create($request);
    }
}
