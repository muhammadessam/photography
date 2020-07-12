<div class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-end">
        <small >{{$notification->created_at->diffForHumans()}}</small>
    </div>
    <a href="{{ route('account.orders.show', ['id' => $notification->data['order']['id'], 'tab' => 'comments', 'notif_id' => $notification->id]).'#comment'.$notification->data['comment']['id'] }}" class="mb-1">
        {{$notification->data['body']}}
    </a>
</div>