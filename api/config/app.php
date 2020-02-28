<?php
/**
 * 请在下面放置任何您需要的应用配置
 *
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author dogstar <chanzonghuang@gmail.com> 2017-07-13
 */

return array(
	/**
	 * 应用接口层的统一参数
	 */
	'apiCommonRules' => array(
		'sign' => array('name' => 'sign', 'require' => true),
	),
	// /**
	//  * 七牛相关配置
	//  */
	// 'Qiniu' =>  array(
	// 	//统一的key
	// 	'access_key' => '',
	// 	'secret_key' => '',
	// 	//自定义配置的空间
	// 	'space_bucket' => '',
	// 	'space_host' => '', // 如果有配置此项，则优先使用此域名
	// 	'preffix' => '', // 上传文件名前缀
	// ),
	  /**
     * 阿里云OSS相关配置
     */
    'AliyunOss' =>  array(
			'accessKeyId'       => '',
			'accessKeySecret'   => '',
			'bucket'            => '',
			'endpoint'          => 'oss-cn-hangzhou.aliyuncs.com',
			'isCName'           => false,
			'securityToken'     => null,
			'requestProxy'      => null,
	),
 /**
     * 云上传引擎,支持local,oss,upyun
     */
    'UCloudEngine' => 'local',

    /**
     * 本地存储相关配置（UCloudEngine为local时的配置）
     */
    'UCloud' => array(
        //对应的文件路径
        'host' => 'http://localhost/phalapi/public/upload'
		),
		

		/**
     * 扩展类库 - Redis扩展
     */
    'redis' => array(
        //Redis链接配置项
        'servers'  => array(
            'host'   => '127.0.0.1',        //Redis服务器地址
            'port'   => '6379',             //Redis端口号
            'prefix' => 'PhalApi_',         //Redis-key前缀
            'auth'   => 'phalapi',          //Redis链接密码
        ),
        // Redis分库对应关系操作时直接使用名称无需使用数字来切换Redis库
        'DB'       => array(
            'developers' => 1,
            'user'       => 2,
            'code'       => 3,
        ),
        //使用阻塞式读取队列时的等待时间单位/秒
        'blocking' => 5,
    ),



	/**
	 * 接口服务白名单，格式：接口服务类名.接口服务方法名
	 * @author ipso
	 */
	'service_whitelist' => array(
		'Collection.*',
		'Question.*',
		'Focus.*',
		'Like.*',
		'Mistake.*',
		'Manager.*',
		'Note.*',
		'QCategory.*',
		'Recharge.*',
		'Loginlog.*',
		'School.*',
		'Site.*',
		'Question.*',
		'User.getCode',
		'User.add',
		'User.getUser',
		'User.getUid',
		'User.getRecommend',
		'User.getTest',
		'User.getByName',
		'User.getById',
		'Keyword.*',
		'Upload.*',
		'User.changeUserAvatar',
		'User.getStudents',
		'User.getStudentCount',
		'User.getTeachers',
		'User.getTeacherCount',
		'User.delete',
		'*.*'
	),
);
