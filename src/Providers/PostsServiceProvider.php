<?php

namespace Versatile\Posts\Providers;

use Versatile\Posts\Commands;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Versatile\Core\Policies\BasePolicy;
use Versatile\Posts\Policies\PostPolicy;
use Versatile\Posts\Post;
use Versatile\Posts\Category;

class PostsServiceProvider extends ServiceProvider
{
    /**
     * Our root directory for this package to make traversal easier
     */
    protected $packagePath = __DIR__ . '/../../';

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class  => PostPolicy::class,
        Category::class => BasePolicy::class,
    ];

    /**
     * Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
        $this->strapRoutes();
        $this->strapViews();
        $this->strapMigrations();
        $this->strapCommands();

        $this->registerPolicies();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap our Routes
     */
    protected function strapRoutes()
    {
        $this->loadRoutesFrom($this->packagePath . 'routes/web.php');
    }

    /**
     * Bootstrap our Views
     */
    protected function strapViews()
    {
        // Load views
        $this->loadViewsFrom($this->packagePath . 'resources/views', 'versatile-posts');
        $this->loadViewsFrom($this->packagePath . 'resources/views/vendor/versatile', 'versatile');
    }

    /**
     * Bootstrap our Migrations
     */
    protected function strapMigrations()
    {
        // Load migrations
        $this->loadMigrationsFrom($this->packagePath . 'database/migrations');

        // Locate our factories for testing
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(
            $this->packagePath . 'database/factories'
        );
    }

    /**
     * Bootstrap our Commands/Schedules
     */
    protected function strapCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class
            ]);
        }
    }
}
