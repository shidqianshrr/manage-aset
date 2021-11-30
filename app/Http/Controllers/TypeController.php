<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $data['page'] = 'Type';
        return view('type.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Type';
        return view('type.create')->with($data);
    }
}
