<?php

namespace User\Repositories;

use Auth;
use Media\Contracts\FileUploaderInterface;
use User\Contracts\UserRepositoryInterface;
use User\Http\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(
        private FileUploaderInterface $fileUploaderInterface
    ) {}

    public function update(array $payload)
    {
        $file = $payload['file'] ?? null;

        $media = null;
        if ($file)
            $media = $this->fileUploaderInterface->upload($file);

        $currentUser = $this->getCurrentUser();

        if ($media) {
            $currentUser->update([
                'media_id' => $media->id,
                'name' => $payload['name'],
                'email' => $payload['email']
            ]);
        } else {
            $currentUser->update([
                'name' => $payload['name'],
                'email' => $payload['email']
            ]);
        }
    }

    public function getCurrentUser(): User
    {
        return User::where('id', '=', Auth::user()->id)->first();
    }
}
