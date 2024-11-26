<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers'; // Add this line
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
        Gate::define('isAdmin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('isAuthor', function(User $user){
            return $user->role === 'author';
        });
        // Add this line to register API routes
        $this->mapApiRoutes();
    }
    protected $policies = [
        Post::class => PostPolicy::class,
    ];
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api') // Ensure the 'api' middleware is applied
            ->namespace($this->namespace) // Default namespace for your controllers
            ->group(base_path('routes/api.php'));
    }




}
