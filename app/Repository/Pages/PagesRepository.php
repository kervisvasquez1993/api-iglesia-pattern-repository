<?php

namespace App\Repository\Pages;

use App\Interfaces\Pages\IPageInterface;
use App\Models\Page;

class PagesRepository implements IPageInterface
{

    public function createPage(\App\DTOs\Pages\PagesDTO $pagesDTO,)
    {
        return  Page::create([
            'name' => $pagesDTO->getName(),
            'slug' => $pagesDTO->getSlug(),
            'description' => $pagesDTO->getDescription()
        ]);
        // return $page;

        // return new \App\DTOs\Pages\PagesDTO(
        //     $page->name,
        //     $page->slug,
        //     $page->description
        // );
    }
}
