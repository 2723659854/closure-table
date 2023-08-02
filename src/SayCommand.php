<?php

declare(strict_types=1);

namespace Xiaosongshu\ClosureTable;

use Hyperf\Command\Command as HyperfCommand;

class SayCommand extends HyperfCommand
{

    protected $name="xiaosongshu:say";

    public function configure()
    {
        parent::configure();
        $this->setDescription('假设我是一个命令行');
    }

    public function handle()
    {
        $this->line('测试一下创建的自定义的命令行', 'info');
    }
}
