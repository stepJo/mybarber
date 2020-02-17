<?php

namespace App\Providers;

use App\Reservation;
use App\Admin;
use App\Setting;
use App\ReservationMode;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Rupiah Directive
        Blade::directive('rupiah', function ($price) {
            return "Rp <?php echo number_format($price, 0, ',', '.'); ?>";
        });

        //Global Data
        // $reservations = Reservation::getReservation(0);
        // $confirm_reservations = Reservation::getReservation(1);
        // $reservation_mode = ReservationMode::first();
        // $count = Reservation::countRsv();
        // $admin = Admin::first();
        // $setting = Setting::first();

        // config([
        //     'reservations' => $reservations,
        //     'confirm_reservations' => $confirm_reservations,
        //     'reservation_mode' => $reservation_mode,
        //     'count' => $count,
        //     'admin' => $admin,
        //     'setting' => $setting,
        // ]);
    }
}
