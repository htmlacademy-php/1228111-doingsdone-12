<?php
session_start();
?>
<main class="content__main">
    <h2 class="content__main-heading">Регистрация аккаунта</h2>

    <form class="form" action="form-register.php" method="post" autocomplete="off">
        <div class="form__row">
            <label class="form__label" for="email">E-mail <sup>*</sup></label>

            <input class="form__input  <?= empty(htmlspecialchars($_POST['email'])) ? 'form__input--error' : ''; ?>" type="text" name="email" id="email" value="" placeholder="Введите e-mail">
            <?php if (isset($errors['email'])) : ?>
                <p class="form__message">E-mail введён некорректно</p>
            <?php endif; ?>
        </div>

        <div class="form__row">
            <label class="form__label" for="password">Пароль <sup>*</sup></label>

            <input class="form__input <?= empty(md5($_POST['name'])) ? 'form__input--error' : ''; ?>" type="password" name="password" id="password" value="" placeholder="Введите пароль">
        </div>

        <div class="form__row">
            <label class="form__label" for="name">Имя <sup>*</sup></label>

            <input class="form__input  <?= empty(htmlspecialchars($_POST['name'])) ? 'form__input--error' : ''; ?>" type="text" name="name" id="name" value="" placeholder="Введите имя">
        </div>

        <div class="form__row form__row--controls">
            <?php if (!empty($errors)) : ?>
                <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
            <?php endif; ?>
            <input class="button" type="submit" name="done" value="Зарегистрироваться">
        </div>
    </form>
</main>
