The solution is to avoid using pass-by-reference ("&" symbol) in the foreach loop. Create a copy of the object to ensure that modifications within the loop do not directly affect the original object.

```php
class MyClass {
  public $value = 0;
}

$objects = [];
for ($i = 0; $i < 3; $i++) {
  $objects[] = new MyClass();
}

foreach ($objects as $obj) { // No & here
  $newObj = clone $obj; // Create a copy
  $newObj->value = $i; // Modify the copy
  $objects[$i] = $newObj; // Update the original array with modified object
}

foreach ($objects as $obj) {
  echo "Object value: " . $obj->value . "\n";
}
```

By cloning each object before modification and then updating the original array with the modified copy, we prevent the unintended side effect of altering all objects via a single reference. This approach ensures independent modification for each object within the loop.
