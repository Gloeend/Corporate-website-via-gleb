<?php
namespace app\models;

trait CheckToExistFioAttributes {

    public function check($title, $attr = 'title')
    {
        /* @var $this FirstName */
        if ($obRes = $this->find()->where([$attr => $title])->one()) {
            return $obRes->id;
        }
        $this->$attr = $title;
        $this->save();
        return $this->id;
    }
}
