<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\Console\Input\Input;


/**
 * @method static where(array $array)
 * @property mixed name
 */
trait CheckExistOrCreate
{
    /**
     * @param $name
     * @return CheckExistOrCreate|Model
     */
    public function checkExistOrCreate($name)
    {
        $name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
        if (self::where(['name' => $name])->exists()) {
            return self::where(['name' => $name])->first();
        }
        $this->name = $name;
        $this->save();
        return $this;
    }
}
