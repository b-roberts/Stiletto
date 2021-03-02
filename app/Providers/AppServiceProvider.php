<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;


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
        $this->app->singleton('markdown',function(){
            
        // Obtain a pre-configured Environment with all the CommonMark parsers/renderers ready-to-go
        $environment = Environment::createCommonMarkEnvironment();

        // Add this extension
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new TableExtension());

        // Instantiate the converter engine and start converting some Markdown!
        return new CommonMarkConverter([], $environment);
        });


        \View::composer(
            ['modules.pinned_articles'],
            'App\Http\ViewComposers\PinnedArticles'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
