<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    // relasi ke QueueNumber
    public function queueNumbers()
    {
        return $this->hasMany(QueueNumber::class);
    }
}
