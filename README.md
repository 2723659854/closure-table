### 扩展包开发

#### 创建一个packages的目录
在项目的根目录下面创建一个packages目录，用来存放需要开发的扩展包。<br>
#### 文件目录
第一层是开发者的名称，比如xiaosongshu，第二层是扩展包的名称，比如closure-table。<br>
所有的文件都放在/xiaosongshu/closure-table/src目录下面。
#### 生成composer.json配置文件，
进入/xiaosongshu/closure-table/目录下，执行composer init命令，生成扩展初始化配置。
会自动生成src目录，生成vendor目录，生成composer.json目录。
#### 编程
所有要写的功能代码，服务提供者都放在src目录下。
#### 配置文件
首先在src下面创建config目录，然后创建closure-table.php 配置文件，里面写初始化的配置数据。
#### 扩展文件的服务类
这个是提供原始功能的方法，在src下面，创建ClosureTable类，里面可以写我们需要的任意方法。
这个类是整个扩展的核心功能模块，是必须的。
#### 创建插件的命令行
创建TalkCommand,继承Illuminate\Console\Command，然后里面写你的命令行需要实现的业务逻辑。
#### 创建服务提供者
创建服务提供者，ClosureTableServiceProvider.php 需要继承Illuminate\Support\ServiceProvider类。<br>
这个类是用来注册服务类的。<br>
1，发布配置<br>
2，注册命令行的<br>
3，注册服务并设置别名<br>
4，设置服务延迟加载<br>
#### 创建门面操作类
创建SongShu.php 继承Illuminate\Support\Facades\Facade，里面只需要写一个方法getFacadeAccessor<br>
返回值必须是服务提供者里面绑定服务的时候设置的别名。
#### 设置composer里面的服务提供者和门面类
其中，autoload这个是自动加载项，必须符合PSR-4规范。当我们引入Xiaosongshu\\ClosureTable\\的时候，会
自动定位到src目录。里面的files表示需要自动引入的文件，通常用来放助手函数的。
```json 
"autoload": {
        "psr-4": {
            "Xiaosongshu\\ClosureTable\\": "src/"
        },
        "files": [
            "./src/helper.php"
        ]
    },
```
关于服务提供者的配置
```json 
"extra": {
        "laravel": {
            "providers": [
                "Xiaosongshu\\ClosureTable\\ClosureTableServiceProvider"
            ],
            "aliases": {
                "SongShu": "Xiaosongshu\\ClosureTable\\Facades\\SongShu"
            }
        }
    }
```
必须有extra目录，然后指定到laravel。其中providers这个数组就是自动注册服务提供者，里面
的每一个元素都是具体的服务提供者的名称，aliases实际上是门面操作类，前面注册的服务提供者，不需要使用
app(服务者名称)的方式调用，可以直接静态化方法的调用。
#### 关于服务提供者和门面类
如果不在composer.json 配置extra，那么就要手动把服务提供者写入到项目的config/app.php的provider数组里面去，
否则无法注册服务。<br>
如果不在composer.json 配置aliases，那么如果要使用门面类，就要手动把门面类添加到config/app.php
下面的aliases数组里面去。
#### 关于命名空间
这个命名空间不能乱写的，在src目录下面，有一层目录才有一层命名空间，否则会出现找不到类的问题。
命名空间和文件目录必须严格对应。
#### 发布配置文件
```bash
php artisan vendor:publish --provider="Xiaosongshu\ClosureTable\ClosureTableServiceProvider" --force
```
这个命令的作用是将配置文件复制到项目的config目录下面的。



