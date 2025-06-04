<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceAssignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id',
        'assignee_type',
        'staff_id',
        'lab_id',
        'assigned_date',
        'expected_return_date',
        'returned_date',
        'status',
        'notes',
        'assigned_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'assigned_date' => 'date',
        'expected_return_date' => 'date',
        'returned_date' => 'date',
    ];

    /**
     * Get the device associated with the assignment.
     */
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * Get the staff member assigned to the device (if assignee_type is 'staff').
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    /**
     * Get the lab assigned to the device (if assignee_type is 'lab').
     */
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    /**
     * Get the user who assigned the device.
     */
    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    /**
     * Scope for active assignments.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for overdue assignments.
     */
    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue');
    }

    /**
     * Scope for returned assignments.
     */
    public function scopeReturned($query)
    {
        return $query->where('status', 'returned');
    }
}
