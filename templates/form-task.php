<main class="content__main">
    <h2 class="content__main-heading">Добавление задачи</h2>
    <form class="form" action="add-task.php" method="post" autocomplete="off" enctype="multipart/form-data">

        <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>

            <input class="form__input <?= $errors['name'] ? 'form__input--error' : ''; ?>" type="text" name="name" id="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : $_POST['name']; ?>" placeholder="Введите название">
            <?php
            if ($errors['name']) : ?>
                <p class="form__message">Обязательное поле для заполнения</p>
            <?php endif; ?>
        </div>

        <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>
            <select class="form__input <?= $errors['project'] ? 'form__input--error' : ''; ?> form__input--select" name="project" id="project">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= !empty($errors['project']) ? $_POST['project'] :  $_POST['project']; ?>"><?= $category['title']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php

            if ($errors['project']) : ?>
                <p class="form__message">Обязательное поле для заполнения</p>

            <?php endif; ?>
        </div>
        <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>
            <input class="form__input form__input--date <?= $errors['date'] ? 'form__input--error' : ''; ?>" type="text" name="date" id="date" value="<?= !empty($errors['date']) ? $_POST['date'] : $_POST['date']; ?>" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <?php
            if ($errors['date']) : ?>
                <p class="form__message">Заполните корректно поле</p>
            <?php endif; ?>
        </div>

        <div class="form__row">
            <label class="form__label" for="file">Файл</label>

            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="file" id="file" value="">

                <label class="button button--transparent" for="file">
                    <span>Выберите файл</span>

                </label>
                <?php if ($errors['file']) : ?>
                    <p class="form__message">Заполните корректно поле</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="form__row form__row--controls">
            <input class="button" type="submit" name="done" value="Добавить">
        </div>

    </form>
</main>
