<?php

namespace Media\Services;

use Auth;
use Media\Contracts\FileUploaderInterface;
use Media\Enums\MediaTypesEnum;
use Media\Http\Models\Media;

class FileUploaderService implements FileUploaderInterface
{
    private function checkType($fileExtension): MediaTypesEnum
    {
        $types = [
            'png' => MediaTypesEnum::Image,
            'jpeg' => MediaTypesEnum::Image,
            'jpg' => MediaTypesEnum::Image,
            'mp4' => MediaTypesEnum::Video,
            'zip' => MediaTypesEnum::Archive,
            'tar' => MediaTypesEnum::Archive,
            'rar' => MediaTypesEnum::Archive,
            'txt' => MediaTypesEnum::Document,
            'pdf' => MediaTypesEnum::Document,
        ];

        return $types[$fileExtension] ?? MediaTypesEnum::Unknown;
    }

    public function upload($file): Media
    {
        $media = new Media();
        $media->user_id = Auth::user()->id;
        $media->type = $this->checkType($file->extension());
        $media->name = uniqid();
        $media->extension = $file->extension();

        if ($media->save())
            $file->storeAs('public', $media->name . '.' . $media->extension);

        return $media;
    }

    public function getMediaById(int|null $id) : Media|null
    {
        return Media::where('id', '=', $id)->first();
    }
}
