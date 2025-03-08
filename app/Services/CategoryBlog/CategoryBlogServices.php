<?php

namespace App\Services\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Interfaces\Auth\IAuthRepository;
use App\Interfaces\CategoryBlog\ICategoyBlogServices;
use App\Repository\CategoryBlog\CategoryBlogRepository;
use App\Services\Auth\AuthServices;
use Exception;

class CategoryBlogServices implements ICategoyBlogServices
{
    protected $categoryBlogRepository;

    protected $authRepository;

    public function __construct(CategoryBlogRepository $categoryBlogRepository, AuthServices $authRepository)
    {
        $this->categoryBlogRepository = $categoryBlogRepository;
        $this->authRepository = $authRepository;
    }

    public function getAllCategoryBlog()
    {
        try {
            $results = $this->categoryBlogRepository->getAllCategoryBlog();
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function getCategoryBlogById($id)
    {
        try {
            $results = $this->categoryBlogRepository->getCategoryBlogById($id);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function createCategoryBlog(DTOsCategoryBlog $data)
    {
        try {
            $results = $this->categoryBlogRepository->createCategoryBlog($data);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function updateCategoryBlog(DTOsCategoryBlog $data, $id)
    {
        try {
            $CategoryBlog = $this->categoryBlogRepository->getCategoryBlogById($id);
            $results = $this->categoryBlogRepository->updateCategoryBlog($data, $CategoryBlog);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    // public function updateQuiz(QuizDTO $quizDTO, $id)
    // {
    //     try {
    //         $quiz = $this->quizRepository->getQuizById($id);
    //         $updatedQuiz = $this->quizRepository->updateQuiz($quiz, $quizDTO);
    //         return ['success' => true, "data" => $updatedQuiz, 'message' => 'Record updated successfully'];
    //     } catch (\Exception $exception) {
    //         error_log($exception);
    //         return [
    //             'success' => false,
    //             'message' => $exception->getMessage()
    //         ];
    //     }
    // }

    public function deleteCategoryBlog($id)
    {

        try {
             $this->authRepository->validateRole();
            $CategoryBlog = $this->categoryBlogRepository->getCategoryBlogById($id);
            $results = $this->categoryBlogRepository->deleteCategoryBlog($CategoryBlog);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
