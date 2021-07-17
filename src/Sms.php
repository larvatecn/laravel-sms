<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Sms;

use Illuminate\Support\Facades\Facade;
use Overtrue\EasySms\EasySms;

/**
 * Class Sms
 *
 * @mixin EasySms
 * @see EasySms
 */
class Sms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return EasySms::class;
    }
}