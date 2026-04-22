<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\BikePurchase;
use App\Models\BikeRental;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBikeController extends Controller
{
    private function settings()
    {
        return Settings::where('id', 1)->first();
    }

    // ---------- Bikes CRUD ----------

    public function index()
    {
        $bikes = Bike::orderByDesc('id')->paginate(15);
        return view('admin.bikes.index', [
            'bikes' => $bikes,
            'settings' => $this->settings(),
            'title' => 'Manage Bikes',
        ]);
    }

    public function create()
    {
        return view('admin.bikes.create', [
            'settings' => $this->settings(),
            'title' => 'Add New Bike',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateBike($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bikes', 'public');
        }

        Bike::create($data);

        return redirect()->route('admin.bikes.index')
            ->with('success', 'Bike added successfully.');
    }

    public function edit($id)
    {
        $bike = Bike::findOrFail($id);
        return view('admin.bikes.edit', [
            'bike' => $bike,
            'settings' => $this->settings(),
            'title' => 'Edit Bike',
        ]);
    }

    public function update(Request $request, $id)
    {
        $bike = Bike::findOrFail($id);
        $data = $this->validateBike($request, $id);

        if ($request->hasFile('image')) {
            // delete old image if it exists
            if ($bike->image && Storage::disk('public')->exists($bike->image)) {
                Storage::disk('public')->delete($bike->image);
            }
            $data['image'] = $request->file('image')->store('bikes', 'public');
        }

        $bike->update($data);

        return redirect()->route('admin.bikes.index')
            ->with('success', 'Bike updated successfully.');
    }

    public function destroy($id)
    {
        $bike = Bike::findOrFail($id);

        // Safety: don't hard-delete if it has any history. Soft disable instead.
        if ($bike->purchases()->exists() || $bike->rentals()->exists()) {
            $bike->update(['is_active' => false, 'available_for_hire' => false]);
            return redirect()->route('admin.bikes.index')
                ->with('success', 'Bike has past orders/rentals — it has been disabled instead of deleted.');
        }

        if ($bike->image && Storage::disk('public')->exists($bike->image)) {
            Storage::disk('public')->delete($bike->image);
        }
        $bike->delete();

        return redirect()->route('admin.bikes.index')
            ->with('success', 'Bike deleted.');
    }

    // Quick toggle used from the bike list page
    public function toggleHire($id)
    {
        $bike = Bike::findOrFail($id);
        $bike->update(['available_for_hire' => ! $bike->available_for_hire]);

        return back()->with('success',
            'Hire availability is now ' . ($bike->available_for_hire ? 'ON' : 'OFF') . '.');
    }

    public function toggleActive($id)
    {
        $bike = Bike::findOrFail($id);
        $bike->update(['is_active' => ! $bike->is_active]);

        return back()->with('success',
            'Bike is now ' . ($bike->is_active ? 'active' : 'hidden') . '.');
    }

    private function validateBike(Request $request, $id = null): array
    {
        return $request->validate([
            'name'                => 'required|string|max:200',
            'brand'               => 'nullable|string|max:100',
            'description'         => 'nullable|string',
            'price'               => 'required|numeric|min:0',
            'daily_rate'          => 'required|numeric|min:0',
            'stock'               => 'required|integer|min:0',
            'is_active'           => 'sometimes|boolean',
            'available_for_hire'  => 'sometimes|boolean',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
    }

    // ---------- Purchases list ----------

    public function purchases(Request $request)
    {
        $q = BikePurchase::with('bike')->orderByDesc('id');

        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $q->where(function ($w) use ($s) {
                $w->where('order_no', 'like', "%$s%")
                  ->orWhere('guest_email', 'like', "%$s%")
                  ->orWhere('guest_name', 'like', "%$s%");
            });
        }

        return view('admin.bikes.purchases', [
            'purchases' => $q->paginate(20)->withQueryString(),
            'settings'  => $this->settings(),
            'title'     => 'Bike Purchases',
        ]);
    }

    public function viewPurchase($id)
    {
        $purchase = BikePurchase::with('bike')->findOrFail($id);
        return view('admin.bikes.purchase-view', [
            'purchase' => $purchase,
            'settings' => $this->settings(),
            'title'    => 'Purchase ' . $purchase->order_no,
        ]);
    }

    public function updatePurchaseStatus(Request $request, $id)
    {
        $request->validate([
            'status'     => 'required|in:Pending,Approved,Rejected,Cancelled',
            'admin_note' => 'nullable|string|max:1000',
        ]);

        $purchase = BikePurchase::findOrFail($id);
        $oldStatus = $purchase->status;
        $purchase->status = $request->status;
        $purchase->admin_note = $request->admin_note;

        if ($request->status === 'Approved' && ! $purchase->paid_at) {
            $purchase->paid_at = now();

            // Decrement bike stock now that purchase is confirmed.
            // Use fresh() + decrement to avoid racing with other admin actions.
            if ($oldStatus !== 'Approved' && $purchase->bike) {
                $purchase->bike->decrement('stock', $purchase->quantity);
            }
        }

        $purchase->save();

        return back()->with('success', 'Purchase status updated.');
    }

    // ---------- Rentals list ----------

    public function rentals(Request $request)
    {
        $q = BikeRental::with('bike')->orderByDesc('id');

        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $q->where(function ($w) use ($s) {
                $w->where('rental_no', 'like', "%$s%")
                  ->orWhere('guest_email', 'like', "%$s%")
                  ->orWhere('guest_name', 'like', "%$s%");
            });
        }

        return view('admin.bikes.rentals', [
            'rentals'  => $q->paginate(20)->withQueryString(),
            'settings' => $this->settings(),
            'title'    => 'Bike Rentals',
        ]);
    }

    public function viewRental($id)
    {
        $rental = BikeRental::with('bike')->findOrFail($id);
        return view('admin.bikes.rental-view', [
            'rental'   => $rental,
            'settings' => $this->settings(),
            'title'    => 'Rental ' . $rental->rental_no,
        ]);
    }

    public function updateRentalStatus(Request $request, $id)
    {
        $request->validate([
            'status'     => 'required|in:Pending,Approved,Active,Completed,Rejected,Cancelled',
            'admin_note' => 'nullable|string|max:1000',
        ]);

        $rental = BikeRental::findOrFail($id);
        $rental->status = $request->status;
        $rental->admin_note = $request->admin_note;

        if ($request->status === 'Approved' && ! $rental->paid_at) {
            $rental->paid_at = now();
        }

        $rental->save();

        return back()->with('success', 'Rental status updated.');
    }
}