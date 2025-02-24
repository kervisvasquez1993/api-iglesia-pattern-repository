<?php

namespace App\Services\Pages;

use App\Repository\Pages\PagesRepository;
use Exception;

class PagesServices
{
    // public function __construct(){}
    // protected PlayerAnswerRepositoryInterface $playerAnswerRepository;
    protected PagesRepository $pagesRepository;

    public function __construct(PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    public function showAllPages()
    {
        try {
            $pages = $this->pagesRepository->getAllPages();
            return [
                'success' => true,
                'data' =>  $pages
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    public function create($data)
    {
        try {
            // $pages = $this->questionRepository->createQuestion($questionDTO);
            $pages = $this->pagesRepository->createPage($data);
            return [
                'success' => true,
                'data' =>  $pages
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function showOne($page)
    {
        try {
            $pages = $this->pagesRepository->findBySlug($page);
            return [
                'success' => true,
                'data' =>  $pages
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
