<?php

namespace App\Interfaces\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;

interface IImagesBlogServices
{
    public function CreateImageBlog(DTOsImagesBlog $dTOsImagesBlog);
}
