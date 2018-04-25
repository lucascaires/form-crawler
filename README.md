# Form Crawler
PHP lib to extract form fields from external urls
It was used in a project to generate forms based on another page

# Usage

## Return an array
```php
<?php
  require_once("/path/to/class.form.crawler.php");  
  $form = new FormCrawler("https://github.com/join");
  $array = $form->fields(['input', 'select', 'textarea'])->attrs(['type', 'name', 'placeholder'])->get();
  var_dump($array);
?>
```

##Or returning json format
```php
<?php
  require_once("/path/to/class.form.crawler.php");  
  $form = new FormCrawler("https://github.com/join");
  $json = $form->fields(['input', 'select', 'textarea'])->attrs(['type', 'name', 'placeholder'])->getJson();
  var_dump($json);
?>
```
