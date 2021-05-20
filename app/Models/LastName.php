<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastName extends Model
{
    use HasFactory;
    protected $table = 'ln';
    use CheckExistOrCreate;


}
