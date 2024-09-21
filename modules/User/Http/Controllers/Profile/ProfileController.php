<?php

namespace User\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Media\Contracts\FileUploaderInterface;
use User\Contracts\UserRepositoryInterface;
use User\Requests\StoreProfileRequest;

class ProfileController extends Controller
{

    public function __construct(
        private UserRepositoryInterface $userRepositoryInterface,
        private FileUploaderInterface $fileUploaderInterface
    ) {}

    public function index()
    {
        $user = $this->userRepositoryInterface->getCurrentUser();   
        $media = $this->fileUploaderInterface->getMediaById($user->media_id);

        if ($media) 
            $avatar = $media->name . '.' . $media->extension;
        else $avatar = null;

        return view('UserViews::profile.profile', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }

    public function update(StoreProfileRequest $request)
    {
        $this->userRepositoryInterface->update($request->all());

        return back();
    }
}
