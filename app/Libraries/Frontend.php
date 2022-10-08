<?php

namespace App\Libraries;

class Frontend
{
    public function routes()
    {
        $rr = app('routes')->getRoutesByName();
        $route_list = [];
        foreach ($rr as $key => $value) {
            $variable = $value->action['controller'];
            $ctr = substr($variable, 0, strpos($variable, "@"));
            if ($ctr == 'App\Http\Controllers\MainController') {
                $route_list[] = ['name' => $key, 'controller' => $ctr];
            }
        }
        foreach ($rr as $key => $value) {
            $variable = $value->action['controller'];
            $ctr = substr($variable, 0, strpos($variable, "@"));
            if ($ctr == 'App\Http\Controllers\ShopController') {
                $route_list[] = ['name' => $key, 'controller' => $ctr];
            }
        }
        $route_list[] = ['name' => 'login', 'controller' => 'App\Http\Controllers\Auth\LoginController'];
        $route_list[] = ['name' => 'register', 'controller' => 'App\Http\Controllers\Auth\RegisterController'];
        // $route_list[] = ['name' => 'order_now', 'controller' => 'App\Http\Controllers\ShopController'];
        return $route_list;
    }
}
