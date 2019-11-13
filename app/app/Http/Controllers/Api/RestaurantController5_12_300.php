<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RestaurantService;
use App\Http\Controllers\Controller;

class RestaurantController5_12_300 extends Controller
{
    protected $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function dataGenerate(){
        $response = $this->restaurantService->dataGenerate();
        die(json_encode($response));
    }

    public function getRestaurant(){
        if (!empty(request()->search_by_name)){
            $response = $this->restaurantService->getRestaurantbyName(request()->search_by_name);
        }elseif (!empty(request()->sort_by)){
            $response = $this->restaurantService->getRestaurant(request()->sort_by);
        }else{
            $response = $this->restaurantService->getRestaurant('open');
        }
        $data = $this->restaurantService->nameTagChange($response);
        die(json_encode($data));
    }
}
