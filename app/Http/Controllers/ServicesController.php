<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\ServicesRequestCreate;
use App\Services\ServiceServices;

class ServicesController extends Controller
{
    protected $serviceServices;

    public function __construct(ServiceServices $serviceServices)
    {
        $this->serviceServices = $serviceServices;
    }
    public function index()
    {
        $services = $this->serviceServices->getServices();
        return Inertia::render('services/ServicesPage', [
            'services' => $services
        ]);
    }
    public function store(ServicesRequestCreate $request)
    {
        try {
            $data = $request->validated();
            $this->serviceServices->createService($data);
            return redirect()->route('admin.services.index')->with('success', 'Services created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.services.index')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $service = $this->serviceServices->getServiceById($id);
        return Inertia::render('services/UpdateServicePage', [
            'service' => $service
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'code' => 'required',
            ]);
            $this->serviceServices->updateService($data, $id);
            return redirect()->back()->with('success', 'Services updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $this->serviceServices->deleteService($id);
            return redirect()->back()->with('success', 'Services deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
