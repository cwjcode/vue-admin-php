<?php
// +----------------------------------------------------------------------
// | ThinkPHP 5 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 .
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 黎明晓 <lmxdawn@gmail.com>
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Model;

/**
 * 权限规则表
 */
class AuthRule extends Model
{

    //    protected $pk = 'id';

    /* 整合多维数组 */
    public static function cateMerge($arr, $IdName, $pidName, $pid = 0)
    {
        $result = array();
        foreach ($arr as $v) {
            if ($v[$pidName] == $pid) {
                $v['children'] = self::cateMerge($arr, $IdName, $pidName, $v[$IdName]);
                $result[] = $v;
            }
        }
        return $result;
    }

}
