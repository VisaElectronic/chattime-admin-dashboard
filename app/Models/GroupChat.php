<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GroupChat extends Model
{
    protected $table = 'groups';

    /**
     * Get the roles that belong to the channels.
     *
     * @return BelongsToMany
     */
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'groups_channels', 'group_id', 'channel_id');
    }
}
