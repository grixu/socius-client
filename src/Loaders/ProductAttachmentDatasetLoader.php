<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductAttachmentDatasetLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('attachment_dataset');
    }
}
