<?php
namespace app\admin\controller;
use app\admin\model\Amount;
use app\user\model\Match;
use app\user\model\Matcher;
use app\user\model\Option;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\console\command\make\Model;
use think\Controller;
use app\admin\model\Config;
use think\Db;
use think\facade\Cookie;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Command extends Controller{



    public function setConfig(){

        $data = Config::where('ID',1)->find();
        $history = $data->history;
        $isset = $data->isset;
        $number =0;
        if($isset == 1){
            $number = $data->tomorrow;
        }
        if($isset ==0 ){
            $number = $data->default;
        }
        $man = floor($number);
        $women = $number - $man;
        $hour = Request::param('hour');
        $minute = Request::param('minute');
        if(!is_numeric($hour)|| !is_numeric($minute)){
            return msg (-1,'wrong param');
        }
        $time ='2021-02-17 ';
        $time =$time.$hour.':';
        $time =$time.$minute.':00';

        $event1 = Db::execute(
            "ALTER EVENT update_config
            ON SCHEDULE
                EVERY 1 DAY
                    STARTS '$time'
            ON completion preserve ENABLE
            DO
            update config set history=history+1;");


        $event2 = Db::execute(
            "ALTER EVENT update_man_shower
            ON SCHEDULE
                EVERY 1 DAY
                    STARTS '$time'
            ON completion preserve ENABLE
            DO
            update shower_msg set history=$history where ID in (select t.ID from (select ID from shower_msg where type=0 and pass=1 and gender='男' and history is null limit $man) as t);");

        $event3 =Db::execute (
            "ALTER EVENT update_woman_shower
            ON SCHEDULE
                EVERY 1 DAY
                    STARTS '$time'
            ON completion preserve ENABLE
            DO
            update shower_msg set history=$history where ID in (select t.ID from (select ID from shower_msg where type=0 and pass=1 and gender='女' and history is null limit $women) as t);");

        $event4 =Db::execute(
            "ALTER EVENT update_config_isset
            ON SCHEDULE
                EVERY 1 DAY
                    STARTS '$time'
            ON completion preserve ENABLE
            DO
            update config set isset =0 where ID=1;");
        return msg (0,"set $time ok");

    }
    public function getConfig(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Config::where('ID',1)->find();
        $isset = $data->isset;
        if($isset ==1){
            $list['tomorrow'] = $data->tomorrow;
            $list['isset']=$isset;
            return msg(0,'you have set tomorrow post',$list);
        }
        if($isset ==0){
            $list['default'] = $data->default;
            $list['isset']=$isset;
            return msg(0,'you have set default post',$list);
        }

    }
    public function index(){
        //Config 的isset 通过mysql的事件每日变为0

        //登录逻辑
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $default =Request::param('default');
        $tomorrow = Request::param('tomorrow');
        if(!isset($default) && !isset($tomorrow))
            return msg(-1,'cant select both');

        if(isset($default) && isset($tomorrow))
            return msg (-1,'please select default or tomorrow');

        if(isset($default)) {
            $data = Config::where('ID',1)->find();
            $data->default = $default;
            $data->isset = 0;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set default fail');
            }
        }
        if(isset($tomorrow)) {
            $data = Config::limit(1)->find();
            $data->tomorrow = $tomorrow;
            $data->isset = 1;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set tomorrow fail');
            }
        }
        return msg (0,'ok');

    }
    public function active(){

        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $datas = Match::where('type',0)->select();
        $count =0;
        $return_data=[];
        foreach ($datas as $data){
            $oneID= $data ->ID;
            $twoID = $data ->actorID;
            $return_data[$count]['a']=Matcher::where('ID',$oneID)->find();
            $return_data[$count]['b']=Matcher::where('ID',$twoID)->find();
            $count++;
        }

        return msg(0,'ok',$return_data);

    }

    public function suggestion(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Option::where('status',0)->select();
        return msg(0,$data);
    }
    public function downloadMatch(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $Model = new Model();//或者 $Model = D(); 或者 $Model = M();
        $sql = "select * from `order`";
        $voList = $Model->query($sql);
        $download =  new \think\response\Download('image.jpg');
    }
/*待完成*/

    public function change(){
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $data = ShowerMsg::where('ID',$openid)->find();

        if(empty($data))
            return msg(-1,'no such person');

        $list=[];
        if(!empty(Request::param('nickName')))
            $list['name']=Request::param('nickName');

        if(is_numeric(Request::param('age')))
            $list['age']=Request::param('age');

        if(!empty(Request::param('place')))
            $list['location']=Request::param('place');

        if(!empty(Request::param('mail')))
            $list['email']=Request::param('mail');

        if(!empty(Request::param('school')))
            $list['school']=Request::param('school');

        if(is_numeric(Request::param('height')))
            $list['height']=Request::param('height');

        if(!empty(Request::param('constellation')))
            $list['star']=Request::param('constellation');

        if(!empty(Request::param('sex')))
            $list['gender']=Request::param('sex');

        if(!empty(Request::param('about')))
            $list['introduction']=Request::param('about');

        if(!empty(Request::param('connect')))
            $list['connect']=Request::param('connect');

        if(!empty(Request::param('target')))
            $list['goal']=Request::param('target');

        if(is_numeric(Request::param('like')))
            $list['like']=Request::param('like');

        if(!empty(Request::param('background')))
            $list['background']=Request::param('background');

        if(is_numeric(Request::param('pass')))
            $list['pass']=Request::param('pass');


        $data->isUpdate(true)->save($list);
        if($data)
            return msg('0','ok');
        else
            return msg(-1,'save wrong');


    }

    public function actchange(){
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $data = Matcher::where('ID',$openid)->find();

        if(empty($data))
            return msg(-1,'no such person');

        $list=[];
        if(!empty(Request::param('nickName')))
            $list['name']=Request::param('nickName');

        if(is_numeric(Request::param('age')))
            $list['age']=Request::param('age');

        if(!empty(Request::param('place')))
            $list['location']=Request::param('place');

        if(!empty(Request::param('mail')))
            $list['email']=Request::param('mail');

        if(!empty(Request::param('school')))
            $list['school']=Request::param('school');

        if(is_numeric(Request::param('height')))
            $list['height']=Request::param('height');

        if(!empty(Request::param('constellation')))
            $list['star']=Request::param('constellation');

        if(!empty(Request::param('sex')))
            $list['gender']=Request::param('sex');

        if(!empty(Request::param('about')))
            $list['introduction']=Request::param('about');

        if(!empty(Request::param('connect')))
            $list['connect']=Request::param('connect');

        if(!empty(Request::param('target')))
            $list['goal']=Request::param('target');

        if(is_numeric(Request::param('like')))
            $list['like']=Request::param('like');

        if(!empty(Request::param('background')))
            $list['background']=Request::param('background');

        if(is_numeric(Request::param('pass')))
            $list['pass']=Request::param('pass');


        $data->isUpdate(true)->save($list);
        if($data)
            return msg('0','ok');
        else
            return msg(-1,'save wrong');


    }
    public function newact(){

        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        Db::table('matcher')->delete(true);
        $pictures = Picture::where('type=1 or type =-1')->column('address');
        foreach ($pictures as $picture){
            $filename = ROOT_PATH .$picture;
            if(file_exists($filename)){
                unlink($filename);
            }
        }
        Db::table('picture')->where('type = 1 or type =-1')->delete();
        Db::table('match')->delete(true);


        return msg(0,'ok');


    }
    public function collect(){

        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);



        $list['height']['150-160']=ShowerMsg::where('height','between',[150,160])->count();
        $list['height']['160-170']=ShowerMsg::where('height','between',[160,170])->count();
        $list['height']['170-180']=ShowerMsg::where('height','between',[170,180])->count();
        $list['height']['180-190']=ShowerMsg::where('height','between',[180,190])->count();
        $list['height']['190']=ShowerMsg::where('height','>',190)->count();
        $list['height']['150']=ShowerMsg::where('height','<',150)->count();




        $list['age']['18']=ShowerMsg::where('age',18)->count();
        $list['age']['19']=ShowerMsg::where('age',19)->count();
        $list['age']['20']=ShowerMsg::where('age',20)->count();
        $list['age']['21']=ShowerMsg::where('age',21)->count();
        $list['age']['22']=ShowerMsg::where('age',22)->count();
        $list['age']['23']=ShowerMsg::where('age',23)->count();
        $list['age']['24']=ShowerMsg::where('age',24)->count();
        $list['age']['25']=ShowerMsg::where('age',25)->count();
        $list['age']['26']=ShowerMsg::where('age',26)->count();
        $list['age']['27']=ShowerMsg::where('age',27)->count();

        $list['background']['专'] = ShowerMsg::where('background','专')->count();
        $list['background']['本'] = ShowerMsg::where('background','本')->count();
        $list['background']['硕'] = ShowerMsg::where('background','硕')->count();
        $list['background']['博'] = ShowerMsg::where('background','博')->count();

        $datas = ShowerMsg::field('school,count(*) as count')->group('school')->order('count desc')->select();
        foreach ($datas as $data){
            $schoolname = $data->school;
            $list['school'][$schoolname] = $data->count;
        }
        $searchs =ShowerMsg::field('gender,count(*) as count')->group('gender')->select();
        foreach ($searchs as $search){
            $list['gender'][$search->gender] = $search->count;
        }

        return msg(-1,'ok',$list);

    }

    public function delete(){
        //传入openid与type 将图片与个人信息 彻底删除

        $openid = Request::param('openid');
        $type = Request::param('type');
        if(empty($openid)){
            return msg(-1,'empty openid');
        }
        if (!is_numeric($type)){
            return msg(-1,'wrong type');
        }

        if($type == 0){
            $data = ShowerMsg::where('ID',$openid)->delete();
            $pictures = Picture::where('ID',$openid)->where('type=0 or type =2')->column('address');
            foreach ($pictures as $picture){
                $filename = ROOT_PATH .$picture;
                if(file_exists($filename)){
                    unlink($filename);
                }
            }
            $delete = Picture::where('ID',$openid)->where('type=0 or type =2')->delete();
            return msg(0,'ok');

        }
        if($type == 1){
            $data = Matcher::where('ID',$openid)->delete();
            $pictures = Picture::where('ID',$openid)->where('type',1)->column('address');
            foreach ($pictures as $picture){
                $filename = ROOT_PATH .$picture;
                if(file_exists($filename)){
                    unlink($filename);
                }
            }
            $pictures = Picture::where('ID',$openid)->where('type',1)->delete();
            return msg(0,'ok');
        }




    }
    //导出excel
    public function outexcel(){
        //导出
        $path = dirname(__FILE__); //找到当前脚本所在路径
//        vendor("PHPExcel.PHPExcel.PHPExcel");
//        vendor("PHPExcel.PHPExcel.Writer.IWriter");
//        vendor("PHPExcel.PHPExcel.Writer.Abstract");
//        vendor("PHPExcel.PHPExcel.Writer.Excel5");
//        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
//        vendor("PHPExcel.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);


        // 实例化完了之后就先把数据库里面的数据查出来
        $sql = Db::table('shower_msg')->select();

        // 设置表头信息
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '名称')
            ->setCellValue('B1', '年龄')
            ->setCellValue('C1', '地址')
            ->setCellValue('D1', '邮箱')
            ->setCellValue('E1', '学校')
            ->setCellValue('F1', '身高')
            ->setCellValue('G1', '星座')
            ->setCellValue('H1', '性别')
            ->setCellValue('I1', '自我介绍')
            ->setCellValue('J1', '联系方式')
            ->setCellValue('K1', '心中的ta')
            ->setCellValue('L1', '点赞量')
            ->setCellValue('M1', '学历');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/

        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);//计算有多少条数据
        print($count);
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['age']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['location']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['email']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['school']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['height']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['star']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['gender']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['introduction']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $sql[$i-2]['connect']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $sql[$i-2]['goal']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $sql[$i-2]['like']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $sql[$i-2]['background']);
        }

        /*--------------下面是设置其他信息------------------*/
        ob_end_clean();
        $objPHPExcel->getActiveSheet()->setTitle('companyInformation');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来

        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");

        header('Content-Disposition: attachment;filename="shower_msg.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件



    }

    public function setAmount(){



        $man = Request::param('man');
        $woman = Request::param('woman');
        $list=[];
        if(is_numeric($man)){
            $list['man'] =$man;
        }
        if(is_numeric($woman)){
            $list['woman'] =$woman;
        }
        if(!is_numeric($man) ||!is_numeric($woman)){
            return msg(-1,'you must set at least one');
        }

        $data = Amount::where('ID',1)->find();
        $data->save($list);

        return msg(0,'ok');
    }
    public function test1(){

        $query = Amount::where('ID',1)->find();
        echo $query->fee;
        echo $query->man;
        echo $query->woman;

    }


}