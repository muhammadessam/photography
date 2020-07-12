<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdated extends Notification
{
    use Queueable;

    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order' => $this->order,
            'body' => $this->getMessage(),
        ];
    }

    private function getMessage()
    {
        switch ($this->order->status) {
            case 'waiting':
                return 'طلبك في إنتظار';      
            case 'accepted':
                return 'تم قبول طلبك';      
            case 'billed':
                return 'تم إصدار فاتورة غير مسددة لطلبك';      
            case 'final':
                return 'تم قبول طلبك نهائيا';      
            case 'rejected':
                return 'الإدارة رفضت طلبك';;
            default:
                return 'تم تحديث حالة طلبك';
        }
    }
}
