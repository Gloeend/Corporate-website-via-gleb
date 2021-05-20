<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstName extends Model
{
    use HasFactory;
    use CheckExistOrCreate;

    protected $table = 'fn';
    public $timestamps = true;

}
