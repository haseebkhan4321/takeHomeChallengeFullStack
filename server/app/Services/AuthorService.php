<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use Illuminate\Http\UploadedFile;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAllAuthors($request)
    {
        return $this->authorRepository->all($request);
    }



}
