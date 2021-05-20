<form action="{{route('register')}}" method="post">
    @csrf
    <input type="text" name="fn" placeholder="Имя">
    <input type="text" name="ln" placeholder="Фамилия">
    <input type="text" name="mn" placeholder="Отчество">

    <input type="text" name="username" placeholder="Логин">

    <input type="password" name="password" placeholder="Пароль">
    <input type="password" name="password__repeat" placeholder="Повтор пароля">

    <button type="submit">Отправить</button>

</form>
