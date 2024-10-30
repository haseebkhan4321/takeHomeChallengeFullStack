<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of all articles with their media.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles = Article::with('media')->get();
        return response()->json($articles);
    }

    /**
     * Store a new article along with optional media files.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'required|string|max:255',
            'publish_at' => 'required|date',
            'media' => 'nullable|array',
            'media.*' => 'file|mimes:jpg,jpeg,png,bmp',
        ]);

        $article = Article::create($data);

        // Handle media files
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('media');
                $article->media()->create(['path' => $path]);
            }
        }

        return response()->json($article, 201);
    }

    /**
     * Display the specified article with its media.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $article = Article::with('media')->findOrFail($id);
        return response()->json($article);
    }

    /**
     * Update the specified article along with optional new media files.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'author' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'source' => 'sometimes|string|max:255',
            'publish_at' => 'sometimes|date',
            'media' => 'nullable|array',
            'media.*' => 'file|mimes:jpg,jpeg,png,bmp',
        ]);

        $article->update($data);

        // Handle new media files
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('media');
                $article->media()->create(['path' => $path]);
            }
        }

        return response()->json($article);
    }

    /**
     * Remove the specified article and its associated media from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Delete associated media files from storage and database
        foreach ($article->media as $media) {
            Storage::delete($media->path);
            $media->delete();
        }

        $article->delete();
        return response()->json(['message' => 'Article and associated media deleted']);
    }

    /**
     * Display all media for a specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMedia($id)
    {
        $article = Article::with('media')->findOrFail($id);
        return response()->json($article->media);
    }

    /**
     * Remove a specific media item associated with an article.
     *
     * @param  int  $articleId
     * @param  int  $mediaId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMedia($articleId, $mediaId)
    {
        $article = Article::findOrFail($articleId);
        $media = $article->media()->findOrFail($mediaId);

        // Delete media file from storage
        Storage::delete($media->path);
        $media->delete();

        return response()->json(['message' => 'Media deleted']);
    }
}
