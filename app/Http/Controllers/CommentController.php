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
            'user_id'   =>  auth()->id(),
        ]);
        Comment::create($request->except('_token'));

        return redirect()->route('account.orders.show', ['id' => $request->order_id, 'tab' => 'comments']);
    }

}
