<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repository\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repository\AttributeRepository;
use App\Contracts\BrandContract;
use App\Repository\BrandRepository;
use App\Contracts\ProductContract;
use App\Repository\ProductRepository;



class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CategoryContract::class   =>    CategoryRepository::class,

        AttributeContract::class        =>          AttributeRepository::class,

        BrandContract::class            =>          BrandRepository::class,

        ProductContract::class          =>          ProductRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach($this->repositories as $interface =>$implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
