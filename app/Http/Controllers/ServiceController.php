<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::query()->paginate(10);

        return ServiceResource::collection($services);
    }
}
