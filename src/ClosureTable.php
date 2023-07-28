<?php

namespace Xiaosongshu\ClosureTable;

/**
 * @note https://www.pianshen.com/article/8503607411/
 * @note https://www.cnblogs.com/hxmbk/p/17408902.html
 * @note https://learnku.com/laravel/t/8816/the-new-wheel-php-cors-cross-origin-resource-sharing-solves-the-cross-domain-requirements-of-the-php-project-program
 * @note https://learnku.com/docs/laravel/8.x/packages/9397#package-discovery
 */
class ClosureTable
{
    public function execute()
    {
        return 'execute';
    }

    public function talk(){
        return "我只是一个单纯的测试而已";
    }

    public function say(){
        return "我就是一个say方法";
    }
}
