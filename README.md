# benbanfa/yii2-log 开发环境

本仓库包含：

- 集成了 benbanfa/yii2-log 扩展的 Yii2 项目
- Docker Compose 配置

其中，Docker Compose 配置实现的是通过 Fluentd 将日志采集、归档至 `mysql` 容器 `dev` 库的 `log` 表：

    [日志] --> [Fluentd 转发实例] --> [Fluentd 汇总实例] --> [MySQL 数据库]

## 目录说明

    commands/               命令行脚本
    controllers/            Web 控制器
    var/                    工作目录
    web/                    Web 服务根目录
    docker/                 Docker Compose 配置
        fluentd-forwarder/  Fluentd 转发实例配置
        fluentd-sink/       Fluentd 汇总实例 Dockerfile 及配置
        mysql/              MySQL 配置
            init.d/         初始化数据库的 SQL
        nginx/              Nginx 配置
        php-fpm/            PHP-FPM Dockerfile 及 PHP 配置
    docs/                   文档
    vendor/                 PHP Composer 依赖安装目录

提示：重要文件首部有注释。

## 使用 Docker Compose 配置

### 创建 Docker Compose 的 .env 文件

在 `docker` 目录里，参考 `.env.example` 文件创建 `.env` 文件。

提示：请理解各配置项的含义。

### 运行 Docker Compose 项目

在 `docker` 目录里，执行：

    docker-compose up -d

提示：请确认各容器成功启动。

### 在 PHP-FPM 容器里安装 PHP Composer 依赖

在 `php-fpm` 容器里执行：

    composer install --ignore-platform-reqs

### 创建 PHP 项目的 .env 文件

参考仓库根目录下的 `.env.example` 创建 `.env` 文件。

提示：请理解各配置项的含义。

### 在 PHP 项目里写代码，产生日志

本仓库里的 Yii2 项目提供了产生 `error` 级别日志的命令行程序，在 `php-fpm` 容器里执行：

    ./yii log/error 日志内容

提示：确认日志能够被收录到数据库中。

## 参考资料

- https://docs.fluentd.org/input/forward
- https://docs.fluentd.org/buffer

