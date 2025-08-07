<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    function __construct(){}

    public function count() {
        return Message::count();
    }
}