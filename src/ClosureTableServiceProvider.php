<?php
/** 这里的命名空间不能乱写 */
namespace Xiaosongshu\ClosureTable;
use Illuminate\Support\ServiceProvider;

/**
 * @purpose 这里就是服务提供者
 * @note 这个实际上是工厂模式，插件则是具体的加工商。所有的功能都通过app()方法调用，用户不关心怎么实现的业务，直接调用App就可以了
 */
class ClosureTableServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     * 如果你的提供者仅仅只是在服务容器中注册绑定，你可以选择延迟加载该绑定直到注册绑定的服务真的需要时再加载，延迟加载这样的一个提供者将会提升应用的性能，因为它不会在每次请求时都从文件系统加载。
     * Laravel 编译并保存所有延迟服务提供者提供的服务及服务提供者的类名。然后，只有当你尝试解析其中某个服务时 Laravel 才会加载其服务提供者。
     */

    protected $defer = true; // 延迟加载服务

    /**
     * Bootstrap the application services.
     * @note 启动项目的时候，需要启动的服务
     */
    public function boot()
    {
        /** 这个是发布配置文件 php artisan vendor:publish --provider="Xiaosongshu\ClosureTable\ClosureTableServiceProvider" --force */
        /** 加上参数 --force 表示强制发布 */
        $this->publishes([
            __DIR__ . '/config/closure-table.php' => config_path('closure-table.php'),
        ],'just');
        /** 添加一个tag标签“just” ,加tag标签的作用就是，不需要输入那么长一段的路径，相当于是缩写，效果是一样的额 */

        /** 如果实在命令行运行 */
        if ($this->app->runningInConsole()) {
            /** 则把插件的命令行加入进去 */
            $this->commands([
                TalkCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     * @note 注册服务提供者，这是比较关键的一步，工厂模式：一个别名对应一个服务类
     * @note 这个别名，在门面类当中也会用到的，所以很关键
     */
    public function register()
    {
        $this->app->singleton('closureTable', function () {
            return new ClosureTable;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()

    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['closureTable'];
    }
}
