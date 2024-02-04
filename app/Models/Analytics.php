<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_id', 
        'total_promotions',
        'total_views',
        'average_view_count',
        'average_session_duration',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
