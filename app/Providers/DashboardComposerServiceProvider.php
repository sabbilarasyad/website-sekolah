<?php

namespace App\Providers;

use App\View\Composers\OrtuDashboardComposer;
use App\View\Composers\SiswaDashboardComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Domain C (Student/Parent) - registrasi View Composer.
 *
 * File ini BARU, tidak menggantikan atau mengubah provider Domain A mana
 * pun. Perlu didaftarkan (satu baris) di bootstrap/providers.php:
 *
 *   return [
 *       App\Providers\AppServiceProvider::class,
 *       App\Providers\DashboardComposerServiceProvider::class, // <- tambahkan ini
 *   ];
 */
class DashboardComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('dashboard.siswa', SiswaDashboardComposer::class);
        View::composer('dashboard.ortu', OrtuDashboardComposer::class);
    }
}