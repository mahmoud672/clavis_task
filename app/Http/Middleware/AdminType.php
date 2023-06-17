<?php

namespace App\Http\Middleware;

use App\Traits\Types;
use Closure;

class AdminType
{
    use Types;

    /**
     * @var string[]
     */
    protected static $except = [
       /** Route **/
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->check())
        {
            $user = auth()->user();
            /*if ($request->url() == apiUrl(self::$except[0]))
            {
                return $next($request);
            }*/

            if ($user->type_id == $this->isAdmin)
            {
                return $next($request);
            }
            else
            {
                return redirect(apiUrl("access-denied"));
            }
        }
        else
        {
            return redirect(apiUrl("not-authenticated"));
        }

        //return $next($request);
    }




}
