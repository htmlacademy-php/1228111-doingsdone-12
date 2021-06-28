<main class="content__main">
        <h2 class="content__main-heading">Вход на сайт</h2>

        <form class="form" action="form-authorization.php" method="post" autocomplete="off">
          <div class="form__row">
            <label class="form__label" for="email">E-mail <sup>*</sup></label>

            <input class="form__input <?= !empty($errors['email']) ? 'form__input--error' : ''; ?>" type="text" name="email" id="email" value="<?= !empty($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Введите e-mail">
            <?php if (isset($errors['name'])) : ?>
            <p class="form__message">E-mail введён некорректно</p>
            <?php endif; ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="password">Пароль <sup>*</sup></label>

            <input class="form__input <?= !empty($errors['password']) ? 'form__input--error' : ''; ?>" type="password" name="password" id="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="Введите пароль">
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Войти">
          </div>
        </form>

      </main>
