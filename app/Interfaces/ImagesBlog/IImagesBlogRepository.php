<?php

namespace App\Interfaces\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;

interface IImagesBlogRepository
{
    public function CreateImagesBlog(DTOsImagesBlog $dTOssImagesBlog);
}
