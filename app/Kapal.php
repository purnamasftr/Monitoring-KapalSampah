<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kapal extends Authenticatable
{
    protected $table = 'kapal';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'hrm_me', 'hrm_ae', 'status', 'keterangan'];
}
