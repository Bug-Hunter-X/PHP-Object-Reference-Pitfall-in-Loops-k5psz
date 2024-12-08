In PHP, a common yet subtle error arises when dealing with references and objects, particularly within loops or recursive functions.  Consider a scenario where you modify an object property through a reference inside a loop.  If the object is referenced multiple times within the loop, the changes made in one iteration can unexpectedly affect other iterations because they share the same object reference.

```php
class MyClass {
  public $value = 0;
}

$objects = [];
for ($i = 0; $i < 3; $i++) {
  $objects[] = new MyClass();
}

foreach ($objects as &$obj) { // Note the & (pass by reference)
  $obj->value = $i; 
}

foreach ($objects as $obj) {
  echo "Object value: " . $obj->value . "\n";
}
```

In the above code, the `foreach` loop iterates with a reference (`&obj`). Modifying `$obj->value` within the loop directly affects the original `$objects` array, thus, all object's values will end up being 2 instead of reflecting their initial index position. This occurs because all objects in the array are modified by the same reference.
