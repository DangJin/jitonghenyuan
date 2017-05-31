<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/30
 * Time: 15:26
 */

namespace Admin\Controller;


class UploadController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function upFile()
    {
        $allowtype = ['gif', 'png', 'jpg'];
        $path      = UPLOAD_IMG;
        $size      = 1000000;
        $name      = $_FILES['upfile']['name'];
        $error     = $_FILES['upfile']['error'];
        $filesize  = $_FILES['upfile']['size'];
        $tmp_name  = $_FILES['upfile']['tmp_name'];
        $type      = $_FILES['upfile']['type'];
        $suffix    = [];
        $filename  = [];

        if (is_Array($name)) {
            for ($i = 0; $i < count($name); $i++) {
                if ($error[$i] > 0) {
                    return $this->ajaxReturn(['error' => '文件' . ($i + 1) . errorMesaage($error[$i])]);
                }

                $suffix[$i] = array_pop(explode('.', $name[$i]));
                if (!in_array(strtolower($suffix[$i]), $allowtype)) {
                    return $this->ajaxReturn(['error' => '文件' . ($i + 1) . '文件格式错误']);
                }

                if ($filesize[$i] > $size) {
                    return $this->ajaxReturn(['error' => '文件' . ($i + 1) . '文件超出限制']);
                }
                $filename[$i] = date('YmdHis') . rand(100, 999) . '.' . $suffix[$i];
            }

            for ($i = 0; $i < count($name); $i++) {
                if (is_uploaded_file($tmp_name[$i])) {
                    if (!move_uploaded_file($tmp_name[$i], $path . '/' . $filename[$i])) {
                        return $this->ajaxReturn(['error' => '不能移动文件']);
                    }
                } else {
                    return $this->ajaxReturn(['error' => '不是合法文件']);
                }
            }

        } else {
            if ($error > 0) {
                return $this->ajaxReturn(['error' => errorMesaage($error)]);
            }

            $suffix = array_pop(explode('.', $name));
            if (!in_array(strtolower($suffix), $allowtype)) {
                return $this->ajaxReturn(['error' => '文件格式错误']);
            }

            if ($filesize > $size) {
                return $this->ajaxReturn(['error' => '文件超出限制']);
            }

            $filename = date('YmdHis') . rand(100, 999) . '.' . $suffix;
            if (is_uploaded_file($tmp_name)) {
                if (!move_uploaded_file($tmp_name, $path . '/' . $filename)) {
                    return $this->ajaxReturn(['error' => '不能移动文件']);
                }
            } else {
                return $this->ajaxReturn(['error' => '不是合法文件']);
            }
            return $this->ajaxReturn(['data' => '上传成功', 'path' => "http://" . $_SERVER['HTTP_HOST'] . '/Public/images/' . $filename]);
        }
    }

    private function errorMesaage($flag)
    {
        switch ($flag) {
            case 1:
                return '上传文件超出服务器规定';
            case 2:
                return '超出表单约定的值';
            case 3:
                return '文件只有部分被上传了';
            case 4:
                return '没有文件上传';
            default:
                return '未知错误';
        }
    }

}