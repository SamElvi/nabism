<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'gt',        // 数据库名, Turing HR
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',    // 密码
    'DB_PORT'               => 3306,        // 端口
    'DB_PREFIX'             => 'gt_',       // 数据库表前缀
    'DB_SUFFIX'             => '',          // 数据库表后缀

    // 'DEFAULT_MODULE'        => 'Home',

    'site_upload_allowexts' => 'jpg,gif,png,jpeg,rar,zip,swf',
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DEFAULT_CHARSET'       => 'utf8',      // 默认输出编码
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        => 0,           // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        => false,       // 数据库读写是否分离 主从式有效
    'VAR_PAGE'              => 'pageNo',
    'DATA_CACHE_TABLE'      => 'cache',
    'TOKEN_ON'              => false,		// 关闭令牌验证
    'LANG_SWITCH_ON'        => true,
    'USER_AUTH_KEY'         => 'authId',	// 用户认证SESSION标记

    'TMPL_L_DELIM'					=> '<{',
    'TMPL_R_DELIM'					=> '}>',

    'APP_DEBUG'	            => true,
    'APP_STATUS'            => 'debug',     // 应用调试模式状态
    'SHOW_PAGE_TRACE'       => true,        // 显示页面Trace信息
	'TMPL_LAYOUT_ITEM' 		=> '{__CONTENT__}', // 布局模板的内容替换标识
	'LAYOUT_ON'				=> true,
	'LAYOUT_NAME'  			=> 'boot_layout',

    'SESSION_AUTO_START' => true, //是否开启session
    // 'URL_ROUTER_ON' => true, //// 开启路由
    // 'URL_PARAMS_BIND' => true, // URL变量绑定到操作方法作为参数
    // 'URL_HTML_SUFFIX'       => 'html',      // 设置伪静态,不带 html 后缀

    'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL' => 1, // URL访问模式,可选参数0、 1、 2、 3,代表以下四种模式：
        // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE 模式); 3 (兼容模式) 默认为PATHINF模式
    // 'URL_PATHINFO_DEPR' => '&', // PATHINFO模式下， 各参数之间的分割符号
    'URL_PATHINFO_FETCH' => 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', //用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_REQUEST_URI' => 'REQUEST_URI', // 获取当前页面地址的系统变量 默认为REQUEST_URI
    'URL_HTML_SUFFIX' => 'html', // URL伪静态后缀设置
    'URL_DENY_SUFFIX' => 'ico|png|gif|jpg', // URL禁止访问的后缀设置
    'URL_PARAMS_BIND' => true, // URL变量绑定到Action方法参数
    'URL_PARAMS_BIND_TYPE' => 0, // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定
    'URL_404_REDIRECT' => '', // 404 跳转页面 部署模式有效
    'URL_ROUTER_ON' => true, // 是否开启URL路由
    'CHECK_APP_DIR' => true, // 是否检查应用目录是否创建
    'FILE_UPLOAD_TYPE' => 'Local', // 文件上传方式
    'DATA_CRYPT_TYPE' => 'Think', // 数据加密方式

);