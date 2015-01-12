<?php namespace Lablog\Markdown;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('lablog/markdown');

		$twig = \Config::get('twigbridge::extensions');

		$class = 'Lablog\Markdown\Twig\MarkdownLoader';
		if (isset($twig['enabled']))
		{
			/* TwigBridge 0.6 */
			$twig['enabled'][] = $class;
		}
		else
		{
			/* TwigBridge 0.5 */
			$twig[] = $class;
		}

		\Config::set('twigbridge::extensions', $twig);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
