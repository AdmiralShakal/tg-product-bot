<?php


namespace App\Listeners;


use App\Events\OrderStore;
use App\Helpers\Telegram;

class TelegramSubscriber
{
    protected $telegram;

    public function __construct(Telegram  $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param OrderStore $event
     * @return array
     */

    public function orderStore($event) : void
    {
        $data = [
            'id' => $event->order->id,
            'product_name' => $event->order->product_name,
            'product_count' => $event->order->product_count,
            'product_price' => $event->order->product_price,
            'phone' => $event->order->phone
        ];

        $reply_markup = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => 'Принять',
                            'callback_data' => '1|'.$event->order->secret_key,
                        ],
                        [
                            'text' => 'Отклонить',
                            'callback_data' => '0|'.$event->order->secret_key,
                        ],
                    ]
                ]
        ];

        $this->telegram->sendButtons(env('TELEGRAM_REPORT_ID'), view('site.messages.new_order', $data)->render(), $reply_markup);
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            OrderStore::class, [
                TelegramSubscriber::class, 'orderStore'
            ]
        );

    }
}
