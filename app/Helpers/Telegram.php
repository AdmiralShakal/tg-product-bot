<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Telegram {

    protected $http;
    protected $bot;
    const url = 'https://api.tlgr.org/bot';

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->bot = env('TELEGRAM_TOKEN ');
    }

    public function sendMessage($chat_id, $message){
      return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }
}