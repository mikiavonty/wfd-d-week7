<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TerminatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("Executing TerminatingMiddleware.handle");
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        Log::info("Executing TerminatingMiddleware.terminate");
        Log::debug($response);
        // The below command will not take any affect as the reponse is already sent to the browser
        $response->headers->set('X-AAA', 'Hello from TerminatingMiddleware!');
    }
}
