<?php
define("MANY_USERS", false);

$config = array();

$config['UPGRADE']['DB_HOST'] = '';
$config['UPGRADE']['DB_USER'] = '';
$config['UPGRADE']['DB_PWD'] = '';
$config['UPGRADE']['DB_PORT'] = '';
$config['UPGRADE']['DB_NAME'] = '';
$config['UPGRADE']['DB_CHARSET'] = '';
$config['UPGRADE']['SYNC_BIN'] = '';

/**
 * 多环境对比工具配置
$config['UPGRADES'][0]['NAME'] = '';
$config['UPGRADES'][0]['DB_HOST'] = '';
$config['UPGRADES'][0]['DB_USER'] = '';
$config['UPGRADES'][0]['DB_PWD'] = '';
$config['UPGRADES'][0]['DB_PORT'] = '';
$config['UPGRADES'][0]['DB_NAME'] = '';
$config['UPGRADES'][0]['DB_CHARSET'] = '';
$config['UPGRADES'][0]['SYNC_BIN'] = '';
 */

$i = $j = 0;
// 项目数据库
$config['SERVERS'][$i]["NAME"] = "project name";
$config['SERVERS'][$i]['GIT_BIN'] = "";
$config['SERVERS'][$i]['GIT_PATCH'] = "";
$config['SERVERS'][$i]['GIT_USER'] = "";
$config['SERVERS'][$i]['GIT_EMAIL'] = "";
$config['SERVERS'][$i]['DATA_PATH'] = ROOT_PATH."data/project name/";

// 本地开发数据
$config['SERVERS'][$i]['env'][$j]['NAME'] = "本地数据库";
$config['SERVERS'][$i]['env'][$j]['DB_HOST'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_USER'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PWD'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PORT'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_NAME'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_CHARSET'] = 'utf8';
$config['SERVERS'][$i]['env'][$j]['DATA_PATH'] = 'local/';
$j++;

// 正式环境
$config['SERVERS'][$i]['env'][$j]['NAME'] = "正式环境数据库";
$config['SERVERS'][$i]['env'][$j]['DB_HOST'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_USER'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PWD'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PORT'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_NAME'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_CHARSET'] = 'utf8';
$config['SERVERS'][$i]['env'][$j]['DATA_PATH'] = 'pro/';
$j++;

// 测试环境
$config['SERVERS'][$i]['env'][$j]['NAME'] = "测试环境";
$config['SERVERS'][$i]['env'][$j]['DB_HOST'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_USER'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PWD'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_PORT'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_NAME'] = '';
$config['SERVERS'][$i]['env'][$j]['DB_CHARSET'] = 'utf8';
$config['SERVERS'][$i]['env'][$j]['DATA_PATH'] = 'test/';

include "config_compile.php";

define("IS_WINDOWS", strpos(strtoupper(PHP_OS), "WIN") !==false);

return $config;