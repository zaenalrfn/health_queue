<?php

namespace App\Services;

use App\Models\QueueNumber;
use App\Events\QueueCreated;

class QueueServices
{
    public function getQueuePoliUmum()
    {
        return QueueNumber::with('service')->where('name', 'Poli Umum')->paginate(10);
    }
    public function getQueuePoliGizi()
    {
        return QueueNumber::with('service')->where('name', 'Poli Gizi')->paginate(10);
    }

    public function createQueue(array $data)
    {
        $lastQueue = QueueNumber::where('service_id', $data['service_id'])->orderBy('number', 'desc')->first();

        $nextNumber = $lastQueue ? $lastQueue->number + 1 : 1;

        $queue = QueueNumber::create([
            'service_id' => $data['service_id'],
            'number' => $nextNumber,
            'status' => 'waiting',
        ]);
        event(new QueueCreated($queue));
        return $queue;
    }
}
