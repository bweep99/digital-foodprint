<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('articles') ?>">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($article['title']) ?></li>
        </ol>
    </nav>
    
    <article>
        <h1 class="mb-4"><?= esc($article['title']) ?></h1>
        
        <div class="article-meta mb-4">
            <span class="author">By <?= esc($article['author']) ?></span>
            <span class="date">on <?= date('F j, Y', strtotime($article['created_at'])) ?></span>
        </div>
        
        <?php if (isset($article['image'])): ?>
            <div class="article-image mb-4">
                <img src="<?= base_url('images/' . $article['image']) ?>" class="img-fluid" alt="<?= esc($article['title']) ?>">
            </div>
        <?php endif; ?>
        
        <div class="article-content">
            <?= $article['content'] ?>
        </div>
    </article>
</div>
<div class="navigation-links mt-5">
    <div class="row">
        <div class="col-6 text-start">
            <?php if (isset($previous_article)): ?>
                <a href="<?= base_url('articles/' . $previous_article['slug']) ?>" class="btn btn-outline-primary">
                    &larr; Previous: <?= esc($previous_article['title']) ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-6 text-end">
            <?php if (isset($next_article)): ?>
                <a href="<?= base_url('articles/' . $next_article['slug']) ?>" class="btn btn-outline-primary">
                    Next: <?= esc($next_article['title']) ?> &rarr;
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>