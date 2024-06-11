<?php
namespace App\Services\Implement;

use App\Models\User;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\ArticleService;
use App\Repositories\UserRepository;
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
            'slug' => $data['title']
        ]);
    }

    public function update($id, array $data)
    {
        return $this->articleRepository->update($id, $data + [
            'user_id' => Auth::id(),
            'slug' => $data['title']
        ]);
    }
}
