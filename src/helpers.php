<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */
use Overtrue\EasySms\EasySms;

if (!function_exists('sms')) {
    /**
     * @return array|EasySms
     * @throws \Overtrue\EasySms\Exceptions\InvalidArgumentException
     * @throws \Overtrue\EasySms\Exceptions\NoGatewayAvailableException
     */
    function sms()
    {
        $arguments = func_get_args();
        /** @var EasySms $sms */
        $sms = app('sms');
        if (empty($arguments)) {
            return $sms;
        }
        return $sms->send($arguments[0], $arguments[1]);
    }
}