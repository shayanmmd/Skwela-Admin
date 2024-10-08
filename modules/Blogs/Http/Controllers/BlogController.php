<?php

namespace Blogs\Http\Controllers;

use Auth;
use Blogs\Http\Models\Blog;
use Blogs\Http\Requests\StoreBlogRequest;
use Media\Contracts\FileUploaderInterface;

class BlogController
{

    public function __construct(
        private FileUploaderInterface $fileUploaderInterface
    ) {}

    public function create()
    {
        return view('BlogViews::store-blog');
    }

    public function store(StoreBlogRequest $request)
    {
        $media = $this->fileUploaderInterface->upload($request['file']);

        if(!$media)
            return back()->with('unsuccess','file could not get uploaded successfully');

        $blog = Blog::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'media_id' => $media->id,
            'user_id' => Auth::user()->id
        ]);

        if (!$blog)
            return back()->with('unsuccess','the blog did not publish');;

        return back()->with('success','Blog successfully published');
    }
}
