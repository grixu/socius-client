<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductAttachmentLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('attachment');
    }
}
