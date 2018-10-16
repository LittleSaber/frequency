<?php
require_once __DIR__ . "/vendor/autoload.php";
use Zhangjianping\Frequency\Frequency;

try {
    Frequency::create('testProject')->checkAndAdd();
} catch (Exception $e) {
    echo sprintf("code:%s,line:%s,msg:%s", $e->getCode(), $e->getLine(), $e->getMessage());
}

