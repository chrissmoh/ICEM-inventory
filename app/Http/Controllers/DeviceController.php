<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function create()
    {
        return view('adddevice'); // Return the view for adding a device
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'device_name'     => 'required|string|max:255',
            'category'        => 'required|string|max:255',
            'serial_number'   => 'required|string|max:255',
            'quantity'        => 'required|integer|min:1',
            'purchase_date'   => 'required|date',
            'status'          => 'required|in:active,inactive',
            'device_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload
        ]);

        $device = new Device($request->all());

        if ($request->hasFile('device_image')) {
            // Store the image in the 'public/images' directory
            $imagePath = $request->file('device_image')->store('images', 'public');
            $device->device_image = $imagePath; // Save the image path to the device model
        }
        // // Save the device to the database
        $device->save();
        // dd($device);
        // Redirect to a specific route with a success message
        return redirect()->route('device.create')->with('success', 'Device added successfully.');
    }


    public function index()
{
    $devices = Device::all(); // Get all devices from the database
    return view('devicelist', compact('devices'));
}
};
