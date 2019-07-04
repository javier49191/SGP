# Sistema de Gestión y Seguimiento de Padrinos SGP
Repositorio del TFP

Este es el repositorio para acceder al código de la aplicación y las instrucciones de cómo hacer una copia.

## Opción 1 🚀

_Para acceder a una *demo* online click [aqui](https://tfgsgp.000webhostapp.com/ "aqui")_

Si se desea hacer una copia de forma local, ir a la opción 2


### Opción 2 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

1. Descargar laragon (Full 130 MB) desde [aqui](https://laragon.org/download/ "aqui")  
Instalarlo y una vez finalizada la instalación, ejecutar el programa y hacer clck en la opción "Start all"  
![Con titulo](images/start_all.png "Start all")

2. Seleccionar la opción "Terminal" del programa y explorar el directorio c:\laragon\www 
Después ejecutar el siguiente comando:
git clone https://github.com/javier49191/SGP  

![Con titulo](images/terminal.png "Terminal")  
![Con titulo](images/git_clone.png "Git clone")  

3. Luego ejecutar los siguientes comandos:  
cd SGP  
composer install  

4. Renombrar el acthivo "env.example" a ".env" y proveer la información de acceso a la base de datos (por defecto es root y sin contraseña)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sgp
DB_USERNAME=_usuario de la base de datos_
DB_PASSWORD=_Contraseña de la base de datos_

5. Luego ejecutar en terminal el siguiente comando:  
php artisan key:generate  
![Con titulo](images/key_generate.png "Key Genenrate")  

6. Ir al administrador de base de datos y crear una nueva base de datos con el nombre "sgp"

7. Ejecutar el siguiente comando en terminal
php artisan migrate --seed  

![Con titulo](images/db_seed.png "Database")  

8. Acceder a la aplicación utilizando la dirección http://sgp.test en cualquier explorador de internet  
![Con titulo](images/login.png "Login")  

9. Los usuarios para ingresar son:  
_secretaria@secretaria.com_
_secretaria123_

_encargado@encargado.com_
_encargado123_


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

```
Da un ejemplo
```

### Instalación 🔧

_Una serie de ejemplos paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutandose_

_Dí cómo será ese paso_

```
Da un ejemplo
```

_Y repite_

```
hasta finalizar
```

_Finaliza con un ejemplo de cómo obtener datos del sistema o como usarlos para una pequeña demo_

## Ejecutando las pruebas ⚙️

_Explica como ejecutar las pruebas automatizadas para este sistema_

### Analice las pruebas end-to-end 🔩

_Explica que verifican estas pruebas y por qué_

```
Da un ejemplo
```

### Y las pruebas de estilo de codificación ⌨️

_Explica que verifican estas pruebas y por qué_

```
Da un ejemplo
```

## Deployment 📦

_Agrega notas adicionales sobre como hacer deploy_

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - El framework web usado
* [Maven](https://maven.apache.org/) - Manejador de dependencias
* [ROME](https://rometools.github.io/rome/) - Usado para generar RSS

## Contribuyendo 🖇️

Por favor lee el [CONTRIBUTING.md](https://gist.github.com/villanuevand/xxxxxx) para detalles de nuestro código de conducta, y el proceso para enviarnos pull requests.

## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/tu/proyecto/wiki)

## Versionado 📌

Usamos [SemVer](http://semver.org/) para el versionado. Para todas las versiones disponibles, mira los [tags en este repositorio](https://github.com/tu/proyecto/tags).

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Andrés Villanueva** - *Trabajo Inicial* - [villanuevand](https://github.com/villanuevand)
* **Fulanito Detal** - *Documentación* - [fulanitodetal](#fulanito-de-tal)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 a alguien del equipo. 
* Da las gracias públicamente 🤓.
* etc.



---
⌨️ con ❤️ por [Villanuevand](https://github.com/Villanuevand) 😊

