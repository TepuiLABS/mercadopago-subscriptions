<?php

namespace Tepuilabs\MercadopagoSubscriptions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MercadopagoSubscriptionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mercadopago-subscriptions');
    }

    public function packageBooted()
    {
        $this
            ->registerBindings();
    }

    protected function registerBindings(): self
    {
        $this->app->bind('MercadopagoSubscriptions', function ($app) {
            return new \Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions();
        });

        return $this;
    }
}
