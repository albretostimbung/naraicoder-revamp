<?php

namespace App\Services\Implement;

use Illuminate\Support\Str;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepository;

class ArticleServiceImpl implements ArticleService
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function create(array $data)
    {
        return $this->articleRepository->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($data['title']),
            'image' => $data['image']->storeAs('uploads/images/articles', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }

    public function update($id, array $data)
    {
        $article = $this->articleRepository->getById($id);

        if (empty($data['image'])) {
            return $this->articleRepository->update($id, [
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => Auth::id(),
                'slug' => Str::slug($data['title']),
                'image' => $article->image,
            ]);
        }

        $filename = public_path('storage/' . $article->image);

        if ($article->image && file_exists($filename)) {
            unlink($filename);
        }

        return $this->articleRepository->update($id, [
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($data['title']),
            'image' => $data['image']->storeAs('uploads/images/articles', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }
}
