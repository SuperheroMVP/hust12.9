<?php

namespace Botble\Slidebar\Providers;

use Botble\Slidebar\Models\Slidebar;
use Illuminate\Support\ServiceProvider;
use Botble\Slidebar\Repositories\Caches\SlidebarCacheDecorator;
use Botble\Slidebar\Repositories\Eloquent\SlidebarRepository;
use Botble\Slidebar\Repositories\Interfaces\SlidebarInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class SlidebarServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(SlidebarInterface::class, function () {
            return new SlidebarCacheDecorator(new SlidebarRepository(new Slidebar));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/slidebar')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Slidebar::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-slidebar',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/slidebar::slidebar.name',
                'icon'        => 'fa fa-images',
                'url'         => route('slidebar.index'),
                'permissions' => ['slidebar.index'],
            ]);
        });
    }
}
