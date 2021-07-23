<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $book = $request->route('book');

        if($book==null) {
            return response()->json(['message'=>'Cant find book'], 404);
        }

        if($book->user_id != auth()->user()->id) {
            return response()->json(['message'=> 'You do not owned this.'], 401);
        }
        return $next($request);
    }
}