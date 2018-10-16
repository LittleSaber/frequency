## 该项目为测试项目
* 1.配置src/config下redis.php为自己的redis环境
* 2.配置src/config下frequency.php
  * 格式为：
    ```
      'testProject' => [
        'prefix' => 'testProject',  // 封禁名称
        'time' => 20,  // 每秒允许访问1次
        'limit' => 1
      ]
    ```
* 3.使用方式参考test.php
