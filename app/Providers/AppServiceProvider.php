<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

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
    public function boot(): void
    {
        User::observe(UserObserver::class);

        

        //URL::forceScheme('https');
        // Schema::defaultStringLength(191);
        // Blade::aliasComponent('admin.components.message', 'message');

        // //Newsletter FORM
        // $newsletter = \App\Models\NewsletterCat::where('sistema', 1)->where('status', 1)->get();
        // View()->share('newsletterForm', $newsletter);

        // //Links
        // $Links = \App\Models\Menu::whereNull('id_pai')->orderby('created_at', 'DESC')
        //                 ->available()
        //                 ->get();        
        // View()->share('Links', $Links);

        // $configuracoes = \App\Models\Configuracoes::find(1); 
        // View()->share('configuracoes', $configuracoes);

        // $gbGallery = \App\Models\Galeria::available()->inRandomOrder()->limit(3)->get(); 
        // View()->share('gbGallery', $gbGallery);
        
        // Paginator::useBootstrap();
    }
}
