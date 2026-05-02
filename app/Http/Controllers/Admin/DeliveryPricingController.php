<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPricingRule;
use App\Models\DeliveryPricingSettings;
use App\Support\NigerianStates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryPricingController extends Controller
{
    /**
     * Make sure the logged-in admin has a dashboard_style set.
     * If not, save 'green' as the default — fixes the broken-CSS issue.
     */
    private function ensureDashboardStyle(): void
    {
        $admin = Auth::guard('admin')->user();
        if ($admin && empty($admin->dashboard_style)) {
            $admin->dashboard_style = 'green';
            $admin->save();
        }
    }

    // ---------- Rules CRUD ----------

    public function index(Request $request)
    {
        $this->ensureDashboardStyle();

        $q = DeliveryPricingRule::orderBy('origin_state')->orderBy('destination_state');

        if ($request->filled('search')) {
            $s = $request->search;
            $q->where(function ($w) use ($s) {
                $w->where('origin_state', 'like', "%$s%")
                  ->orWhere('destination_state', 'like', "%$s%");
            });
        }

        return view('admin.pricing.index', [
            'rules'    => $q->paginate(25)->withQueryString(),
            'settings' => DeliveryPricingSettings::current(),
            'title'    => 'Delivery Pricing Rules',
        ]);
    }

    public function create()
    {
        $this->ensureDashboardStyle();

        return view('admin.pricing.create', [
            'states' => NigerianStates::all(),
            'title'  => 'Add Pricing Rule',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'origin_state'      => 'required|string|max:100',
            'destination_state' => 'required|string|max:100',
            'base_fare'         => 'required|numeric|min:0',
            'is_active'         => 'sometimes|boolean',
            'notes'             => 'nullable|string|max:500',
        ]);

        $exists = DeliveryPricingRule::where('origin_state', $data['origin_state'])
            ->where('destination_state', $data['destination_state'])
            ->exists();

        if ($exists) {
            return back()->withInput()->withErrors([
                'origin_state' => 'A rule for this origin → destination pair already exists. Edit it instead.',
            ]);
        }

        DeliveryPricingRule::create($data);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing rule added.');
    }

    public function edit($id)
    {
        $this->ensureDashboardStyle();

        return view('admin.pricing.edit', [
            'rule'   => DeliveryPricingRule::findOrFail($id),
            'states' => NigerianStates::all(),
            'title'  => 'Edit Pricing Rule',
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = DeliveryPricingRule::findOrFail($id);

        $data = $request->validate([
            'origin_state'      => 'required|string|max:100',
            'destination_state' => 'required|string|max:100',
            'base_fare'         => 'required|numeric|min:0',
            'is_active'         => 'sometimes|boolean',
            'notes'             => 'nullable|string|max:500',
        ]);

        $rule->update($data);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing rule updated.');
    }

    public function destroy($id)
    {
        DeliveryPricingRule::findOrFail($id)->delete();
        return redirect()->route('admin.pricing.index')->with('success', 'Pricing rule deleted.');
    }

    public function toggleActive($id)
    {
        $rule = DeliveryPricingRule::findOrFail($id);
        $rule->update(['is_active' => ! $rule->is_active]);
        return back()->with('success', 'Rule is now ' . ($rule->is_active ? 'active' : 'inactive') . '.');
    }

    // ---------- Settings ----------

    public function settings()
    {
        $this->ensureDashboardStyle();

        return view('admin.pricing.settings', [
            'settings' => DeliveryPricingSettings::current(),
            'title'    => 'Pricing Settings',
        ]);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'minimum_fee'                => 'required|numeric|min:0',
            'default_fare_when_no_rule'  => 'required|numeric|min:0',
            'free_weight_kg'             => 'required|numeric|min:0',
            'per_kg_rate'                => 'required|numeric|min:0',
            'speed_standard'             => 'required|numeric|min:0.1|max:10',
            'speed_next_day'             => 'required|numeric|min:0.1|max:10',
            'speed_same_day'             => 'required|numeric|min:0.1|max:10',
            'speed_express'              => 'required|numeric|min:0.1|max:10',
            'enable_standard'            => 'sometimes|boolean',
            'enable_next_day'            => 'sometimes|boolean',
            'enable_same_day'            => 'sometimes|boolean',
            'enable_express'             => 'sometimes|boolean',
        ]);

        foreach (['enable_standard', 'enable_next_day', 'enable_same_day', 'enable_express'] as $k) {
            $data[$k] = $request->boolean($k);
        }

        DeliveryPricingSettings::current()->update($data);

        return back()->with('success', 'Pricing settings saved.');
    }
}
