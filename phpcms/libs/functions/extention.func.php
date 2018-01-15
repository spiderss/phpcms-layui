<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */
 function ajaxReturn($msg,$url,$data,$infoType="success")
 {
     if($infoType=="error")
     {
         $return_arr=array('code'=>0,'msg'=>$msg,'data'=>$data);
     }elseif ($infoType=="success")
     {
         $return_arr=array('code'=>1,'msg'=>$msg,'url'=>$url,'data'=>$data);
     }


     echo json_encode($return_arr);
     exit();
 }
?>