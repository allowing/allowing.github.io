# PSR-3 日志接口

本文档描述了日志类库的通用接口。

主要目标是让类库获得一个`Psr\Log\LoggerInterface`对象并能通过简单通用的方式来写日志。有自定义需求的框架和 CMS 可以根据情况扩展这个接口，但推荐保持和该文档的兼容性，以确保应用中使用到的第三方库能将日志集中写到应用日志里。

RFC 2119 中的必须(MUST)，不可(MUST NOT)，建议(SHOULD)，不建议(SHOULD NOT)，可以/可能(MAY)等关键词将在本节用来做一些解释性的描述。

关键词实现者在这个文档被解释为：在日志相关的库或框架实现`LoggerInterface`接口的开发人员。用这些实现者开发出来的类库的人都被称作用户。

## 规范说明

### 基本规范

`LoggerInterface`暴露八个接口用来记录八个等级`(debug, info, notice, warning, error, critical, alert, emergency)`的日志。

第九个方法是`log`，接受日志等级作为第一个参数。用一个日志等级常量来调用这个方法必须和直接调用指定等级方法的结果一致。用一个本规范中未定义且不为具体实现所知的日志等级来调用该方法必须抛出一个`Psr\Log\InvalidArgumentException`。不推荐使用自定义的日志等级，除非你非常确定当前类库对其有所支持。

### 记录信息

每个方法都接受一个字符串，或者一个有`__toString`方法的对象作为 message 参数。实现者 可以对传入的对象有特殊的处理。如果没有，实现者 必须将它转换成字符串。

message 参数中可能包含一些可以被 context 参数的数值所替换的占位符。

占位符名字必须和 context 数组类型参数的键名对应。

占位符名字必须使用一对花括号来作为分隔符。在占位符和分隔符之间不能有任何空格。

占位符名字应该只能由字母、数字、下划线(_)和英文点号(.)组成。其它的字符作为以后占位符规范的保留字。

实现者可以使用占位符来实现不同的转义和翻译日志成文。因为用户并不知道上下文数据会是什么，所以不推荐提前转义占位符。

下面提供一个占位符替换的例子，仅作为参考：

```php
<?php
/**
 * 用上下文信息替换记录信息中的占位符
 */
function interpolate($message, array $context = array())
{
    // 构建一个花括号包含的键名的替换数组
    $replace = array();
    foreach ($context as $key => $val) {
        $replace['{' . $key . '}'] = $val;
    }

    // 替换记录信息中的占位符，最后返回修改后的记录信息。
    return strtr($message, $replace);
}

// 含有带花括号占位符的记录信息。
$message = "User {username} created";

// 带有替换信息的上下文数组，键名为占位符名称，键值为替换值。
$context = array('username' => 'bolivar');

// 输出 "Username bolivar created"
echo interpolate($message, $context);
```

### 上下文

每个记录函数都接受一个上下文数组参数，用来装载字符串类型无法表示的信息。它可以装载任何信息，所以实现者必须确保能正确处理其装载的信息，对于其装载的数据，一定不能 抛出异常，或产生 PHP 出错、警告或提醒信息（error、warning、notice）。
如需通过上下文参数传入了一个 Exception 对象， 必须以 'exception' 作为键名。
记录异常信息是很普遍的，所以如果它能够在记录类库的底层实现，就能够让实现者从异常信息中抽丝剥茧。
当然，实现者在使用它时，必须确保键名为 'exception' 的键值是否真的是一个 Exception，毕竟它可以装载任何信息。

### 助手类和接口

`Psr\Log\AbstractLogger` 类使得只需继承它和实现其中的 log 方法，就能够很轻易地实现 `LoggerInterface` 接口，而另外八个方法就能够把记录信息和上下文信息传给它。
同样地，使用 `Psr\Log\LoggerTrait` 也只需实现其中的 log 方法。不过，需要特别注意的是，在 traits 可复用代码块还不能实现接口前，还需要 `implement LoggerInterface`。
在没有可用的日志记录器时， `Psr\Log\NullLogger` 接口可以为使用者提供一个备用的日志“黑洞”。不过，当上下文的构建非常消耗资源时，带条件检查的日志记录或许是更好的办法。
`Psr\Log\LoggerAwareInterface` 接口仅包括一个
`setLogger(LoggerInterface $logger)` 方法，框架可以使用它实现自动连接任意的日志记录实例。
`Psr\Log\LoggerAwareTrait` trait 可复用代码块可以在任何的类里面使用，只需通过它提供的 `$this->logger`，就可以轻松地实现等同的接口。
`Psr\Log\LogLevel` 类装载了八个记录等级常量。

### 包

上述的接口、类和相关的异常类，以及一系列的实现检测文件，都包含在 `Psr/Log` 文件包中。

### Psr\Log\LoggerInterface

```php
<?php

namespace Psr\Log;

/**
 * 日志记录实例
 *
 * 日志信息变量 —— message， **必须**是一个字符串或是实现了  __toString() 方法的对象。
 *
 * 日志信息变量中**可以**包含格式如 “{foo}” (代表foo) 的占位符，
 * 它将会由上下文数组中键名为 "foo" 的键值替代。
 *
 * 上下文数组可以携带任意的数据，唯一的限制是，当它携带的是一个 exception 对象时，它的键名 必须 是 "exception"。
 *
 * 详情可参阅： https://github.com/PizzaLiu/PHP-FIG/blob/master/PSR-3-logger-interface-cn.md
 */
interface LoggerInterface
{
    /**
     * 系统不可用
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function emergency($message, array $context = array());

    /**
     * **必须**立刻采取行动
     *
     * 例如：在整个网站都垮掉了、数据库不可用了或者其他的情况下，**应该**发送一条警报短信把你叫醒。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function alert($message, array $context = array());

    /**
     * 紧急情况
     *
     * 例如：程序组件不可用或者出现非预期的异常。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function critical($message, array $context = array());

    /**
     * 运行时出现的错误，不需要立刻采取行动，但必须记录下来以备检测。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function error($message, array $context = array());

    /**
     * 出现非错误性的异常。
     *
     * 例如：使用了被弃用的API、错误地使用了API或者非预想的不必要错误。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function warning($message, array $context = array());

    /**
     * 一般性重要的事件。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function notice($message, array $context = array());

    /**
     * 重要事件
     *
     * 例如：用户登录和SQL记录。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function info($message, array $context = array());

    /**
     * debug 详情
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function debug($message, array $context = array());

    /**
     * 任意等级的日志记录
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array());
}

```

### Psr\Log\LoggerAwareInterface

```php

<?php

namespace Psr\Log;

/**
 * logger-aware 定义实例
 */
interface LoggerAwareInterface
{
    /**
     * 设置一个日志记录实例
     *
     * @param LoggerInterface $logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger);
}


```

### Psr\Log\LoggerAwareInterface

```php
<?php

namespace Psr\Log;

/**
 * logger-aware 定义实例
 */
interface LoggerAwareInterface
{
    /**
     * 设置一个日志记录实例
     *
     * @param LoggerInterface $logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger);
}

```

### Psr\Log\LogLevel

```php
<?php

namespace Psr\Log;

/**
 * 日志等级常量定义
 */
class LogLevel
{
    const EMERGENCY = 'emergency';
    const ALERT     = 'alert';
    const CRITICAL  = 'critical';
    const ERROR     = 'error';
    const WARNING   = 'warning';
    const NOTICE    = 'notice';
    const INFO      = 'info';
    const DEBUG     = 'debug';
}
```

