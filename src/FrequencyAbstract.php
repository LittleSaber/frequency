<?php
namespace Zhangjianping\Frequency;
use Exception;

class FrequencyAbstract
{

	public static $config;

    /**
     * 获取配置文件
     * @param $name
     * @return mixed
     * @throws Exception
     */
	public static function getConfig($name)
	{
		$fileName = __DIR__ . '/config/frequency.php';
		if (!file_exists($fileName)) {
			throw new Exception("unable find config file");
		}
		self::$config = require_once __DIR__ . '/config/frequency.php';
		if (!isset(self::$config[$name])) {
		    throw new Exception("unable find config");
        }
		return self::$config[$name];
	}
}
