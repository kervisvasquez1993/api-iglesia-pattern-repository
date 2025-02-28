<?php

namespace App\Repository\Pages;

use App\DTOs\Pages\PagesDTO;
use App\Interfaces\Pages\IPageInterface;
use App\Models\Page;

class PagesRepository implements IPageInterface
{

    public function getAllPages()
    {
        return Page::all();
    }

    public function findBySlug(string $slug)
    {
        return Page::where('slug', $slug)->firstOrFail();
    }
    public function createPage(PagesDTO $pagesDTO,)
    {
        return  Page::create([
            'name' => $pagesDTO->getName(),
            'slug' => $pagesDTO->getSlug(),
            'description' => $pagesDTO->getDescription()
        ]);
    }
    // public function updatePage(Page $page, PagesDTO $pageDTO)
    // {
    //     $page->update([
    //         "name" => $pageDTO->getName(),
    //         "description" => $pageDTO->getDescription()
    //     ]);
    //     return $page;
    // }
    // public function deletePage(Page $page)
    // {
    //     $page->delete();
    //     return $page;
    // }
}
