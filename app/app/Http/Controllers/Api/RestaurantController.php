<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RestaurantService;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function dataGenerate(){
        $response = $this->restaurantService->dataGenerate();
        die(json_encode($response));
    }
}
