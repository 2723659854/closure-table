<?php

namespace Xiaosongshu\ClosureTable;

use Illuminate\Support\Facades\Facade;

/**
 * @note https://laravelacademy.org/post/817.html
 */
class SongShu extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'closureTable';
    }
}