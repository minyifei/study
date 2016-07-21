<?php

/**
 * 文件操作
 * User: myf
 * Date: 16/7/21
 * Time: 下午4:59
 */

use Myf\Mvc\Task;

class FileTask extends Task{

    /**
     * 一个小demo
     * 下载百度首页存储到本地文件中
     */
    public function mainAction(){
        //百度的网址
        $url = 'http://www.baidu.com';
        //保存的文件
        $fileOpen = '/tmp/file/text/baidu_open.txt';
        $fileContent = '/tmp/file/text/baidu_content.txt';
        //两种方式执行任务
        //$this->doByOpen($url,$fileOpen);
        //$this->doByContents($url,$fileContent);
        //读取文件大小
        echo "输出文件大小：\n";
        $sizeOpen = filesize($fileOpen);
        $sizeContent = filesize($fileContent);
        var_dump($sizeOpen,$sizeContent);
        //删除文件
        //unlink($fileOpen);
        //unlink($fileContent);
        //仅获取文件中的文件名
        var_dump(basename($fileContent));
        //读取文件的路径信息
        var_dump(pathinfo($fileContent));
        //读取文件类型
        var_dump(filetype($fileContent));
        var_dump(filetype(dirname($fileContent)));
    }

    /**
     * 通过fopen,fclose,fgets,feof,fwrite等函数处理任务
     * @param string $url 网址
     * @param string $file 保存文件
     */
    public function doByOpen($url,$file){
        $path = dirname($file);
        //判断文件夹是否存在
        createFolders($path);
        //读取网站内容
        $fh = fopen($url,'r');
        if($fh){
            //读取数据
            $content = '';
            while(!feof($fh)) {
                $content.=fgets($fh);
            }
            //关闭文件
            fclose($fh);
        }
        //写入数据,返回字节数
        $wh = fopen($file,"w");
        $res = fwrite($wh,$content);
        fclose($wh);
        //写入的字节数
        var_dump($res);
    }

    /**
     * 通过file_put_contents和file_get_contents处理任务
     * @param string $url 网址
     * @param string $file 保存文件
     */
    public function doByContents($url,$file){
        $path = dirname($file);
        //判断文件夹是否存在
        createFolders($path);
        //读取网站内容
        $content = file_get_contents($url);
        //写入数据,返回字节数
        $wf = file_put_contents($file,$content);
        //写入的字节数
        var_dump($wf);
    }

}