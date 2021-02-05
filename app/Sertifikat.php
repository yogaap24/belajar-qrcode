<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Sertifikat extends Eloquent implements AuthenticatableContract
{
    use AuthenticableTrait;
    use Notifiable;

    protected $connection = 'mongodb';

    protected $table = 'sertifikat';

    protected $fillable = [
        'nama_lengkap','tanggal_lahir','gender','no_sertifikat','tanggal_test',
        'id_test', 'sect_1', 'score_1', 'sect_2', 'score_2', 'sect_3', 'score_3'
    ];
}
