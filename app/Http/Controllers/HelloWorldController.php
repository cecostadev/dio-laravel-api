<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    function hello($param)
    {
        return "Buscando da Controller : $param";
    }

    function visualize(Request $request)
    {
        return response()->json([
            'resp' => $request->all()
        ]);
    }
}
