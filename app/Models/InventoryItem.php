<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class InventoryItem extends Model
{
    protected $fillable = [
        'device_name',
        'category',
        'serial_number',
        'quantity',
        'purchase_date',
        'status',
        'device_image'
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->device_image
            ? asset('storage/'.$this->device_image)
            : asset('assets/img/default-device.jpg');
    }

    // Scope for active items
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }



}
