<?php
/* @var $this yii\web\View */
/* @var $obOrdersInWait \app\models\Order */
/* @var $obOrdersInAccept \app\models\Order */
/* @var $obUsers \app\models\User */

$this->title = 'Панель администратора'
?>

<div class="section">
    <div class="section__header">
        <div class="section__title">
            <h3>Админ-панель</h3>
        </div>
    </div>
    <div class="section__body">
        <table class="table" cellspacing="0">
            <caption class="table__title">Текущие заявки</caption>
            <thead class="table__head">
            <tr class="table__row">
                <td class="table__item">Имя</td>
                <td class="table__item">Фамилия</td>
                <td class="table__item">Отчество</td>
                <td class="table__item">Возраст</td>
                <td class="table__item">Итоговая услуга</td>
                <td class="table__item">Стоимость</td>
            </tr>
            </thead>

            <tbody class="table__body">
            <?php foreach ($obOrdersInWait as $obOrder): ?>
            <tr class="table__row">
                <td class="table__item"><?= $obOrder->user->userFios[0]->fio->fn->title ?></td>
                <td class="table__item"><?= $obOrder->user->userFios[0]->fio->ln->title ?></td>
                <td class="table__item"><?= $obOrder->user->userFios[0]->fio->mn->title ?></td>
                <td class="table__item"><?= $obOrder->user->age ?></td>
                <td class="table__item"><?= $obOrder->softwareService->software->title . ': <br>' . $obOrder->softwareService->service->title ?></td>
                <td class="table__item"><?= $obOrder->sum ?></td>
                <td class="table__item"><a href="/admin/accept?id=<?= $obOrder->id ?>" class="table__action table__action--blue">Принять</a></td>
                <td class="table__item"><a href="/admin/deny?id=<?= $obOrder->id ?>" class="table__action">Отказ</a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
<div class="section">
    <div class="section__header">
    </div>
    <div class="section__body">
        <table class="table" cellspacing="0">
            <caption class="table__title">Одобренные заявки</caption>
            <thead class="table__head">
            <tr class="table__row">
                <td class="table__item">Имя</td>
                <td class="table__item">Фамилия</td>
                <td class="table__item">Отчество</td>
                <td class="table__item">Возраст</td>
                <td class="table__item">Итоговая услуга</td>
                <td class="table__item">Стоимость</td>
            </tr>
            </thead>

            <tbody class="table__body">
            <?php foreach ($obOrdersInAccept as $obOrder): ?>
                <tr class="table__row">
                    <td class="table__item"><?= $obOrder->user->userFios[0]->fio->fn->title ?></td>
                    <td class="table__item"><?= $obOrder->user->userFios[0]->fio->ln->title ?></td>
                    <td class="table__item"><?= $obOrder->user->userFios[0]->fio->mn->title ?></td>
                    <td class="table__item"><?= $obOrder->user->age ?></td>
                    <td class="table__item"><?= $obOrder->softwareService->software->title . ': <br>' . $obOrder->softwareService->service->title ?></td>
                    <td class="table__item"><?= $obOrder->sum ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
<div class="section">
    <div class="section__header">
        <div class="section__title">
        </div>
    </div>
    <div class="section__body">
        <table class="table" cellspacing="0">
            <caption class="table__title">Пользователи</caption>
            <thead class="table__head">
            <tr class="table__row">
                <td class="table__item">Логин</td>
                <td class="table__item">Имя</td>
                <td class="table__item">Фамилия</td>
                <td class="table__item">Отчество</td>
                <td class="table__item">Возраст</td>
            </tr>
            </thead>

            <tbody class="table__body">
            <?php foreach ($obUsers as $obUser): ?>
                <tr class="table__row">
                    <td class="table__item"><?= $obUser->username ?></td>
                    <td class="table__item"><?= $obUser->userFios[0]->fio->fn->title ?></td>
                    <td class="table__item"><?= $obUser->userFios[0]->fio->ln->title ?></td>
                    <td class="table__item"><?= $obUser->userFios[0]->fio->mn->title ?></td>
                    <td class="table__item"><?= $obUser->age ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
