<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/30
 * Time: 19:46
 */

namespace Admin\Model;


class MboardModel extends BaseModel
{
    public function MsgList($page, $limit)
    {
        $data = [
            'data'  => $this->page($page, $limit)->select(),
            'count' => $this->count()
        ];
        return $data;
    }
}