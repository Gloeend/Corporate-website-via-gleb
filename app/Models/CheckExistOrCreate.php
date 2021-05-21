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

    // Принимается строка $name
    // mb_substr выбирает первый элемент в строке
    // mb_strtoupper выбирает остальные элемент строки и приводит к нижнему регистру, и мы все это делаем одной строкой
    // Зачем?
    // Пользователь может ввести имя гЛеБ
    // в базе данных уже есть по сути имя Глеб
    // но если просто проверять на нахождение, то оно не найдет Глеб === гЛеБ
    // поэтому мы приводим все строки к виду Глеб
    // После мы смотрим в модели, есть ли поле `name` с таким значением, если есть - возвращаем эту строку
    // А если нету - создаем новую строку и тоже ее возвращаем

    public function checkExistOrCreate($name)
    {
        $name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_strtolower(mb_substr($name, 1));
        if (self::where(['name' => $name])->exists()) {
            return self::where(['name' => $name])->first();
        }
        $this->name = $name;
        $this->save();
        return $this;
    }
}
