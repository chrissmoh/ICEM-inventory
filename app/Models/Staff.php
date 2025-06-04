<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'department',
        'position',
        'status',
        'hire_date',
        'notes'
    ];

    protected $casts = [
        'hire_date' => 'date'
    ];

    // Active staff scope
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Relationship with device assignments
    public function assignments()
    {
        return $this->hasMany(DeviceAssignment::class);
    }
}
