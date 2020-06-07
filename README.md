# MVC PHP

Estructura básica de un proyecto mvc con php.

## Caracteristicas

- Simple y fácil de entender.
- Estructura simple y limpia.
- URLs amigables (básico).
- PDO para acceso a la base de datos.
- Código PHP nativo, por lo que las personas no tienen que aprender un framework.
- Intenta seguir las pautas de codificación de PSR.
- Utiliza el autocargador PSR-4.

## Requerimientos

- PHP 7.0 o posterior.
- MySQL.
- mod_rewrite activado.
- conocimiento básico de php.
- conocimiento básico de composer.

## Instalación

- Edite las credenciales de la base de datos en `App/Config/Config.php`.
- Instale Composer y ejecute `composer dump-autoload` en la carpeta del proyecto.

## Seguridad

El script utiliza mod_rewrite y bloquea todo el acceso a todo lo que esté fuera de la carpeta `/public`. Para las solicitudes a la base de datos se utiliza PDO para evitar inyección SQL.

## PSR-4

```
{
    "psr-4":
    {
        "Core\\" : "Core/",
        "App\\" : "App/"
    }
}
```

## Inicio rapido

#### Estructura general

La ruta URL de la aplicación se traduce directamente a los controladores y sus métodos dentro de la `App/Controllers`.

`example.com` hará lo que dice el método `index()` en `App/Controller/Home.php` (metodo predeterminado).

`example.com/home` hará lo que dice el método `index()` en `App/Controller/Home.php`.

`example.com/home/example` hará lo que dice el método `example()` en `App/Controller/Home.php`.

`example.com/home/examplewithargs/1` hará lo que dice el método `exampleWithArgs()` en `App/Controller/Home.php` y le pasará 1 como parámetro.

#### Mostrando una vista

Veamos el método `example()` en el controlador `Home` (`App/Controller/Home.php`). Esto simplemente muestra el encabezado, el pie y la página `example.php` (`App/Views/home/example.php`).

```php
public function exampleOne()
{
    $views = ['home/example'];
    $args  = ['title' => 'Home | Example'];
    View::render($views, $args);
}
```  

#### Mostrando un json


```php
public function exampleOne()
{
    $data  = ['title' => 'Home | Example'];
    View::renderJson($data);
}
```  

#### Trabajando con datos

Veamos un ejemplo similar a exampleOne, pero aquí también solicitamos datos. De nuevo, todo es extremadamente reducido y simple: `$exampleModel->getAll()` simplemente llama al método `getAll()` en `App/Model/ExampleModel.php`.

```php
namespace App\Model

use Core\Model;

class ExampleModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT id, full_name FROM table";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
```

```php
namespace App\Controller

use App\Model\ExampleModel;

class Home
{
    public function exampleOne()
    {
        $exampleModel = new ExampleModel();
        $views = ['home/example'];
        $args  = [
            'title' => 'Home | Example',
            'rows' => $exampleModel->getAll()
        ];
        View::render($views, $args);
    }
}
```

El resultado, aquí `$rows`, se puede usar fácilmente dentro de las vistas en `App/Views`:

```php
<tbody>
<?php foreach ($rows as $row): ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->full_name ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
```

## Otras cosas

Este proyecto esta inspirado en [MINI3](https://github.com/panique/mini3) :)

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Esto significa que puede usarlo y modificarlo de forma gratuita en proyectos privados o comerciales.