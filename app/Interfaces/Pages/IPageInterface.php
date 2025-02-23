<?php

namespace App\Interfaces\Pages;

use App\DTOs\Pages\PagesDTO;
use App\Models\Page;

interface IPageInterface
{
    public function getAllPages();
    public function findBySlug(PagesDTO $page);
    public function createPage(PagesDTO $pagesDTO);
    public function updatePage(Page $page, PagesDTO $pagesDTO);
    public function deletePage(Page $page);
}
