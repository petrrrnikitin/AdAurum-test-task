<?php

namespace App\Http\Controllers;


use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Comment::class);
        $company_id = request('company_id');
        $comments = request()->user()->comment->where('company_id', $company_id);
        return CommentResource::collection($comments);
    }
    public function store()
    {
        $comment = Comment::create([
            'comment' => request('comment'),
            'type' => request('type'),
            'user_id' => request()->user()->id,
            'company_id' => request('company_id'),
        ]);
        return (new CommentResource($comment))->response()->setStatusCode(Response::HTTP_CREATED);
    }


}
