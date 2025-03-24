<?php

namespace App\Listeners;

use App\Http\Controllers\UserLogController;
use Illuminate\Auth\Events\Logout;

class LogoutListener
{
    protected $userLogController;

    public function __construct(UserLogController $userLogController)
    {
        $this->userLogController = $userLogController;
    }

    public function handle(Logout $event)
    {
        $this->userLogController->log('logout');
    }
}
