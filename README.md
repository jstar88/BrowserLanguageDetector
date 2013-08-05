BrowserLanguageDetector
=======================

An easy tool to detect accepeted browser languages


## Usage

```php
    require('BrowserLanguageDetector.php');
    $def = "es"; // default is "en"
    
    foreach (new BrowserLanguageDetector($def) as $language) // high priority first
    {
      $path = "lang/$language.php";
      if(file_exist($path))
      {
        break;
      }
    }
    include($path);
    //do some stuff
```
