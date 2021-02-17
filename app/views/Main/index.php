


<h1>Список задач</h1>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col"> <a href="<?=PATH?>/main/index?sort=name&by=asc">&#9650</a><a href="<?=PATH?>/main/index?sort=name&by=desc">&#9660;</a><span class="pl-1">Имя</span></th>
        <th scope="col"><a href="<?=PATH?>/main/index?sort=email&by=asc">&#9650</a><a href="<?=PATH?>/main/index?sort=email&by=desc">&#9660;</a><span class="pl-1">e-mail</span></th>
        <th scope="col">Текст задачи</th>
        <th scope="col"><a href="<?=PATH?>/main/index?sort=finish&by=asc">&#9650</a><a href="<?=PATH?>/main/index?sort=finish&by=desc">&#9660;</a><span class="pl-1">Статус</span></th>
        <th scope="col">Редактированно</th>
        <?php if($admin):?>
        <th scope="col">действие</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task):?>
    <tr>
        <td><?=$task['name']?></td>
        <td><?=$task['email']?></td>
        <td><?=$task['text']?></td>
        <td><?=$task['finish'] ? 'Выполнено' : 'Новая' ?></td>
        <td><?=$task['edit_admin'] ? 'Отредактировано' : 'Оригинал' ?></td>
        <?php if($admin):?>
            <th scope="col"><a href="<?=PATH?>/main/edit?id=<?=$task['id']?>" class="btn btn-outline-primary">Редактировать</a> </th>
        <?php endif;?>

    </tr>
    <?php endforeach;?>
    </tbody>


</table>
<?php if (is_object($pagination) && ($pagination->countPages>1)): ?>
    <?=$pagination;?>
<?php endif;?>

<a class="btn btn-outline-primary" href="<?=PATH?>/main/add">Добавить новую задачу</a>

