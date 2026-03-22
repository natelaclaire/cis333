## Formatting with Arrays

Use `vsprintf` when your values are already in an array.

```php
<?php
$format = "%s ordered %d items for $%.2f";
$values = ["Ada", 3, 27.5];

$summary = vsprintf($format, $values);
?>
```