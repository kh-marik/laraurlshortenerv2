<?php

namespace UrlShortener\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UrlShortener\Http\Requests;
use UrlShortener\Models\Link;

class UserController extends Controller
{
    public function mylinks()
    {
        $links = Link::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('users.mylinks', compact('links'));
    }
}
