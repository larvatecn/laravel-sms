# laravel-sms

This is a sms expansion for the laravel

[![License](https://poser.pugx.org/larva/laravel-sms/license.svg)](https://packagist.org/packages/larva/laravel-sms)
[![Latest Stable Version](https://poser.pugx.org/larva/laravel-sms/v/stable.png)](https://packagist.org/packages/larva/laravel-sms)
[![Total Downloads](https://poser.pugx.org/larva/laravel-sms/downloads.png)](https://packagist.org/packages/larva/laravel-sms)

## 特点

1. 支持目前市面多家服务商
1. 一套写法兼容所有平台
1. 简单配置即可灵活增减服务商
1. 内置多种服务商轮询策略、支持自定义轮询策略
1. 统一的返回值格式，便于日志与监控
1. 自动轮询选择可用的服务商
1. 更多等你去发现与改进...

## 平台支持

- [腾讯云 SMS](https://cloud.tencent.com/product/sms)
- [Ucloud](https://www.ucloud.cn)
- [七牛云](https://www.qiniu.com/)
- [SendCloud](http://www.sendcloud.net/)
- [阿里云](https://www.aliyun.com/)
- [云片](https://www.yunpian.com)
- [Submail](https://www.mysubmail.com)
- [螺丝帽](https://luosimao.com/)
- [容联云通讯](http://www.yuntongxun.com)
- [互亿无线](http://www.ihuyi.com)
- [聚合数据](https://www.juhe.cn)
- [百度云](https://cloud.baidu.com/)
- [华信短信平台](http://www.ipyy.com/)
- [253云通讯（创蓝）](https://www.253.com/)
- [融云](http://www.rongcloud.cn)
- [天毅无线](http://www.85hu.com/)
- [阿凡达数据](http://www.avatardata.cn/)
- [华为云](https://www.huaweicloud.com/product/msgsms.html)
- [网易云信](https://yunxin.163.com/sms)
- [云之讯](https://www.ucpaas.com/index.html)
- [凯信通](http://www.kingtto.cn/)
- [UE35.net](http://uesms.ue35.cn/)
- [短信宝](http://www.smsbao.com/)
- [Tiniyo](https://tiniyo.com/)
- [摩杜云](https://www.moduyun.com/)
- [融合云（助通）](https://www.ztinfo.cn/products/sms)
- [蜘蛛云](https://zzyun.com/)
- [融合云信](https://maap.wo.cn/)
- [天瑞云](http://cms.tinree.com/)


## 环境需求

- PHP >= 7.2

## Installation

```bash
composer require larva/laravel-sms
```

## for Laravel

This service provider must be registered.

```php
// config/app.php

'providers' => [
    '...',
    Larva\Sms\SmsServiceProvider::class,
];
```

add the config file: config/sms.php

add config

```php
use Overtrue\EasySms\Strategies\OrderStrategy;

return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    /*
    |--------------------------------------------------------------------------
    | Default Setting
    |--------------------------------------------------------------------------
    |
    | This option defines the default sms gateway that gets used when writing
    | messages to the sms. The name specified in this option should match
    | one of the gateways defined in the "gateways" configuration array.
    |
    */
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => OrderStrategy::class,

        /*
        |--------------------------------------------------------------------------
        | Default Gateways
        |--------------------------------------------------------------------------
        |
        | This option defines the default sms gateway that gets used when writing
        | messages to the sms. The name specified in this option should match
        | one of the gateways defined in the "gateways" configuration array.
        |
        */
        'gateways' => [

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Gateways
    |--------------------------------------------------------------------------
    |
    | Here you may configure the sms gateways for your application.  This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "aliyun", "alidayu", "yunpian", "submail",
    |                    "errorlog", "luosimao", "yuntongxun", "huyi"
    |                    "juhe", "sendcloud", "baidu", "huaxin", "chuanglan"
    |                    "rongcloud", "tianyiwuxian", "twilio", "qcloud", "avatardata"
    |
    */
    'gateways' => [
        //Doc
        // https://github.com/overtrue/easy-sms
    ],
];
```


## Use

```php
try {
    $res = sms('13800138000', ['content'  => '您的验证码为: 6379','template' => '259734', 'data' => [6379]]);
    print_r($res);
} catch (InvalidArgumentException $e) {
    print_r($e->getMessage());
} catch (NoGatewayAvailableException $e) {
    print_r($e->getMessage());
}
```

//如果要在 系统内使用短信通知通道
在User 模型增加
```php
    /**
     * 获取手机号
     * @param \Illuminate\Notifications\Notification|null $notification
     * @return int
     */
    public function routeNotificationForPhone($notification)
    {
        return $this->phone;
    }
```
获取手机号，通知实体类的通知渠道写 phone
