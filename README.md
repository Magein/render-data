### 简介
    用于构建后台可视化数据html样式      
    
### 文件结构
    
    -demo           使用示例以及如何扩展
    -library        主要文件
        --constant  配置常量
        --render    渲染类
        ----form    表单项渲染类
        ------ CheckboxRender.php   复选框渲染类
        ------ FileRender.php       上传框渲染类
        ......
        ----CharRender.php          字符串渲染类
        ----FormRender.php          表单相关渲染类父类
        ----ImageRender.php         图片渲染类
        ----RedirectRender.php      重定向渲染类
        --style     渲染类型处理
        -----RenderStyle.php        默认渲染类
        --tools     工具类
        -----RenderClass.php        渲染类实例
        --FieldRenderAbstract.php   数据渲染使用的类需要继承此抽象类
        --RenderFactory.php         数据渲染工厂
        --RenderStyleAbstract.php   渲染结果样式（表格，表单等等）
        
### 字段渲染类
    
    字段渲染类抽象类：FieldRenderAbstract
     
    需要实现render()方法获得渲染的html标签，参考render文件夹下的默认的字段渲染类      
     
    关键属性：
        data    等待渲染的字段数据信息
        name    字段name值（一般用于取data中的值）
        value   data中的值
     
    使用：声明一个字段渲染类建议放到tools文件下的RenderClass中，这样可以获得更好的提示
    $factory=new RenderFactory();
    $factory->apppend('name','姓名')->text()->test();
     
### 字段标题
    
    可以注册通用的标题，就不用指定append的第二个参数，这样做的好处，既可以规范字段又能够减少开发时间，字段展示，编辑，导出，筛选条件都需要指定一个标题，需多次，并且有可能描述不一致
     
    建议使用这种方式去处理，建议title分组，如通用，个人信息等等字段，
    
    // 获取标题
    $title=[
        'name'=>'姓名',
    ];
    
    $factory=new RenderFactory();
    $factory->setFieldTitle();
    $factory->apppend('name')->text()->test();
    
### 渲染结果

    渲染结果抽象类:RenderStyleAbstract
    
    需要实现的方法：
        element()           用来接收相关数据
        render($style)      渲染处理（会把RenderFactory第二个参数传递给此方法）
    
    $factory=new RenderFactory($data,$style);
    $factory->setFieldTitle();
    $factory->apppend('name')->text()->test();
    $factory->render();
    
    调用render()方法，会调用RenderStyle类中的render()方法处理,可以根据$style实现需要的html
    
    关键属性：
        $data           等待渲染的数据
        $field          添加的字段列表
        $fieldTitle     添加的字段标题
        
   
    
    
     
                     
            
        
                            
        
        
          
    
    