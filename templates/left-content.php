<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>
    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($categories as $category) : ?>
                <li class="main-navigation__list-item <?= $category['id'] === $active_category_id ? 'main-navigation__list-item--active' : ''; ?>">
                    <a class="main-navigation__list-item-link" href="index.php?category_id=<?= $category['id'] ?>"><?= $category['title']; ?></a>
                    <span class="main-navigation__list-item-count"><?= htmlspecialchars(count_task_categories($category['id'], $all_tasks)); ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <a class="button button--transparent button--plus content__side-button" href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>
