<?php

namespace App\Listeners;

use App\Http\Controllers\UserLogController;
use Illuminate\Auth\Events\Login;

class LoginListener
{
    protected $userLogController;

    public function __construct(UserLogController $userLogController)
    {
        $this->userLogController = $userLogController;
    }

    public function handle(Login $event): void
    {
        $this->userLogController->log('login');
    }
}
