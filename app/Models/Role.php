<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array $array)
 */
class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    public $timestamps = true;

    public function findRoleIdByName($name)
    {
        if (self::where(['name' => $name])->exists()) {
            return self::where(['name' => $name])->first()->id;
        }
        return null;
    }
}
