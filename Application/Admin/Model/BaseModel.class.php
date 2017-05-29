<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 17:46
 */

namespace Admin\Model;


use const false;
use mysqli_sql_exception;
use Think\Model;
use const true;

class BaseModel extends Model
{
    public function InsertData($params)
    {
        try {
            $this->data($params)->save();
            return true;
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }


    }

    public function SelectById($id)
    {
        try {
            $this->where(['id' => $id])->delete();
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }
    }

    public function UpdateData($id, $params)
    {
    }

    public function DelDataById($id)
    {
    }


}