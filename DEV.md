### Dev


```
git submodule add https://github.com/nemundo/abrechnung.git lib/abrechnung
```


```
$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/abrechnung/src/';
$lib->namespace = 'Nemundo\\Abrechnung';
```