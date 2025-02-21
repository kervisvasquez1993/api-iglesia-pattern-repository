<?php

namespace App\Interfaces\Pages;

use App\DTOs\Pages\PagesDTO;
use App\Models\Page;

interface IPageInterface
{
    public function createPage(PagesDTO $pagesDTO);
}
