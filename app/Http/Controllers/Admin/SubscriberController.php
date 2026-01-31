<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
