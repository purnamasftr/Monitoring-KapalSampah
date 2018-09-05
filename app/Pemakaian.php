<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemakaian extends Authenticatable
{
    protected $table = 'pemakaian';
    protected $primaryKey = 'id';
    protected $fillable = ['id_permintaan', 'tanggal', 'mulai', 'selesai', 'pakai_jam', 'bbm_me', 'bbm_ae'];
}
