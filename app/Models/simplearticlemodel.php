<?php

namespace App\Models;

class SimpleArticleModel
{
    // Store articles in a JSON file
    protected $articlesFile;
    
    public function __construct()
    {
        $this->articlesFile = WRITEPATH . 'articles.json';
        
        // Create the file if it doesn't exist
        if (!file_exists($this->articlesFile)) {
            $this->initializeArticles();
        }
    }
    
    // Initialize with some sample articles
    private function initializeArticles()
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'First Article',
                'slug' => 'first-article',
                'content' => '<p>This is the content of the first article. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Vivamus lacinia, nisl ut tincidunt egestas, nisl nisl aliquet elit, nec aliquet nisl nisl ut nisl.</p>',
                'image' => 'article1.jpg',
                'author' => 'John Doe',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'title' => 'Second Article',
                'slug' => 'second-article',
                'content' => '<p>This is the content of the second article. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>',
                'image' => 'article2.jpg',
                'author' => 'Jane Smith',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];
        
        file_put_contents($this->articlesFile, json_encode($articles, JSON_PRETTY_PRINT));
    }
    
    // Get all articles
    public function getArticles()
    {
        $articles = json_decode(file_get_contents($this->articlesFile), true);
        return $articles;
    }
    
    // Get a single article by slug
    public function getArticle($slug)
    {
        $articles = $this->getArticles();
        
        foreach ($articles as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }
        
        return null;
    }
    
    // Add a new article
    public function addArticle($article)
    {
        $articles = $this->getArticles();
        
        // Generate a new ID
        $maxId = 0;
        foreach ($articles as $existingArticle) {
            if ($existingArticle['id'] > $maxId) {
                $maxId = $existingArticle['id'];
            }
        }
        
        $article['id'] = $maxId + 1;
        $article['created_at'] = date('Y-m-d H:i:s');
        
        // Add the new article
        $articles[] = $article;
        
        // Save to file
        file_put_contents($this->articlesFile, json_encode($articles, JSON_PRETTY_PRINT));
        
        return $article['id'];
    }
}