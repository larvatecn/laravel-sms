<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 */

namespace Larva\Sms;

use Illuminate\Notifications\Notification;
use Overtrue\EasySms\Exceptions\InvalidArgumentException;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

/**
 * 通知渠道
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class NotificationChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void|array
     * @throws InvalidArgumentException|NoGatewayAvailableException
     */
    public function send($notifiable, Notification $notification)
    {
        /** @var Message $message */
        $message = $notification->toPhone($notifiable);
        if (!$notifiable->routeNotificationFor('phone', $notification) && !$message instanceof Message) {
            return;
        }
        $mobile = $notifiable->routeNotificationFor('phone', $notification);
        return sms($mobile, $message);
    }
}
