<?php

namespace App\Http\Middleware;

use Closure;

class ViewToJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        /// convert to json if json format is requested
        if($request->ajax() || $request->wantsJson() || $request->exists('json')) {

            // A 20* response
            if ($response->isSuccessful()) {
                $originalContent = $response->getOriginalContent();

                // Get the data we passed to our view
                $data = $originalContent->getData();
                
                // Return the data passed to view as JSON response
                return response()->json($data);
            } else {
                return response()->json(['error' => $response->getStatusCode()]);
            }
        }

        return $response;
    }
}
