<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrategicPlan;
use Illuminate\Http\Request;

class StrategicPlanController extends Controller
{
    public function index()
    {
        $plans = StrategicPlan::ordered()->get();
        return view('admin.strategic-plan.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.strategic-plan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'details' => 'nullable|string',
            'category' => 'required|in:tata_kelola,program_layanan',
            'order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        StrategicPlan::create($validated);

        return redirect()->route('admin.strategic-plan.index')
            ->with('success', 'Strategic Plan berhasil ditambahkan');
    }

    public function edit(StrategicPlan $strategicPlan)
    {
        return view('admin.strategic-plan.edit', compact('strategicPlan'));
    }

    public function update(Request $request, StrategicPlan $strategicPlan)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'details' => 'nullable|string',
            'category' => 'required|in:tata_kelola,program_layanan',
            'order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $strategicPlan->update($validated);

        return redirect()->route('admin.strategic-plan.index')
            ->with('success', 'Strategic Plan berhasil diupdate');
    }

    public function destroy(StrategicPlan $strategicPlan)
    {
        $strategicPlan->delete();

        return redirect()->route('admin.strategic-plan.index')
            ->with('success', 'Strategic Plan berhasil dihapus');
    }
}