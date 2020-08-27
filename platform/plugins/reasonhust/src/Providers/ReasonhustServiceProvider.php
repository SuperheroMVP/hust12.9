<?php

namespace Botble\Reasonhust\Providers;

use Botble\Reasonhust\Models\Reasonhust;
use Illuminate\Support\ServiceProvider;
use Botble\Reasonhust\Repositories\Caches\ReasonhustCacheDecorator;
use Botble\Reasonhust\Repositories\Eloquent\ReasonhustRepository;
use Botble\Reasonhust\Repositories\Interfaces\ReasonhustInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

use \Botble\Slug\Traits\SlugTrait;

class ReasonhustServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(ReasonhustInterface::class, function () {
            return new ReasonhustCacheDecorator(new ReasonhustRepository(new Reasonhust));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/reasonhust')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Reasonhust::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-reasonhust',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/reasonhust::reasonhust.name',
                'icon'        => 'fa fa-heart',
                'url'         => route('reasonhust.index'),
                'permissions' => ['reasonhust.index'],
            ]);
        });


        $this->app->booted(function () {
            \SlugHelper::registerModule(reasonhust::class);
            \SlugHelper::setPrefix(reasonhust::class, 'gallery');
        });
    }
}
