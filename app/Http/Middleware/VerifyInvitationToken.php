<?php

namespace App\Http\Middleware;

use App\Invitation;
use Closure;

class VerifyInvitationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Invitation::where('token', $request->invitation_token)->get()->isNotEmpty()) {
            return $next($request);
        }

        return redirect('/posts');
    }
}
