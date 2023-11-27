<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tweets()->with(['user'])->latestFirst()->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $tweet = $request->user()->tweets()->create([
            'body' => $request->body
        ])->load('user');

        return $tweet;
    }
}
