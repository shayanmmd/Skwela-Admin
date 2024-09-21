<?php

namespace Media\Contracts;

use Media\Http\Models\Media;

interface FileUploaderInterface
{
    public function upload($file);
    public function getMediaById(int|null $id) : Media|null;
}
