<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Fio;
use App\Models\FirstName;
use App\Models\LastName;
use App\Models\MiddleName;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $obRequest)
    {
        if ($obRequest->method() !== 'POST') {
            return view('login');
        }

        // Auth::attempt сама находит в бд юзера и все сверяет
        if (Auth::attempt($obRequest->only('username', 'password'))) {
            $obRequest->session()->regenerate();
            return redirect()->intended('/');
        }

        return \redirect()->back()->withErrors(['Неправильный логин или пароль']);
    }

    public function register(
        Request $obRequest,
        MiddleName $obMiddleName,
        FirstName $obFirstName,
        LastName $obLastName,
        Fio $obFio,
        User $obUser,
        Role $obRole,
        UserRole $obUserRole
    )
    {
        // Если метод запроса не POST, по бизнес логике тут нету передаваемых параметров
        // поэтому мы возвращаем view(), если ..->method() === POST, работаем дальше
        if ($obRequest->method() !== 'POST') {
            return view('register');
        }

        // Валидация данных, отправленных с формы
        $obRequest->validate([
                'username' => 'unique:users|min:5|max:31',
                'fn' => 'required|min:2',
                'ln' => 'required|min:2',
                'mn' => 'required|min:2',
                'password' => 'required|min:6|max:63',
            ]);

        // Заполняем модель фио id`шками под поля Имя, Фамилия, Отчество (По сути, тут создается от 1-й модели FIO
        // так и вплоть до 4-х -- FIO, FirstName, LastName, MiddleName
        // как работает функция checkExistOrCreate смотреть в трейте CheckExistOrCreate.php
        // после добавляем строку в бд
        $obFio->fill([
            'id_fn' => $obFirstName->checkExistOrCreate($obRequest->fn)->id,
            'id_ln' => $obLastName->checkExistOrCreate($obRequest->ln)->id,
            'id_mn' => $obMiddleName->checkExistOrCreate($obRequest->mn)->id,
        ])->save();

        // Заполняем модель пользователей
        // после добавляем строку в бд
        $obUser->fill([
            'username' => $obRequest->username,
            'password' => Hash::make($obRequest->password),
            'id_fio' => $obFio->id,
        ])->save();

        // Заполняем модель пользователей
        // после добавляем строку в бд
        $obUserRole->fill([
            'id_user' => $obUser->id,
            'id_role' => $obRole->findRoleIdByName('user')
        ])->save();
        return redirect(route('login'));
    }

    public function logout()
    {
        $this->logout();
        return redirect(route('login'));
    }
}
