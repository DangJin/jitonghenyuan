<?php
return [
    'TMPL_PARSE_STRING' => [
        '__PUBLIC__' => '/jitonghenyuan/Public', // 更改默认的/Public 替换规则
        '__JS__'     => '/jitonghenyuan/Public/static/js', // 增加新的JS类库路径替换规则
        '__CSS__' => '/jitonghenyuan/Public/static/css', // 增加新的上传路径替换规则
        '__IMA__' => '/jitonghenyuan/Public/static/images',
        '__COMMON__' => '/jitonghenyuan/Public/common'
    ],
    'DB_TYPE'    => 'mysql', // 数据库类型
    'DB_HOST'    => 'bdm271467280.my3w.com', // 服务器地址
    'DB_NAME'    => 'bdm271467280_db', // 数据库名
    'DB_USER'    => 'bdm271467280', // 用户名
    'DB_PWD'     => 'KeNaiKeTeMySql521', // 密码
    'DB_CHARSET' => 'utf8', // 字符集
    'DB_DEBUG'   => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'URL_HTML_SUFFIX'=>'',
];