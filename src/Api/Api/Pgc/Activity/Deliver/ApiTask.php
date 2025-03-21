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

namespace Bhp\Api\Api\Pgc\Activity\Deliver;

use Bhp\Request\Request;
use Bhp\Sign\Sign;
use Bhp\User\User;

class ApiTask
{
    /**
     * @var array|string[]
     */
    protected static array $headers = [
        'Referer' => 'https://big.bilibili.com/mobile/bigPoint/task'
    ];

    /**
     * 完成任务  jp：追番页浏览  tv: 影视页浏览
     * @param string $position
     * @return array
     */
    public static function complete(string $position): array
    {
        //
        $user = User::parseCookie();
        //
        $url = 'https://api.bilibili.com/pgc/activity/deliver/task/complete';
        //
        $payload = [
            'disable_rcmd' => '0',
            'position' => $position,
            'csrf' => $user['csrf'],
            'statistics' => getDevice('app.bili_a.statistics'),
        ];
        //
        $headers = array_merge([], self::$headers);
        return Request::postJson(true, 'app', $url, Sign::common($payload), $headers);
    }


}
