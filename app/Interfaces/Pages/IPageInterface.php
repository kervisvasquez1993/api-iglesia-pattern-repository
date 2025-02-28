<?php

namespace App\Interfaces\Pages;

use App\DTOs\Pages\PagesDTO;
use App\Models\Page;

interface IPageInterface
{
    public function getAllPages();
    public function findBySlug(string $page);
    public function createPage(PagesDTO $pagesDTO);
    // public function updatePage(string $page, PagesDTO $pagesDTO);
    // public function deletePage(string $page);
}
