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
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $obRequest)
    {
        if ($obRequest->method() !== 'POST') {
            return view('login');
        }
        return false;
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
        if ($obRequest->method() !== 'POST') {
            return view('register');
        }
        if (!($obValidated = $obRequest->validate(
            [
                'username' => 'unique:users|min:5|max:31',
                'fn' => 'required|min:2',
                'ln' => 'required|min:2',
                'mn' => 'required|min:2',
                'password' => 'required|min:6|max:63|same:password_repeat',
                'password_repeat' => 'min:6',
            ]
        ))) {
            return;
        };
        $obFio->fill([
            'id_fn' => $obFirstName->checkExistOrCreate($obRequest->fn)->id,
            'id_ln' => $obLastName->checkExistOrCreate($obRequest->ln)->id,
            'id_mn' => $obMiddleName->checkExistOrCreate($obRequest->mn)->id,
        ])->save();

        $obUser->fill([
            'username' => $obRequest->username,
            'password' => Hash::make($obRequest->password),
            'id_fio' => $obFio->id,
        ])->save();

        $obUserRole->fill([
            'id_user' => $obUser->id,
            'id_role' => $obRole->findRoleIdByName('user')
        ])->save();
        return redirect(route('login'));
    }

    public function logout()
    {
        $this->logout();
        return redirect(route('home'));
    }
}
