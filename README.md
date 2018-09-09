# twig_ob_compiler
twig output buffer compiler

[![Build Status](https://travis-ci.org/mitukiti11/twig_ob_compiler.svg?branch=master)](https://travis-ci.org/mitukiti11/twig_ob_compiler)


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
{{ sleeping }}1
{{ sleeping }}2
{{ sleeping }}3
{{ sleeping }}4
{{ sleeping }}5
{{ sleeping }}6
{{ sleeping }}7
{{ sleeping }}8
{{ sleeping }}9
{{ sleeping }}10
```
