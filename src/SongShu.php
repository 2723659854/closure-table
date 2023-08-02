<?php
/** 这里的命名空间不能乱写 */
namespace Xiaosongshu\ClosureTable;

use Illuminate\Support\Facades\Facade;

/**
 *  https://laravelacademy.org/post/817.html
 *  门面类：就是继承Illuminate\Support\Facades\Facade就可以了，然后写一个getFacadeAccessor方法，获取服务提供者的名称。
 *
 */
class SongShu extends Facade
{

    /**
     * 这个实际上是将静态类和当前类绑定。实际上是调用的app('服务提供者别名')的方式调用的服务类
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'closureTable';
    }
}