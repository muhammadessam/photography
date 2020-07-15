<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Comment;
use App\Not;
use App\Notification;
use App\Notifications\Admin\NewComment;
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
        $order = Order::find($request->get('order_id'));

        $comment = Comment::create($request->except('_token'));

        // notify admin
        foreach (Admin::all() as $admin) {
            Not::query()->create([
                'body' => 'لقد تم اضافة تعليق جديد من قبل العميل',
                'admin_id' => $admin->id,
            ]);
        }


        return redirect()->route('account.orders.show', ['id' => $request->order_id, 'tab' => 'comments']);
    }

}
