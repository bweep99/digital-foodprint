<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1><?= esc($title) ?></h1>
    
    <?php if (!empty($articles) && is_array($articles)): ?>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if (isset($article['image'])): ?>
                            <img src="<?= base_url('images/' . $article['image']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>">
                        <?php else: ?>
                            <img src="https://img.harianjogja.com/posts/2025/04/24/1211404/gudang-beras.jpg"<?= base_url('images/placeholder.jpg') ?>" class="card-img-top" alt="Placeholder">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text"><?= substr(strip_tags($article['content']), 0, 100) ?>...</p>
                        </div>
                        
                        <div class="card-footer">
                            <small class="text-muted">By <?= esc($article['author']) ?> on <?= date('F j, Y', strtotime($article['created_at'])) ?></small>
                            <a href="<?= base_url('articles/' . $article['slug']) ?>" class="btn btn-primary float-end">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">No articles found</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>