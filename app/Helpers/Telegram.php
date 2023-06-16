<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram {

    protected $http;
    protected $bot;
    const url = 'https://api.tlgr.org/bot';

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->bot = env('TELEGRAM_TOKEN');
    }

    public function sendMessage($chat_id, $message){
      return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null){
        $content = file_get_contents(public_path($file));
        return $this->http::attach('document',$content,'document',['multipart' => true])
            ->post(self::url.$this->bot.'/sendDocument', [
            'chat_id' => $chat_id,
            'reply_to_message_id' => $reply_id
        ]);
      }
}