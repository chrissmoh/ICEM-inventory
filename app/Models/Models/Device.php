<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'device_name',
        'category',
        'serial_number',
        'quantity',
        'purchase_date',
        'status',
    ];

}
