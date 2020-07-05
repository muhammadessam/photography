<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notification;
use App\Order;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Order::query()->find($request->get('order_id'))->user;
        Notification::query()->create([
            'body'      =>  'هناك تعليق جديد علي مناسبة لك',
            'user_id'   =>  $user->id,
        ]);
        if(Comment::create($request->except('_token'))){
            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

}
