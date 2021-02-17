<div class="row pt-4 d-flex justify-content-center">
    <div class="col-4 ">
        <div class="card">
            <div class="card-body">
                <form action="<?=PATH?>/login/index" method="post">
                    <div class="form-group">
                        <label for="login">Введите логин</label>
                        <input type="text" class="form-control" id="login" name="login">
                     </div>
                    <div class="form-group">
                        <label for="password">Введите пароль</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="hidden" name="new" value="1">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>

