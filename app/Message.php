<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['idUserSend','idUserRecive','desc','response','time_send'];
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
