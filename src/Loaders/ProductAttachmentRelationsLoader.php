<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductAttachmentRelationsLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('attachment_relations');
    }
}
