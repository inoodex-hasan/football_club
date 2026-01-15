<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\{Cache, Config, Schema, View};
use App\Models\{Contact, EmailConfiguration, GeneralSetting, LogoSetting};
use Inertia\Inertia;
use Yajra\DataTables\Html\Options\Languages\Paginate;

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
        Paginator::useBootstrap();
        RedirectIfAuthenticated::redirectUsing(fn($request) => route('admin.dashboard'));

        // ❗ Database ready check
        if (!Schema::hasTable('general_settings')) {
            return;
        }

        // ✅ General Setting (cache safe)
        $generalSetting = Cache::remember('general_setting', 3600, function () {
            return GeneralSetting::first();
        });

        // ✅ Logo setting safe
        $logoSetting = Schema::hasTable('logo_settings')
            ? LogoSetting::first()
            : null;

        // ✅ Mail setting safe
        $mailSetting = Schema::hasTable('email_configurations')
            ? EmailConfiguration::first()
            : null;

        /** ⏰ Timezone safe */
        if (!empty($generalSetting?->time_zone)) {
            Config::set('app.timezone', $generalSetting->time_zone);
        }

        /** 📧 Mail config safe */
        if ($mailSetting) {
            Config::set('mail.mailers.smtp.host', $mailSetting->host ?? config('mail.mailers.smtp.host'));
            Config::set('mail.mailers.smtp.port', $mailSetting->port ?? config('mail.mailers.smtp.port'));
            Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption ?? config('mail.mailers.smtp.encryption'));
            Config::set('mail.mailers.smtp.username', $mailSetting->username ?? config('mail.mailers.smtp.username'));
            Config::set('mail.mailers.smtp.password', $mailSetting->password ?? config('mail.mailers.smtp.password'));
        }


        /** 🌍 Share data with all views (safe fallback) */
        View::composer('*', function ($view) use ($generalSetting, $logoSetting) {
            $view->with([
                'settings'    => $generalSetting ?? null,
                'logoSetting' => $logoSetting ?? null,
            ]);
        });

        Inertia::share([
            'contact' => function () {
                return cache()->rememberForever('footer_contact', function () {
                    return Contact::query()
                        ->select('id', 'address', 'phone', 'email')
                        ->first(); // Returns a single object {} instead of an array [{}]
                });
            },
        ]);

    }
}
