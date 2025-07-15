<?php

namespace App\Services;

use App\Models\Service;

class ServiceServices
{
    public function getServices()
    {
        return Service::orderBy('created_at', 'desc')->paginate(10);
    }
    public function createService(array $data)
    {
        return Service::create($data);
    }
    public function getServiceById($id)
    {
        return Service::find($id);
    }
    public function updateService(array $data, $id)
    {
        return Service::where('id', $id)->update($data);
    }
    public function deleteService($id)
    {
        return Service::where('id', $id)->delete();
    }
}
