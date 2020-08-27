<?php

namespace Botble\Profile\Providers;

use Botble\Profile\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Botble\Profile\Repositories\Caches\ProfileCacheDecorator;
use Botble\Profile\Repositories\Eloquent\ProfileRepository;
use Botble\Profile\Repositories\Interfaces\ProfileInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ProfileServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(ProfileInterface::class, function () {
            return new ProfileCacheDecorator(new ProfileRepository(new Profile));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->app->booted(function () {
            \SlugHelper::registerModule(Profile::class);
            \SlugHelper::setPrefix(Profile::class, '');
        });
        // "your-prefix" is prefix for your slug field. URL will be http://domain.local/your-prefix/slug-here

        $this->setNamespace('plugins/profile')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule([Profile::class]);
        }

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-profile',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/profile::profile.name',
                'icon'        => 'fa fa-id-card',
                'url'         => route('profile.index'),
                'permissions' => ['profile.index'],
            ]);
        });
    }
}
