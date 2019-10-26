---
prev: 2_installation
next: false
---

# Quick Start

## Convert a whole directory 
just the files in a directory, it's not recursive
```bash
tailwindo path/to/directory/ 
```
## Recursively convert a whole directory 
```bash
tailwindo path/to/directory/ --recursive=true
```
You can also use the short hand `-r true` instead of the full `--recursive=true`

## Convert different file extensions
This will allow you to upgrade your `vue` files, `twig` files, and more!
```bash
tailwindo path/to/directory/ --extensions=vue,php,html
```
You can also use the short hand `-e vue,php,html` instead of the full `--extensions`

## Overwrite the original files
```bash
tailwindo path/to/directory/ --replace=true
```
::: tip
Please note this can be considered a destructive action as it will replace the orignal file and will not leave a copy of the original any where.
:::


## Convert one file
By default this will copy the code into a new file like file.html -> file.tw.html
```bash
tailwindo file.blade.php
```
This option works with the `--replace=true` option too.

## Convert raw code (a snipppet of code)
just CSS classes:

```bash
tailwindo 'alert alert-info'
```

Or html:

```bash
tailwindo '<div class="alert alert-info mb-2 mt-3">hi</div>'
```

