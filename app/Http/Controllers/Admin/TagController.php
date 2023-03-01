<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\TagService;

class TagController extends Controller
{

    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->getAll();
        return view('admin.pages.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.pages.tag.create');
    }

    public function store(Request $request)
    {
        dd(123);
    }
}
