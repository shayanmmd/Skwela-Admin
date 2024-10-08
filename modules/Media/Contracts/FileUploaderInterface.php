<?php

namespace Media\Contracts;

use Media\Http\Models\Media;

interface FileUploaderInterface
{
    public function upload($file) : Media;
    public function getMediaById(int|null $id) : Media|null;
}
