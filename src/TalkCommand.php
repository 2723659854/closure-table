<?php

namespace Xiaosongshu\ClosureTable;

use Illuminate\Console\Command;

class TalkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xiaosongshu:talk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(){
        var_dump("你就是一个奇葩");
    }

}