<?php

namespace App\Services;

use App\Repositories\SourceRepository;
use Illuminate\Http\UploadedFile;

class SourceService
{
    protected $sourceRepository;

    public function __construct(SourceRepository $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function getAllSources($request)
    {
        return $this->sourceRepository->all($request);
    }



}
