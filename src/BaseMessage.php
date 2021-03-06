<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */
namespace Larva\Sms;

use Overtrue\EasySms\Message;
use Overtrue\EasySms\Strategies\OrderStrategy;

/**
 * Class BaseMessage
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class BaseMessage extends Message
{
    /**
     * @var string 发送顺序
     */
    protected $strategy = OrderStrategy::class;
}