# dataset
数据包

### 要求
PHP7.0+

### 安装
```
composer require 7csn/dataset
```

### 使用
1. 普通数据包
    
    ```php
    <?php
    
    use chaser\dataset\Application;
    use chaser\dataset\Packet;
    
    class Data1 extends Application {}
    
    // 等效于类 Data1
    class Data2
    {
        use Packet;
    
        protected $dataPackage = [];
    }
    
    $data = rand(0, 1) ? new Data1() : new Data2();
    
    # 增/改 单个数据
    $data->setSingleData('a', 1);
    # 同上
    # $data->a = 1;
    
    # 增/改 多个数据
    $data->setMultipleData(['b' => 2, 'c' => 3]);
    
    # 获取 单个数据
    echo $data->getSingleData('b'); // 2
    # 同上
    echo $data->b;
    
    # 获取 多个数据
    # $data->getMultipleData('a', 'c'); // 返回 [1,3];
    
    # 获取整个包数据
    # $data->getPackage(); // 返回 ['a' => 1, 'b' => 2, 'c' => 3]
    ```
    此外，具备 chaser\dataset\PacketReducible 删除特性：  
        提供 protected 修饰的 delSingleData(string $name)（删除单个）、delMultipleData(string ...$names)（删除多个）、clearAllData()（清空数据包）方法
2. 封闭数据包特性
    ```php
    <?php
    
    use chaser\dataset\autism\Packet;
    
    class Data
    {
        use Packet;
    
        /**
         * 初始化封闭数据包
         *
         * @var array
         */
        protected $dataPackage = [
            'a' => 11,
            'b' => 22,
            'c' => 33
        ];
    }
    
    $data = new Data();
    
    # 修改已有数据
    $data->setSingleData('a', 1);
    # 同上
    #$data->a = 1;
    
    # 批量修改已有数据
    $data->setMultipleData(['b' => 2, 'c' => 3]);
    
    # 获取 单个数据
    echo $data->getSingleData('b'); // 2
    # 同上
    #echo $data->b;
    
    # 获取 多个数据
    # $data->getMultipleData('a', 'c'); // 返回 [1,3];
    
    # 获取整个包数据
    # $data->getPackage(); // 返回 ['a' => 1, 'b' => 2, 'c' => 3]
    ```
    封闭数据包特性，没有增删功能，数据包的数据项是固定的。
3. 封闭数据包实例
    ```php
    <?php
    
    use chaser\dataset\autism\Application;
    
    class Data extends Application {}
    
    $data = new Data();
    ```
    使用同【2.封闭数据包特性】，不同之处：
    * 具备 chaser\dataset\autism\PacketAddable 增加特性：  
        提供 protected 修饰的 addSingleData(string $name, $value)（增加单个）、addMultipleData(array $data)（增加多个）方法
    * 具备 chaser\dataset\PacketReducible 删除特性：  
        提供 protected 修饰的 delSingleData(string $name)（删除单个）、delMultipleData(string ...$names)（删除多个）、clearAllData()（清空数据包）方法
