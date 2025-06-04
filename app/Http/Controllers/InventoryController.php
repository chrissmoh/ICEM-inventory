<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = InventoryItem::latest()->paginate(10);
        return view('devicelist', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_name' => 'required|string|max:255',
            'category' => 'required|string',
            'serial_number' => 'required|string|unique:inventory_items',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'device_image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('device_image')) {
            $data['device_image'] = $request->file('device_image')
                ->store('inventory-images', 'public');
        }

        InventoryItem::create($data);

        return redirect()->route('devices.index')
               ->with('success', 'Device added successfully!');
    }

    public function destroy($id)
    {
        InventoryItem::destroy($id);
        return back()->with('success', 'Device deleted successfully!');
    }
}
