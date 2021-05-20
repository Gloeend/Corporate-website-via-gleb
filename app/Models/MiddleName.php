<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;


/**
 * @method static where(array $array)
 * @property mixed name
 */
class MiddleName extends Model
{
    use HasFactory;
    use CheckExistOrCreate;

    protected $table = 'mn';
    protected $fillable = ['name'];
    public $timestamps = true;

}
