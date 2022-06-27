<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repository\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repository\AttributeRepository;



class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CategoryContract::class   =>    CategoryRepository::class,

        AttributeContract::class        =>          AttributeRepository::class,
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
