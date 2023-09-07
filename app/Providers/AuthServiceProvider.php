<?php

namespace App\Providers;

use App\Models\Noleggio;
use App\Models\Utente;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function(Utente $utente) {
            return $utente->utenteable_type == 'Admin';
        });

        Gate::define('isStaff', function(Utente $utente) {
            return $utente->utenteable_type == 'App\Models\Staff';
        });

        Gate::define('isStaffOrAdmin', function() {
            return Gate::allows("isStaff") or Gate::allows("isAdmin");
        });

        Gate::define('isClient', function(Utente $utente) {
            return $utente->utenteable_type == 'App\Models\Cliente';
        });

        Gate::define('doesntHaveNoleggio', function(Utente $utente) {
            return Gate::allows("isClient") and !Noleggio::where("clienteID", $utente->utenteable_id)->where("attivo", true)->exists();
        });
    }
}
