<?php
/** 这里的命名空间不能乱写 */
namespace Xiaosongshu\ClosureTable;

/**
 *  https://www.pianshen.com/article/8503607411/
 *  https://www.cnblogs.com/hxmbk/p/17408902.html
 *  https://learnku.com/laravel/t/8816/the-new-wheel-php-cors-cross-origin-resource-sharing-solves-the-cross-domain-requirements-of-the-php-project-program
 *  https://learnku.com/docs/laravel/8.x/packages/9397#package-discovery
 *  这里是核心业务类
 *  负责处理具体的业务。但是这个类并不被用户直接使用
 */
class ClosureTable
{
    /**
     * 提供一个execute方法
     * @return string
     */
    public function execute()
    {
        return 'execute';
    }

    /**
     * 提供一个talk方法
     * @return string
     */
    public function talk(){
        return "我只是一个单纯的测试而已";
    }

    /**
     * 提供一个say方法
     * @return string
     *  当然了，具体的业务逻辑可能很复杂，这里只是单纯的举例而已，你可以根据自己的也无需求自己实现。
     */
    public function say(){
        return "我就是一个say方法";
    }
}
