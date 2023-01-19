<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Blog\IBlogRepository::class,
            \App\Repositories\Blog\BlogRepository::class
        );

        $this->app->bind(
            \App\Repositories\Category\ICategoryRepository::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Tour\ITourRepository::class,
            \App\Repositories\Tour\TourRepository::class
        );

        $this->app->bind(
            \App\Repositories\TourImage\ITourImageRepository::class,
            \App\Repositories\TourImage\TourImageRepository::class
        );

        $this->app->bind(
            \App\Repositories\TourPrefecture\ITourPrefectureRepository::class,
            \App\Repositories\TourPrefecture\TourPrefectureRepository::class
        );

        $this->app->bind(
            \App\Repositories\Country\ICountryRepository::class,
            \App\Repositories\Country\CountryRepository::class
        );

        $this->app->bind(
            \App\Repositories\BookingTour\IBookingTourRepository::class,
            \App\Repositories\BookingTour\BookingTourRepository::class
        );

        $this->app->bind(
            \App\Repositories\User\IUserRepository::class,
            \App\Repositories\User\UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
