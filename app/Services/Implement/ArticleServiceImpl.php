<?php

namespace App\Services\Implement;

use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;

class ArticleServiceImpl implements ArticleService
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function create(array $data)
    {
        return $this->articleRepository->create($data + [
            'user_id' => Auth::id(),
            'slug' => $data['title'],
        ]);
    }

    public function update($id, array $data)
    {
        return $this->articleRepository->update($id, $data + [
            'user_id' => Auth::id(),
            'slug' => $data['title'],
        ]);
    }
}
