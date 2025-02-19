<?php declare(strict_types=1);

/**
 *  Website: https://mudew.com/
 *  Author: Lkeme
 *  License: The MIT License
 *  Email: Useri@live.cn
 *  Updated: 2018 ~ 2026
 *
 *   _____   _   _       _   _   _   _____   _       _____   _____   _____
 *  |  _  \ | | | |     | | | | | | | ____| | |     |  _  \ | ____| |  _  \ &   ／l、
 *  | |_| | | | | |     | | | |_| | | |__   | |     | |_| | | |__   | |_| |   （ﾟ､ ｡ ７
 *  |  _  { | | | |     | | |  _  | |  __|  | |     |  ___/ |  __|  |  _  /  　 \、ﾞ ~ヽ   *
 *  | |_| | | | | |___  | | | | | | | |___  | |___  | |     | |___  | | \ \   　じしf_, )ノ
 *  |_____/ |_| |_____| |_| |_| |_| |_____| |_____| |_|     |_____| |_|  \_\
 */

namespace Bhp\Api\Vip;

use Bhp\Request\Request;
use Bhp\User\User;

class ApiExperience
{
    /**
     * 领取大会员额外经验
     * @return array
     */
    public static function add(): array
    {
        $user = User::parseCookie();
        //
        $url = 'https://api.bilibili.com/x/vip/experience/add';
        $payload = [
            'mid' => $user['uid'],
            'csrf' => $user['csrf'],
            // 'buvid'=>'B8B511D7-AE19-2586-6A5F-xxxxxx',
        ];
        $headers = [
            'origin' => 'https://account.bilibili.com',
            'referer' => 'https://account.bilibili.com/',
        ];
        // {"code":0,"message":"0","ttl":1,"data":{"type":0,"is_grant":true}}
        return Request::postJson(true, 'pc', $url, $payload, $headers);
    }

}
