<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        dump(\request()->all());
        return response(['message' => 'ok']);
    }
}
