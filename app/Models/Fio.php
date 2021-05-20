<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fio extends Model
{
    use HasFactory;

    protected $table = 'fio';
    public $timestamps = true;
    protected $fillable = ['id_fn', 'id_ln', 'id_mn'];
}
