<?php

namespace App\Http\Controllers;

use App\Models\DeviceAssignment;
use App\Models\Device;
use App\Models\Staff;
use App\Models\Lab;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeviceAssignmentController extends Controller
{

    public function index()
    {
        $assignments = DeviceAssignment::with(['device', 'staff', 'lab'])
            ->latest()
            ->paginate(10);

        return view('assignments.index', compact('assignments'));
    }


 public function create()
    {
        $devices = Device::where('status', 'available')->get();
        $staff = Staff::active()->get();
        $labs = Lab::active()->get();

        return view('assignments.create', compact('devices', 'staff', 'labs'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|exists:devices,id',
            'assignee_type' => 'required|in:staff,lab',
            'staff_id' => 'required_if:assignee_type,staff|exists:staff,id',
            'lab_id' => 'required_if:assignee_type,lab|exists:labs,id',
            'assigned_date' => 'required|date',
            'expected_return_date' => 'nullable|date|after:assigned_date',
            'notes' => 'nullable|string|max:500'
        ]);

        $assignment = DeviceAssignment::create([
            'device_id' => $validated['device_id'],
            'assignee_type' => $validated['assignee_type'],
            'staff_id' => $validated['assignee_type'] === 'staff' ? $validated['staff_id'] : null,
            'lab_id' => $validated['assignee_type'] === 'lab' ? $validated['lab_id'] : null,
            'assigned_date' => $validated['assigned_date'],
            'expected_return_date' => $validated['expected_return_date'],
            'notes' => $validated['notes'],
            'status' => 'active'
        ]);


        Device::where('id', $validated['device_id'])->update(['status' => 'assigned']);

        return redirect()->route('assignments')
            ->with('success', 'Device assigned successfully');
    }


    public function show(DeviceAssignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }


    public function edit(DeviceAssignment $assignment)
    {
        $devices = Device::all();
        $staff = Staff::active()->get();
        $labs = Lab::active()->get();

        return view('assignments.edit', compact('assignment', 'devices', 'staff', 'labs'));
    }


    public function update(Request $request, DeviceAssignment $assignment)
    {
        $validated = $request->validate([
            'device_id' => 'required|exists:devices,id',
            'assignee_type' => 'required|in:staff,lab',
            'staff_id' => 'required_if:assignee_type,staff|exists:staff,id',
            'lab_id' => 'required_if:assignee_type,lab|exists:labs,id',
            'assigned_date' => 'required|date',
            'expected_return_date' => 'nullable|date|after:assigned_date',
            'notes' => 'nullable|string|max:500',
            'status' => 'required|in:active,returned,overdue,lost'
        ]);

        $assignment->update($validated);


        if ($validated['status'] === 'returned') {
            Device::where('id', $validated['device_id'])->update(['status' => 'available']);
        } else {
            Device::where('id', $validated['device_id'])->update(['status' => 'assigned']);
        }

        return redirect()->route('assignments')
            ->with('success', 'Assignment updated successfully');
    }


    public function destroy(DeviceAssignment $assignment)
    {

        Device::where('id', $assignment->device_id)->update(['status' => 'available']);

        $assignment->delete();

        return redirect()->route('assignments')
            ->with('success', 'Assignment deleted successfully');
    }

    public function assignDevice($device_id)
    {
        $device = Device::findOrFail($device_id);
        $staff = Staff::active()->get();
        $labs = Lab::active()->get();

        return view('assignments.create', [
            'device' => $device,
            'devices' => Device::where('status', 'available')->get(),
            'staff' => $staff,
            'labs' => $labs
        ]);
    }
    
    public function activeAssignments()
    {
        $assignments = DeviceAssignment::with(['device', 'staff', 'lab'])
            ->where('status', 'active')
            ->latest()
            ->paginate(10);

        return view('assignments.reports.active', compact('assignments'));
    }

    /**
     * Show overdue assignments report
     */
    public function overdueAssignments()
    {
        $assignments = DeviceAssignment::with(['device', 'staff', 'lab'])
            ->where('status', 'overdue')
            ->orWhere(function($query) {
                $query->where('status', 'active')
                      ->where('expected_return_date', '<', Carbon::today());
            })
            ->latest()
            ->paginate(10);

        return view('assignments.reports.overdue', compact('assignments'));
    }
}
