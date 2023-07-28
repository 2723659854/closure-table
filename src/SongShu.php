<?php

namespace Xiaosongshu\ClosureTable\Facades;

use Illuminate\Support\Facades\Facade;

class SongShu extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'closure-table';
    }
}