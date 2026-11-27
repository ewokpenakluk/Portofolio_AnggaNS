<?php

namespace App\Providers;

use App\Mail\Transport\BrevoApiTransport;
use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Serverless hosts terminate TLS at their proxy, so Laravel can believe
        // the request arrived over plain HTTP. Forcing the scheme keeps asset,
        // image and form URLs on https and avoids blocked mixed content.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Serverless hosts filter outbound SMTP, so mail is delivered over
        // Brevo's HTTPS API when MAIL_MAILER=brevo.
        Mail::extend('brevo', function (array $config): BrevoApiTransport {
            return new BrevoApiTransport(
                $this->app->make(HttpFactory::class),
                (string) ($config['key'] ?? ''),
                (string) ($config['endpoint'] ?? 'https://api.brevo.com/v3/smtp/email'),
            );
        });
    }
}
