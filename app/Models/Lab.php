<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'room_number',
        'status',
        'supervisor_id',
        'description'
    ];

    // Active lab scope
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Relationship with supervisor
    public function supervisor()
    {
        return $this->belongsTo(Staff::class, 'supervisor_id');
    }

    // Relationship with device assignments
    public function assignments()
    {
        return $this->hasMany(DeviceAssignment::class);
    }
}
