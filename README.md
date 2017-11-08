## zgldh/Scaffold

仍然处在开发阶段，不稳定。
打算正式版的时候，全盘转入token认证。也就是laravel里面的 auth:api

## 开发路线：

1. 在 Laravel5.5 空项目上安装。
1. 使用 `composer require zgldh/scaffold` 后， 所需要的其他 composer
 包自动引用完毕。
2. 在 `/config/app.php` 加入 `zgldh\Scaffold\ScaffoldServiceProvider::class,`。
2. 编辑 `.env` 写入 `APP_URL` 和 `DB_` 数据库相关配置。
3. 使用 `zgldh:scaffold:init` 后：
    1. 参数：
        1. 需要知道 Modules 目录名
        2. 需要知道 host    
    1. 创建 Modules 目录
    2. 自动设置好根目录的 `composer.json`
    3. 自动设置好根目录的 `packages.json` 
    4. 自动设置好根目录的 `webpack.mix.js`
    5. 自动设置好 `/config/zgldh-scaffold.php` 里面会储存 Modules 目录名
    6. 自动设置好 `/resources`
    7. 自动执行 `composer dumpautoload`
4. 安装其他 Module
   1. 如果要安装基础的用户、日志、上传 Module
   2. `composer require zgldh/module-user` 
   3. `php artisan zgldh:module:install zgldh/module-activity-log`
   4. `php artisan zgldh:module:install zgldh/module-upload`
   5. `php artisan zgldh:module:install zgldh/module-user`
5. 执行 `npm install`
6. 执行 `npm run watch` 开始开发调试。
7. 访问 `localhost:3000/admin` ， 这是本脚手架主要功能路径。

## 安装 Module 的方法

1. 比如想装 User 模块
2. 执行 `composer require zgldh/module-user`
3. 先安装依赖的其他模块。
4. 执行 `zgldh:module:install zgldh/module-user`
    1. 自动将文件放入 Modules 目录下
    2. 自动设置好 `/database` 目录
    3. 自动设置好 `/config/app.php` 加入对应的 ServiceProvider
    4. 自动执行 `php artisan migrate`
    
## 生成 Module 的方法

1. 比如想生成 Blog 模块。
2. 在 Modules 目录下建立 `Blog` 目录
3. 在 `Blog` 目录下建立 `Starter.php`
4. 编写 `class Starter` 
5. //TODO [如何编写](STARTER_SAMPLE.md)
6. 执行 `php artisan zgldh:module:create Modules\Blog`
7. 即可自动生成 Blog 模块。
    1. 自动生成 PHP 逻辑
    2. 自动生成后台的 Web 组件
    3. 自动生成 PHP 路由
    4. 自动将 PHP 路由写入 `/routes/web.php` 
    5. 自动生成前端路由
    6. 自动将前端路由写入 `/resource/assets/js/entries/admin.js`
    7. 自动写入 `/config/app.php` ServiceProvider
    8. 自动写入后台菜单项
