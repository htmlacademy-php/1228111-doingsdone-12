<main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>
        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">
            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                <a href="/" class="tasks-switch__item">Повестка дня</a>
                <a href="/" class="tasks-switch__item">Завтра</a>
                <a href="/" class="tasks-switch__item">Просроченные</a>
            </nav>
            <label class="checkbox">
                <input class="checkbox__input visually-hidden show_completed <?= $show_complete_tasks ? 'checked' : ''; ?>" type="checkbox" value="1">
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>
        <table class="tasks">
            <?php foreach ($filtered_tasks as $task) : ?>
                <?php if (!$task['status']) : ?>
                    <tr class="tasks__item task <?= is_task_important($task['deadline']) ? 'task--important' : ''; ?>">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="<?= $task['id'] ?>">
                                <span class="checkbox__text "><?= htmlspecialchars($task['title']); ?>
                                </span>
                            </label>
                        </td>
                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>
                        <td class="task__date"><?= $task['deadline'] ?></td>
                    </tr>
                <?php elseif ($task['status'] && !$show_complete_tasks) : ?>
                    <tr class="tasks__item task task--completed">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden" type="checkbox" checked>
                                <span class="checkbox__text"><?= htmlspecialchars($task['title']); ?></span>
                            </label>
                        </td>
                        <td class="task__date"><?= htmlspecialchars($task['deadline']); ?></td>
                        <td class="task__controls"></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </main>

