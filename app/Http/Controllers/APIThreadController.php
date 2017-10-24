<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class APIThreadController extends Controller
{
    public function index()
    {
        return Thread::all();
    }

    public function show(Thread $thread) {
        return $thread;
    }
}
