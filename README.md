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
            
     
                     
            
        
                            
        
        
          
    
    