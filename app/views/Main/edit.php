<h1>Редактирование задачи</h1>
<form action="<?=PATH?>/main/edit" method="post">
    <input type="hidden" value="<?=$id?>" name="id">
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
        <label for="text">Описание задачи</label>
        <textarea type="text" class="form-control" id="text" aria-describedby="textHelp" name='text' placeholder="Введите текст"> <?=htmlspecialchars($text, ENT_QUOTES)?></textarea>
        <small id="textHelp" class="form-text text-muted">Введите текст задачи</small>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Статус задачи</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="finish">
            <option disabled>Выберите статус</option>
            <option <?php if($finish==0):?>
                    selected
                    <?php endif;?>
                    value="0">Новая</option>
            <option <?php if($finish==1):?>
                    selected
                    <?php endif;?>value="1">Выполнено</option>
        </select>
    </div>
    <button type="submit" class="mt-4 btn btn-primary">Сохранить изменения</button>
</form>
