<?php

namespace Botble\Icce\Providers;

use Botble\Icce\Models\Icce;
use Illuminate\Support\ServiceProvider;
use Botble\Icce\Repositories\Caches\IcceCacheDecorator;
use Botble\Icce\Repositories\Eloquent\IcceRepository;
use Botble\Icce\Repositories\Interfaces\IcceInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class IcceServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(IcceInterface::class, function () {
            return new IcceCacheDecorator(new IcceRepository(new Icce));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/icce')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Icce::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-icce',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/icce::icce.name',
                'icon'        => 'fa fa-bell',
                'url'         => route('icce.index'),
                'permissions' => ['icce.index'],
            ]);
        });
    }
}
