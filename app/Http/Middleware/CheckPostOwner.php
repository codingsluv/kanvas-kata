<?php

namespace App\Http\Middleware;

use App\Models\BlogPost;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('id');
        $post = BlogPost::find($postId);

        if(!$post || !$post->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized Access'], 403);
        }

        return $next($request);
    }
}
