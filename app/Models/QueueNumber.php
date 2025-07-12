<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueNumber extends Model
{
    protected $fillable = [
        'service_id',
        'number',
        'status',
    ];

    // relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
