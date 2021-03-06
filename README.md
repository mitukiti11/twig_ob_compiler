# twig_ob_compiler
twig output buffer compiler

[![Latest Stable Version](https://poser.pugx.org/mitukiti11/twig_ob_compiler/version)](https://packagist.org/packages/mitukiti11/twig_ob_compiler)
[![Latest Unstable Version](https://poser.pugx.org/mitukiti11/twig_ob_compiler/v/unstable)](https://packagist.org/packages/mitukiti11/twig_ob_compiler)
[![Build Status](https://travis-ci.org/mitukiti11/twig_ob_compiler.svg?branch=master)](https://travis-ci.org/mitukiti11/twig_ob_compiler)
[![License](https://poser.pugx.org/mitukiti11/twig_ob_compiler/license)](https://packagist.org/packages/mitukiti11/twig_ob_compiler)
[![composer.lock available](https://poser.pugx.org/mitukiti11/twig_ob_compiler/composerlock)](https://packagist.org/packages/mitukiti11/twig_ob_compiler)
[![Coverage Status](https://coveralls.io/repos/github/mitukiti11/twig_ob_compiler/badge.svg?branch=master)](https://coveralls.io/github/mitukiti11/twig_ob_compiler?branch=master)
```bash
# install
composer install mitukiti11/twig_ob_compiler
```

#### index.php
```php:index.php
use Mitts11\Twig\TwigObCompiler;

// require ("./vendor/autoload.php");

// Please load in your way
/** @var $twig Twig_Environment */
$twig = $container->get('twig');

// set TwigObCompiler 
$twig->setCompiler(new TwigObCompiler($twig));

// render
$twig->display('index.html.twig', array('sleeping' => new class {
  public function __toString () {
    sleep(1);
    return "wake!!!";
  }
}));
```

#### index.html.twig
```twig:index.html.twig
<pre>
1{{ sleeping }}
2{{ sleeping }}
3{{ sleeping }}
4{{ sleeping }}
5{{ sleeping }}
6{{ sleeping }}
7{{ sleeping }}
8{{ sleeping }}
9{{ sleeping }}
10{{ sleeping }}
complete!!!
</pre>
```
![バッファリング](https://github.com/mitukiti11/twig_ob_compiler/blob/master/docs/ss.gif "SS")
