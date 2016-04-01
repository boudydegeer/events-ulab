<?php

namespace App\Providers;

use App\Coupons\Coupon;
use App\Event\Event;
use App\Event\Ticket;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->model('events', Event::class);
		$router->model('slug', Event::class);
		$router->model('tickets', Ticket::class);
		$router->model('coupons', Coupon::class);

		$router->bind('slug', function ($value) {
			return Event::where('slug', $value)->first();
		});

		$router->bind('coupons', function ($value) {
			return Coupon::where('code', $value)->firstOrFail();
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function map(Router $router)
	{
		$this->mapWebRoutes($router);

		//
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	protected function mapWebRoutes(Router $router)
	{
		$router->group([
			'namespace'  => $this->namespace,
			'middleware' => 'web',
		], function ($router) {
			require app_path('Http/routes.php');
		});
	}
}
