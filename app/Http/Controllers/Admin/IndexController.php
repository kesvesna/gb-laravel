<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(): string
    {
        return view('admin.index');
    }

    public function test1(): string
    {
        return view('admin.test1');
    }

    public function test2(): string
    {
        return view('admin.test2');
    }
}
