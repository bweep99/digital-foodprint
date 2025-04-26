<?php

namespace App\Controllers;

use App\Models\SimpleArticleModel;

class Articles extends BaseController
{
    public function index()
    {
        $model = new SimpleArticleModel();
        
        $data = [
            'title' => 'All Articles',
            'articles' => $model->getArticles()
        ];
        
        return view('articles/index', $data);
    }
    
    public function view($slug = null)
    {
        $model = new SimpleArticleModel();
        
        $data['article'] = $model->getArticle($slug);
        
        if (empty($data['article'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article not found: ' . $slug);
        }
        
        $data['title'] = $data['article']['title'];
        
        return view('articles/view', $data);
    }
}