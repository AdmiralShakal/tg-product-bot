<?php

namespace App\Exceptions;

use App\Helpers\Telegram;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Http;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $telegram;
    public function __construct(Container $container, Telegram $telegram) 
    {
        parent::__construct($container);
        $this->telegram = $telegram;
    }
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function report(Throwable $e):void
    {   
        $data = [
            'description' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ];

        $id = env('TELEGRAM_REPORT_ID');
        $this->telegram->sendMessage($id, view('report', $data)->render()); //view('report', $data)->render()
    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
