<h1>Добавление задачи</h1>
<form action="<?=PATH?>/main/add" method="post">
    <div class="form-group">
        <label for="name">Имя пользователя</label>
        <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name='name' placeholder="Введите имя" value="<?=htmlspecialchars($name, ENT_QUOTES)?>">
        <small id="nameHelp" class="form-text text-muted">Вы должны ввести имя</small>
    </div>
    <div class="form-group">
        <label for="email">Email адрес</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name='email' placeholder="Введите email" value="<?=htmlspecialchars($email, ENT_QUOTES)?>">
        <small id="emailHelp" class="form-text text-muted">Необходимо ввести email согласно следующему формату  name@domain.ru </small>
    </div>
    <div class="form-group">
        <label for="text">Текст задачи</label>
        <textarea type="text" class="form-control" id="text" aria-describedby="textHelp" name='text' placeholder="Введите текст"> <?=htmlspecialchars($text, ENT_QUOTES)?></textarea>
        <small id="textHelp" class="form-text text-muted">Введите текст задачи</small>
    </div>
    <input type="hidden" name="new" value="1">
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
