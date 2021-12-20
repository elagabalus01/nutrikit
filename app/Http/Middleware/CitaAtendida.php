<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cita;

class CitaAtendida
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
        $cita=Cita::find($request->route('id'));
        if (!$cita->atendida) {
            return $next($request);
        }
        return redirect('/citas');
    }
}
