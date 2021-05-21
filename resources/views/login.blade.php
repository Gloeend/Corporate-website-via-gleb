<form action="{{route('login')}}" method="post">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="text" name="username" placeholder="Логин">

    <input type="password" name="password" placeholder="Пароль">

    <button type="submit">Отправить</button>

</form>
