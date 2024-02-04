<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'image', 'business_id',
    ];

    // Example of a relationship method
    // public function business()
    // {
    //     return $this->belongsTo(Business::class);
    // }
}
