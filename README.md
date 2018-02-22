# 一个容器为了接口和实体类的解耦

[![StyleCI](https://styleci.io/repos/64408757/shield?branch=master)](https://styleci.io/repos/64408757)
[![Build Status](https://travis-ci.org/Graychen/Container.svg?branch=master)](https://travis-ci.org/Graychen/Container)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Graychen/Container/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Graychen/Container/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Graychen/Container/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Graychen/Container/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Graychen/Container/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Graychen/Container/?branch=master)
## 如何导入
```php
composer require graychen/container
```
## 如何使用
首先我们在文件中引入我们的容器
```
 use graychen\container\Container;
```
然后我们再将类注册到容器中，用字符串进行映射
#### 匿名函数方式注册
```
$container = new Container();
$container->setShared("logShared", function ($content="") {
    return new Log($content);
});
$log=$container->get("logShared", array("writeContent"));
```
#### 类名方式注册
```
$container = new Container();
$container->set("log", "graychen\container\\tests\Fixtures\Log");
$log=$container->get("log", array("setString"));
```
#### 直接传入实例化的对象的注册
```
 $container = new Container();
 $container->offsetSet("log", new Log());
 $container->offsetGet("log")
```
###容器中的判断语句
#### 判断容器中是否存在这个类
```
$container->offsetExists("log")
```
#### 去除容器中的示例
```
$container->offsetUnset("write")
```