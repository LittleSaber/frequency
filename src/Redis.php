<?php

namespace Zhangjianping\Frequency;
use Predis\Client;

class Redis extends FrequencyAbstract
{
    public static $redis;

    public static $redisConfig;

    /**
     * Redis constructor.
     * @throws \Exception
     */
    private function __construct()
    {
        try {
            self::$redisConfig = $this->getConfig('redis');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function getRedis()
    {
        if (isset(self::$redis)) {
            return self::$redis;
        }
        return self::$redis = new Client(self::$redisConfig);
    }

    private function __clone()
    {

    }
}