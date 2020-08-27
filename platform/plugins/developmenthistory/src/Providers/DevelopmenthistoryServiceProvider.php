<?php

namespace Botble\Developmenthistory\Providers;

use Botble\Developmenthistory\Models\Developmenthistory;
use Illuminate\Support\ServiceProvider;
use Botble\Developmenthistory\Repositories\Caches\DevelopmenthistoryCacheDecorator;
use Botble\Developmenthistory\Repositories\Eloquent\DevelopmenthistoryRepository;
use Botble\Developmenthistory\Repositories\Interfaces\DevelopmenthistoryInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class DevelopmenthistoryServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(DevelopmenthistoryInterface::class, function () {
            return new DevelopmenthistoryCacheDecorator(new DevelopmenthistoryRepository(new Developmenthistory));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/developmenthistory')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Developmenthistory::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-developmenthistory',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/developmenthistory::developmenthistory.name',
                'icon'        => 'fa fa-history',
                'url'         => route('developmenthistory.index'),
                'permissions' => ['developmenthistory.index'],
            ]);
        });
    }
}
