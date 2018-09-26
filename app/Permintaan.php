<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permintaan extends Authenticatable
{
    protected $table = 'permintaan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kapal', 'juru_mudi', 'tanggal_isi', 'id_permintaan', 'v_permintaan', 'v_awal', 'vts', 'v_me', 'v_ae', 'v_pemakaian', 'v_sisa', 'min_id'];
}
