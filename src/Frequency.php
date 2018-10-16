<?php

namespace Zhangjianping\Frequency;

class Frequency extends FrequencyAbstract
{

	public static $redis;

	public static $config;

    public static $time;

	public static $limit;

    public static $key;

	public function __construct()
	{
	    self::$redis = Redis::getRedis();
	}

    /**
     * 初始化配置
     * @param $name
     * @throws \Exception
     */
	public static function initConfig($name)
    {
        try {
            self::$config = self::getConfig($name);
            self::$time = self::$config['time'];
            self::$limit = self::$config['limit'];
            self::$key = self::$config['prefix'] . ':' . self::$config['time'] . ':' . self::$config['limit'];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * 根据配置文件创建限制策略
     * @param $name
     * @return Frequency
     * @throws \Exception
     */
	public static function create($name)
    {
        self::initConfig($name);
        return new self();
    }

    /**
     * 检查并计数
     * @throws \Exception
     */
    public function checkAndAdd()
    {
        try {
            $this->check();
            $this->increase();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * 检查是否超限
     * @throws \Exception
     */
    public function check()
    {
        try {
            $times = self::$redis->get(self::$key);
        } catch (\Exception $e) {
            throw new \Exception("redis get failed");
        }
        if (isset($times) && isset(self::$limit) && $times >= self::$limit) {
            throw new \Exception("times over limit");
        }
    }

    /**
     * 计数
     * @throws \Exception
     */
    public function increase()
    {
        try {
            $times        = self::$redis->get(self::$key);
            $redisHandler = self::$redis->transaction()->incr(self::$key);
            if (empty($times)) {
                $redisHandler->expireat(self::$key, time() + self::$time);
            }
            $redisHandler->execute();
        } catch (\Exception $e) {
            throw new \Exception("increase failed");
        }
    }
}
