<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicosprofissionais extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    protected $table = 'servicosprofissionais'; // Nome da tabela

    public function user() {
        return $this->belongsTo('App\Models\User');

    }
}
