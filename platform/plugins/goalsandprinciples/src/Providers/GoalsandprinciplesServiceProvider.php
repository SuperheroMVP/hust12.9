<?php

namespace Botble\Goalsandprinciples\Providers;

use Botble\Goalsandprinciples\Models\Goalsandprinciples;
use Illuminate\Support\ServiceProvider;
use Botble\Goalsandprinciples\Repositories\Caches\GoalsandprinciplesCacheDecorator;
use Botble\Goalsandprinciples\Repositories\Eloquent\GoalsandprinciplesRepository;
use Botble\Goalsandprinciples\Repositories\Interfaces\GoalsandprinciplesInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class GoalsandprinciplesServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(GoalsandprinciplesInterface::class, function () {
            return new GoalsandprinciplesCacheDecorator(new GoalsandprinciplesRepository(new Goalsandprinciples));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/goalsandprinciples')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Goalsandprinciples::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-goalsandprinciples',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/goalsandprinciples::goalsandprinciples.name',
                'icon'        => 'fa fa-paper-plane',
                'url'         => route('goalsandprinciples.index'),
                'permissions' => ['goalsandprinciples.index'],
            ]);
        });
    }
}
