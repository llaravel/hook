<?php


namespace Llaravel\Hook;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
    }
	protected function init()
	{
		
	}
    /**
     * 读取配置文件
     */
    protected function hookConfig()
    {
        $configs=Config::get('hooks');
        if(!$configs) return;
        foreach($configs as $key =>$val){
            Config::set($val,$value);
        }
    }

    protected function hookThings()
    {

    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->hookConfig();
        $this->hookThings();
    }
}
