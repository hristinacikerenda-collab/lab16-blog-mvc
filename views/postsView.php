<?php include 'views/layout/header.php'; ?>

<div class="container">
    <form method="GET" action="" class="row g-2 mb-4">
        <div class="col-sm-9 col-md-10">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Пошук поста за назвою..."
                value="<?= htmlspecialchars($search ?? '') ?>"
            >
        </div>
        <div class="col-sm-3 col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Знайти</button>
        </div>
    </form>

    <?php if (empty($posts)): ?>
        <div class="alert alert-warning">За запитом нічого не знайдено.</div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4"><?= htmlspecialchars($post->title) ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted">Дата створення: <?= htmlspecialchars($post->date) ?></h6>
                    <div class="card-text">
                        <?= $parsedown->text($post->content) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>