<?php

namespace App\Services;

use App\Models\GroupChat;

class GroupChatService
{
    function __construct(){}

    public function count($is_private = false) {
        return GroupChat::where('is_group', $is_private ? 0 : 1)->count();
    }
}