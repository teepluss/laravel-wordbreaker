<?php namespace Teepluss\Wordbreaker;

use Illuminate\Support\ServiceProvider;
use Teepluss\Wordbreaker\Wrapper\Breaker;


use PhlongTaIam\WordRule;
use PhlongTaIam\Acceptors;
use PhlongTaIam\SpaceRule;
use PhlongTaIam\PathSelector;
use PhlongTaIam\PathInfoBuilder;
use PhlongTaIam\SingleSymbolRule;
use Teepluss\Wordbreaker\Wrapper\Dict;

class WordbreakerServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('teepluss/wordbreaker');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['wordbreaker'] = $this->app->share(function($app)
        {
            $config = $app['config']['wordbreaker::config'];

            $source = array(
                'dict'             => new Dict,
                'wordRule'         => new WordRule,
                'acceptors'        => new Acceptors,
                'spaceRule'        => new SpaceRule,
                'singleSymbolRule' => new SingleSymbolRule,
                'pathSelector'     => new PathSelector,
                'pathInfoBuilder'  => new PathInfoBuilder,
            );

            return new Breaker($config, $source);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('wordbreaker');
    }

}
