<?php

namespace Botble\Tuyensinh\Providers;

use Botble\Tuyensinh\Models\Tuyensinh;
use Illuminate\Support\ServiceProvider;
use Botble\Tuyensinh\Repositories\Caches\TuyensinhCacheDecorator;
use Botble\Tuyensinh\Repositories\Eloquent\TuyensinhRepository;
use Botble\Tuyensinh\Repositories\Interfaces\TuyensinhInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class TuyensinhServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(TuyensinhInterface::class, function () {
            return new TuyensinhCacheDecorator(new TuyensinhRepository(new Tuyensinh));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/tuyensinh')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Tuyensinh::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-tuyensinh',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/tuyensinh::tuyensinh.name',
                'icon'        => 'fa fa-school',
                'url'         => route('tuyensinh.index'),
                'permissions' => ['tuyensinh.index'],
            ]);
        });
    }
}
