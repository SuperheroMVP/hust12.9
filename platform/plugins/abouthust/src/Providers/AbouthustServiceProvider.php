<?php

namespace Botble\Abouthust\Providers;

use Botble\Abouthust\Models\Abouthust;
use Illuminate\Support\ServiceProvider;
use Botble\Abouthust\Repositories\Caches\AbouthustCacheDecorator;
use Botble\Abouthust\Repositories\Eloquent\AbouthustRepository;
use Botble\Abouthust\Repositories\Interfaces\AbouthustInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

use \Botble\Slug\Traits\SlugTrait;

class AbouthustServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(AbouthustInterface::class, function () {
            return new AbouthustCacheDecorator(new AbouthustRepository(new Abouthust));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/abouthust')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Abouthust::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-abouthust',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/abouthust::abouthust.name',
                'icon'        => 'fa fa-thumbs-up',
                'url'         => route('abouthust.index'),
                'permissions' => ['abouthust.index'],
            ]);
        });

        $this->app->booted(function () {
            \SlugHelper::registerModule(abouthust::class);
            \SlugHelper::setPrefix(abouthust::class, 'gallery');
        });
    }
}
