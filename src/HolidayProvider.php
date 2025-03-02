<?php
namespace Veneridze\LaravelHoliday;

use Carbon\Carbon;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Veneridze\LaravelHoliday\Commands\UpdateHolidays;
use Veneridze\LaravelHoliday\Models\Holiday;

class HolidayProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-holidays')
            ->hasConfigFile('holidays')
            ->hasConsoleCommand(UpdateHolidays::class)
            ->hasMigrations([
                'create_holidays_table',
            ])
            ->publishesServiceProvider('HolidayProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations();
                //->copyAndRegisterServiceProviderInApp();
            });
    }

    public function packageBooted(): void
    {
        Carbon::macro('isHoliday', fn() => Holiday::isHoliday($date));
        // Carbon::macro('notHoliday', function () {
        //     return $this->year % 4 === 0 && ($this->year % 100 !== 0 || $this->year % 400 === 0);
        // });
        //$mediaClass = config('media-library.media_model', Media::class);

        //$mediaClass::observe(new MediaObserver);
    }

    public function packageRegistered(): void
    {
        //$this->app->bind(WidthCalculator::class, config('media-library.responsive_images.width_calculator'));
        //$this->app->bind(TinyPlaceholderGenerator::class, config('media-library.responsive_images.tiny_placeholder_generator'));
//
        //$this->app->scoped(MediaRepository::class, function () {
        //    $mediaClass = config('media-library.media_model');
//
        //    return new MediaRepository(new $mediaClass);
        //});
    }
}
