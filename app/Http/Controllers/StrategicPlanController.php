<?php

namespace App\Http\Controllers;

use App\Models\StrategicPlan;
use Illuminate\Http\Request;

class StrategicPlanController extends Controller
{
    public function show($id)
    {
        $plan = StrategicPlan::findOrFail($id);
        return view('pages.details.strategic-plan-detail', compact('plan'));
    }
}