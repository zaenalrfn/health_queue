<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QueueRequestCreate;
use Inertia\Inertia;

class QueueController extends Controller
{
    public function index()
    {
        return Inertia::render('antrean/AntreanPage');
    }
    public function store(QueueRequestCreate $request)
    {
        try {
            $data = $request->validated();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
