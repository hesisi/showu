<?php
    session_start();
    
    $image = imagecreatetruecolor(120,30);    
    $bgcolor = imagecolorallocate($image,255,255,255); 
    
    imagefill($image, 0, 0, $bgcolor);
    $captcha_code = "";
    
    for($i=0;$i<4;$i++){
        //设置字体大小
        $fontsize = 12;    
        //设置字体颜色，随机颜色
        $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));      //0-120深颜色
        //设置数字
        $fontcontent = rand(0,9);
        //10>.=连续定义变量
        $captcha_code .= $fontcontent;  
        //设置坐标
        $x = ($i*120/4)+rand(5,10);
        $y = rand(5,10);
     
        imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
    }
    
    //存到session
    $_SESSION['authcode'] = $captcha_code;
    
    //增加干扰元素，设置雪花点
    for($i=0;$i<200;$i++){
        //设置点的颜色，50-200颜色比数字浅，不干扰阅读
        $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));    
        //imagesetpixel — 画一个单一像素
        imagesetpixel($image, rand(1,120), rand(1,29), $pointcolor);
    }
    
    //增加干扰元素，设置横线
    for($i=0;$i<4;$i++){
        //设置线的颜色
        $linecolor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
        //设置线，两点一线
        imageline($image,rand(1,119), rand(1,29),rand(1,119), rand(1,119),$linecolor);
    }
 
    //设置头部，image/png
    header('Content-Type: image/png');
   
    
    //方法一
    imagepng($image);


    //方法二:不推荐
   /*  $imgname = time().rand(10000,99999).'.png';//生成图片的名字
    $imgpath = dirname(__FILE__).'/img/'.$imgname; //图片存储路径
    imagepng($image,$imgpath); 
    imagepng($image,$imgpath);
    echo $imgname;//返回图片地址    */
    
    //imagedestroy() 结束图形函数 销毁$image
    imagedestroy($image);
    
   

?>