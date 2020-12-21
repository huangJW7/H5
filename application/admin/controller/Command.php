<?php
namespace app\admin\controller;

use think\Console\Command as Com;
use think\console\Input;
use think\console\Output;
use app\admin\model\Config;
class Command extends Com{


    protected function configure(){
        $this->setName('SetConfig')->setDescription("计划任务 SetConfig");
    }

    //调用SendMessage 这个类时,会自动运行execute方法
    protected function execute(Input $input, Output $output){
        //$output->writeln('Date Crontab job start...');
        /*** 这里写计划任务列表集 START ***/

        $this->task();//发短信

        /*** 这里写计划任务列表集 END ***/
        //$output->writeln('Date Crontab job end...');
    }

    //更新Config表，
    public function task()
    {
        $query =Config::limit(1)->find();
        $isset = $query->isset;


    }


}