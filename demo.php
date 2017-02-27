<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

function format_date($time){

    $t=time()-strtotime($time);
    if($t>0){$ba = '前';}else{$ba = '后';}

    /*
    echo date("Y-m-d H:i:s",time());
    echo '<hr/>';
    echo date("Y-m-d H:i:s",strtotime($time));
    echo '<hr/>';
    echo date("Y-m-d H:i:s",$t);
    echo '<hr/>';
    echo $t;
    echo '<hr/>';
    */
    $f=array(
        '31536000'=>'年',
        '2592000'=>'个月',
        '604800'=>'星期',
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    );

    foreach ($f as $k=>$v) {
        if (0 !=$c=floor(abs($t)/(int)$k)) {
            return $c.$v.$ba;
        }
    }
}



echo format_date(date("Y-m-d H:i:s",time()-50));
