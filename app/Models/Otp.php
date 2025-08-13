<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'otps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier', 'model_type', 'model_id', 'token', 'valid', 'validity', 'type'
    ];

    const TYPE_LOGIN = 1;
    const TYPE_REGISTER = 2;
}
