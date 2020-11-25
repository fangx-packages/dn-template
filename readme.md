## Fangx's Packages

一个好用的后台模板(Layuimini), 基于 Layui 开发.

- **Thanks**
    - [Layuimini](https://github.com/zhongshaofa/layuimini)
    - [Layui](https://github.com/sentsin/layui)

### Install

Via Composer

```
composer require fangx/dn-template
```

### Usage

> 所有页面默认都发布在 `public/dn-template/page` 里面, 根据自己的需要进行修改和调整

#### Hyperf

> **注意**: 
> 1. 需要安装 `hyperf/view-engine` 并正常配置相关内容, [详见文档](https://hyperf.wiki/2.0/#/zh-cn/view-engine)
> 2. 需要配置静态资源的相关设置, [详见文档](https://hyperf.wiki/2.0/#/zh-cn/view?id=%e9%85%8d%e7%bd%ae%e9%9d%99%e6%80%81%e8%b5%84%e6%ba%90)

- 发布静态资源

```bash
php ./bin/hyperf.php vendor:publish fangx/dn-template
```

- 配置路由

```php
Router::addRoute(['GET', 'POST', 'HEAD'], '/dn-template/index', [\Fangx\DnTemplate\DnTemplateController::class, 'index']);
```

- 启动服务 `php ./bin/hyperf.php start`, 访问 `http://127.0.0.1:9501/dn-template/index` 即可看到页面

#### Laravel

- 发布静态资源

```bash
php artisan vendor:publish --tag=dn-template
```

- 配置路由 `routes/web.php`

```php
Route::any('/dn-template/index', [\Fangx\DnTemplate\DnTemplateController::class, 'index']);
```

- 启动服务 `php artisan serve`, 访问 `http://127.0.0.1:8000/dn-template/index` 即可看到页面
