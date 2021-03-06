<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Sms;

use Illuminate\Notifications\Notification;

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
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        /** @var BaseMessage $message */
        $message = $notification->toMobile($notifiable);

        if (!$notifiable->routeNotificationFor('mobile', $notification) && !$message instanceof BaseMessage) {
            return;
        }
        $mobile = $notifiable->routeNotificationFor('mobile', $notification);
        app(Sms::class)->send($mobile, $message);
    }
}
