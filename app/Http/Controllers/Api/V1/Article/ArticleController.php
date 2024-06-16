<?php

namespace App\Http\Controllers\Api\V1\Article;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    private $articleRepository;

    private $articleService;

    public function __construct(ArticleRepository $articleRepository, ArticleService $articleService)
    {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
    }

    public function index()
    {
        return ResponseFormatter::success(ArticleResource::collection($this->articleRepository->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        return ResponseFormatter::success(ArticleResource::make($this->articleService->create($request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success(ArticleResource::make($this->articleRepository->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        return ResponseFormatter::success(ArticleResource::make($this->articleService->update($id, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->articleRepository->delete($id));
    }
}
