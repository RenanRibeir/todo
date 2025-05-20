<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    public function register(): void
    {
        Telescope::night();
        Telescope::filter(function (IncomingEntry $entry) {
            return true;
        });
    }

    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user = null) {
            return true;
        });
    }
}
