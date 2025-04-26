<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Digital Foodprint</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="stuff.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        .article-meta {
            color: #666;
            font-size: 0.9rem;
        }
        
        .article-meta .author {
            font-weight: bold;
        }
        
        .article-meta .date {
            margin-left: 10px;
        }
        
        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        .article-content p {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="background-color: #c8e6c9;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">DIGITAL FOODPRINT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('tracetaste') ?>">TRACE & TASTE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('growpedia') ?>">GROWPEDIA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('articles') ?>">AGRITALES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?= $this->renderSection('content') ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>