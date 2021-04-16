<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin {

    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth; //Récuperer la personne  connecter 
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    if ($this->auth->guest() || $this->auth->user()->eleve_id)
        //si  il est pas connecter    //Si ses un élève
        {
                if ($request->ajax())
                {
                        return response('Unauthorized.', 401);//empeche l'intrusuion avec de l'ajax
                }
                else
                {
                        $request->session()->flash('error', 'Il faut être admin !');//envoie le message d'erreur si il n'est pas conforme

                        return redirect()->route('accueil');


                }
        }


        return $next($request);
    }
}


