<?php

namespace Magein\renderData\library;

use Magein\renderData\library\constant\RenderStyleConstant;
use Magein\renderData\library\render\CharRender;
use Magein\renderData\library\render\form\TextRender;
use Magein\renderData\library\style\RenderStyle;
use Magein\renderData\library\tools\RenderClass;

class RenderFactory
{
    /**
     * 等待渲染的数据
     * @var array
     */
    private $data;

    /**
     * 等待渲染的数据中的字段
     * @var array
     */
    private $fields;

    /**
     * 等待渲染的数据中标题列表
     * @var array
     */
    private $fieldTitle;

    /**
     * 设置最后一个字段的name值
     * @var string
     */
    private $lastFieldName;

    /**
     * 注册渲染类
     * @var
     */
    private $renderClass;

    /**
     * 渲染样式
     * @var string
     */
    private $style;

    /**
     * 渲染样式所使用的类
     * @var RenderStyle
     */
    private $renderStyle;

    /**
     * 当前类的实例
     * @var RenderFactory
     */
    private static $instance;

    /**
     * @var string
     */
    private $error;

    /**
     * @var bool
     */
    public $debug = true;

    /**
     * VisualData constructor.
     * @param array $data
     * @param string $style
     */
    public function __construct($data = [], $style = RenderStyleConstant::RENDER_TABLE)
    {
        // 获取当前类
        self::$instance = $this;

        // 待渲染的数据赋值
        $this->data = $data;

        // 渲染的样式
        $this->style = $style;

        $this->init();
    }

    public function init()
    {
        // 注册渲染样式类
        $this->setRenderStyle(new RenderStyle());

        // 注册渲染类
        $this->setRenderClass(RenderClass::class);
    }

    /**
     * @param $error
     * @throws \Exception
     */
    private function setError($error)
    {
        if ($this->debug) {
            throw new \Exception($error);
        } else {
            $this->error = $error;
        }
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param RenderStyleAbstract $class
     * @throws \Exception
     */
    public function setRenderStyle(RenderStyleAbstract $class)
    {
        if (!method_exists($class, $this->style)) {
            $this->setError('没有找到对应的方法渲染样式');
        }

        $this->renderStyle = $class;
    }

    /**
     * @param $renderClass
     * @throws \Exception
     */
    public function setRenderClass($renderClass)
    {
        if (is_string($renderClass)) {

            try {

                $class = new $renderClass();

                if (!$class instanceof RenderClass) {
                    $this->setError('渲染类需要继承RenderClass');
                }

            } catch (\Exception $exception) {
                $this->setError('实例化渲染类失败:' . $renderClass);
            }

            $this->renderClass = $class;

        } else {
            $this->renderClass = $renderClass;
        }
    }

    /**
     * @param array $title
     */
    public function setFieldTitle(array $title)
    {
        $this->fieldTitle = $title;
    }

    /**
     * @return array
     */
    public function getFieldTitle()
    {
        $title = [];

        if ($this->fields) {
            foreach ($this->fields as $item) {
                $title[$item['name']] = $item['title'];
            }
        }

        return $title;
    }

    /**
     * @return array
     */
    public function getFieldList()
    {
        return $this->fields;
    }

    /**
     * @param $name
     * @param string $title
     * @param null $class
     * @return RenderClass
     */
    public function append($name, $title = null, $class = null)
    {
        if (null === $title && isset($this->fieldTitle[$name])) {
            $title = $this->fieldTitle[$name];
        }

        $this->fields[$name] = [
            'name' => $name,
            'title' => $title
        ];

        $this->lastFieldName = $name;

        $this->fieldClass($class);

        return $this->renderClass;
    }

    /**
     * @param null $class
     * @throws \Exception
     */
    private function fieldClass($class = null)
    {
        if (null === $class) {

            if ($this->style == RenderStyleConstant::RENDER_TABLE) {
                $class = CharRender::class;
            } else {
                $class = TextRender::class;
            }
        }

        if (is_object($class)) {

            if (!$class instanceof FieldRenderAbstract) {
                $this->setError(get_class($class) . ' class must extends RenderClassAbstract');
            }

        } else {

            if (class_exists($class)) {
                $class = new $class();
                if (!$class instanceof FieldRenderAbstract) {
                    $this->setError(get_class($class) . ' class must extends RenderClassAbstract');
                }
            } else {
                $this->setError($class . ' class not found');
            }
        }

        $class->setName($this->lastFieldName);

        $this->fields[$this->lastFieldName]['class'] = $class;
    }

    /**
     * @return mixed|null|string
     */
    public function render()
    {
        $class = $this->renderStyle;
        $class->element($this->data ?: [], $this->fields ?: [], $this->getFieldTitle());
        $result = $class->render($this->style);
        return $result;
    }

    /**
     * 设置字段使用的渲染类
     * @param $class
     */
    public static function setFieldRenderClass($class)
    {
        self::$instance->fieldClass($class);
    }

    /**
     * 获取渲染结果
     * @param array $dataFields
     * @param array $data
     * @return array
     */
    public static function renderData(array $dataFields = [], $data = [])
    {
        $result = [];

        if (empty($dataFields)) {
            return $result;
        }

        foreach ($dataFields as $name => $item) {

            if (is_object($item['class'])) {

                /**
                 * @var FieldRenderAbstract $class
                 */
                $class = clone $item['class'];

                // 是否设置回调函数
                if ($class->__get('callback')) {
                    $class = call_user_func($class->__get('callback'), $data);
                }

                if ($class instanceof FieldRenderAbstract) {

                    $value = $class->__get('value');

                    if ($value === null) {
                        $value = isset($data[$name]) ? $data[$name] : null;
                    }

                    $class->setData($data);
                    $class->setValue($value);

                    if (method_exists($class, 'render')) {
                        // 调用渲染类方法
                        $result[$name] = call_user_func([$class, 'render']);
                    }
                }
            }
        }

        return $result;
    }
}