# Twig Const
> Twig operator to access class constants

----------------------------------------------------------------

Const operator `#` let you access class constants through any object
of that class.

```php
<?php
    class Message {
        const TYPE_INFO = "INFO";
        // ...
    }
    $msg = new Message();
```

```twig
{{ msg # TYPE_INFO }}
{# prints 'INFO' #}
```

```twig
{% if msg.type == msg#TYPE_INFO %}
    ...
{% endif %}
```

Note that due to Twig limitations, you must add brackets when
using filters and selection operators on constants.
(But you don't need to add it with other operators.)

```twig
    {{ (msg#TYPE_INFO)|upper }}
    {{ (msg#TYPE_INFO)[2] }}
    {{ (msg#TYPE_INFO).attr }}
    {{ msg#TYPE_INFO ~ 'S' }}
```

----------------------------------------------------------------

## Installation

**Install via Composer:**
```bash
composer require dpolac/twig-const
```

**Add the extension to Twig:**
```php
$twig->addExtension(new \DPolac\TwigConst\ConstExtension());
```

**... or if you use Symfony**, add the following to your `services.yml` config file:

```yaml
services:
    # ...
    dpolac.twig_const.extension:
        class: DPolac\TwigConst\ConstExtension
        tags: [ { name: twig.extension } ]
```

----------------------------------------------------------------

## Using different operators

To use another operator instead of default `#`, pass it as string
to extension constructor.

Example:

```php
$twig->addExtension(new \DPolac\TwigConst\ConstExtension('const'));
$twig->addExtension(new \DPolac\TwigConst\ConstExtension('::'));
```

```php
{{ msg const TYPE_ERROR }}
{{ msg::TYPE_ERROR }}
```
