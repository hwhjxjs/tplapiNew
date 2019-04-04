<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    /* UEditor编辑器配置 */
    'ueditorConfig' => [
        /* 图片上传配置 */
        'imageRoot'            => Yii::getAlias("@backend/web/storage"), //图片存放的位置
        'imageUrlPrefix'       => 'http://www.apitplbackend.com/storage', //img 引用图片url前缀 （自己域名下存放图片的文件夹名）
        'imagePathFormat'      => '/image/{yyyy}{mm}/editor{time}{rand:6}',

        /* 文件上传配置 */

        'fileRoot'             => Yii::getAlias("@backend/web/storage"), //文件path前缀
        'fileUrlPrefix'        =>'@backend/web/storage',//文件url前缀
        'filePathFormat'       => '/file/{yyyy}{mm}/editor{rand:4}_{filename}',

        /* 上传视频配置 */
        'videoRoot'            => Yii::getAlias("@backend/web/storage"), // 服务器解析到/web/目录时，上传到这里
        "videoUrlPrefix"       => 'http://www.apitplbackend.com/storage',
        'videoPathFormat'      => '/video/{yyyy}{mm}/editor{time}{rand:6}',

        /* 涂鸦图片上传配置项 */
        'scrawlRoot'           => Yii::getAlias("@backend/web/storage"), // 服务器解析到/web/目录时，上传到这里
        "scrawlUrlPrefix"      =>'http://www.apitplbackend.com/storage',
        'scrawlPathFormat'     => '/image/{yyyy}{mm}/editor{time}{rand:6}',
        ],
    /* 上传文件 */
    'upload' => [
        'url'  => Yii::getAlias('http://www.apitplbackend.com/storage/image/'),
        //'path' => Yii::getAlias('@base/web/storage/image/'), // 服务器解析到/web/目录时，上传到这里
        'path' => Yii::getAlias('@backend/web/storage/image/'),
    ],
];
