<?php


namespace Llaravel\Hook;

use Illuminate\Support\Facades\Cache;
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

    /**
     * 读取配置文件
     */
    protected function hookConfig()
    {
        var_dump("这里是我的代码哦");
        $configs=Config::get('hooks');
        if(!$configs) return;
        //'cache.index'='wechat.official_account.default'
        foreach($configs as $key =>$val){
            $value=Cache::get($key);
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
