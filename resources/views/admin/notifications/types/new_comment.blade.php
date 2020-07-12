<a href="{{ route('admin.order_comments',['order' => $notification->data['order']['id'], 'notif_id' => $notification->id]) }}" class="d-flex justify-content-between px-4">
        <span>{{ $notification->data['body'] }}</span>
    @if ($notification->unread())
        <i class="fas fa-envelope"></i>
    @else
        <i class="fas fa-envelope-open"></i>
    @endif
    </a>