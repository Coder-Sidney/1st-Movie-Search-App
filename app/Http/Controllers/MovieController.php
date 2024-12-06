<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.search');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page', 1);  // Default to page 1 if no page is specified
        $apiKey = env('OMDB_API_KEY');
        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}&s={$query}&page={$page}");
    
        if ($response->successful()) {
            $movies = $response->json()['Search'] ?? [];
            $totalResults = $response->json()['totalResults'] ?? 0;
            $totalPages = ceil($totalResults / 10);  // Assuming 10 results per page
            return view('movies.search', compact('movies', 'page', 'totalPages'));
        }
    
        return back()->withErrors('Failed to fetch data.');
    }
    
}
