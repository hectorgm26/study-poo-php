# Configuración de Autoloader con Composer

## 0. Instalar Composer, teniendo previamente PHP instalado. Luego hacer en terminal composer -v para corroborar instalación exitosa.

## 1. Inicializar un Proyecto con Composer

Si aún no tienes un archivo `composer.json`, debes inicializar Composer en tu proyecto ejecutando:

```sh
composer init
```

Durante el proceso de inicialización, se te pedirá ingresar varios datos. A continuación, te mostramos un ejemplo de respuestas:

```
Package name (vendor/name) [mi-proyecto]: Ejemplo: Hectorgm/Poo
Description []:
Author []:
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []:
License []:

Would you like to define your dependencies (require) interactively [yes]? yes
Search for a package []:

Would you like to define your dev dependencies (require-dev) interactively [yes]? yes
Search for a package []:

Add PSR-4 autoload mapping? Maps namespace "App\" to the entered relative path. [src/, n to skip]: src/

Do you confirm generation [yes]? yes
```

Al finalizar, Composer mostrará las líneas que indican cómo usar el autoloader:

```
Autoloading configured: Use "namespace Hectorgm\Poo;" in src/
Include the Composer autoloader in your project with: require 'vendor/autoload.php';
```

## Información adicional sobre el uso de namespaces y autoload en Composer

Composer con autoload nos permite utilizar namespaces para organizar nuestras clases y exportarlas a otros archivos.

### Uso de `namespace` y `use`

#### Definiendo un namespace en una clase
```php
<?php

namespace Hectorgm\Poo\modelos;

class Usuario {
    public function __construct() {
        echo "Usuario creado";
    }
}
```

- `namespace Hectorgm\Poo\modelos;` → Permite que la clase sea exportada a otros archivos y se pueda importar con `use` y la ruta del namespace.

#### Importando una clase con `use`

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Hectorgm\Poo\modelos\Usuario;

$usuario = new Usuario();
```

- `use Hectorgm\Poo\modelos\Usuario;` → Importamos la clase `Usuario` con `use` y la ruta del namespace.
- Cuando los archivos están en la misma carpeta, **no es necesario usar `use`** para importar la clase.

### Aclaración

Si dentro de `src` se crearon nuevas carpetas, como por ejemplo `src/modelos` o `src/utils`, estas deberán ser referenciadas correctamente con `namespace` y `use`. 

Ejemplo:
```php
namespace Hectorgm\Poo\modelos;
use Hectorgm\Poo\utils\UUID;
```

- Esto es necesario para importar clases que están en diferentes carpetas.
- **Cuando los archivos están en la misma carpeta, no es necesario usar `use`** para importar la clase, ya que se pueden referenciar directamente.
- Esto es útil, por ejemplo, cuando se quiere utilizar herencia dentro de la misma carpeta sin necesidad de importar explícitamente las clases.

### Configuración en `composer.json`

Cuando ejecutamos `composer init`, se nos solicita agregar la configuración de **autoload** en `composer.json`. Si indicamos un **namespace**, se genera una estructura similar a esta:

```json
{
  "autoload": {
    "psr-4": {
      "Hectorgm\\Poo\\": "src/"
    }
  }
}
```

¡Listo! Ahora tu proyecto tiene **autoloading** configurado correctamente con Composer.