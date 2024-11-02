<?php

namespace App\Http\Controllers;

use App\Services\SourceService;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    protected $sourceService;
    public function __construct(SourceService $sourceService)
    {
        $this->sourceService = $sourceService;
    }

    public function index(Request $request)
    {
        $articles = $this->sourceService->getAllSources($request);
        return response()->json($articles);
    }
}
