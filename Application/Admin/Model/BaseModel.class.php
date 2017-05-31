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
use Think\Exception;
use Think\Model;
use const true;

class BaseModel extends Model
{
    /**
     * @param $params
     *
     * @return bool
     */
    public function InsertData($params)
    {
        try {
            $data=$this->data($params)->add();
            return $data;
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }


    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function SelectById($id)
    {
        try {
            $this->where(['id' => $id])->delete();
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }
    }

    /**
     * @param $id
     * @param $params
     *
     * @return bool
     */
    public function UpdateData($id, $params)
    {
        try {
            $this->where(['id' => $id])->data($params)->save();
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function DelDataById($id)
    {
        try {
            $this->where(['id' => $id])->delete();
            return true;
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }
    }


}