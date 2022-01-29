<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LinkGuestRequestToCompany
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
        $domain = Str::of($request->getUri())->after('http://')->after('https://')->before('/');
        $domain = Domain::where('domain', $domain)->first();
        abort_if(! $domain, 403);

        session([
            'company_id' => $domain->company_id,
            'company_name' => $domain->company->name,
            'company' => $domain->company,
            'theme' => $domain->company->theme
        ]);

        App::setLocale($domain->locale);
        return $next($request);
    }
}
