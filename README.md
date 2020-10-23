# MANUAL DE INSTALACIÓN PRUEBA_PHP_TREDA_SOLUTIONS

A continuación, se muestra el paso a paso de la instalación y configuración para ejecutar el proyecto.
1.	Se descarga XAMPP el cual es una distribución de Apache que incluye MariaDB y PHP, lo cual evita instalarlos por separado.

Link: https://www.apachefriends.org/es/download.html

2.	 Se ejecuta el instalador que se descarga en el paso anterior, al ejecutarlo solo es necesario darle en la opción “siguiente” hasta que el proceso finalice.

3.	Al finalizar la instalación diríjase a la siguiente ruta: C:\xampp\htdocs.

4.	En el directorio nombrado en el paso anterior cree una carpeta con el nombre PRUEBA_PHP_TREDA_SOLUTIONS.

5.	Descargue el repositorio como zip.

6.	Dentro del comprimido encontrara la carpeta principal del repositorio con el nombre PRUEBA_PHP_TREDA_SOLUTIONS-main, descomprima el contenido de esta en la carpeta creada en el paso 4.

7.	Ahora ejecute XAMPP, le abrirá una ventana donde tendrá de oprimir el botón start  al item Apache y MySQL, estos deben quedar de color verde lo que indica que los servidores se encuentran corriendo correctamente.

8.	Abra su navegador e ingrese a http://localhost/phpmyadmin/, esto le desplegara el gestor phpMyAdmin de MySQL, donde se importará la base de datos la cual se encuentra dentro de los archivos descomprimidos del paso 6, específicamente en la carpeta llamada Base de datos, allí está el archivo prueba_treda.sql.

9.	En el gestor phpMyAdmin en la parte izquierda se listan las bases de datos creadas, se procede a crear una nueva con el nombre prueba_treda, no le agregue tablas a la base de datos ya que se importarán desde el archivo sql mencionado en el paso anterior. 

10.	Oprima el botón importar que se encuentra en la parte superior, donde le desplegará la ventana para importar la base de datos donde se encuentra el botón Seleccionar archivo, presione este botón y elija el archivo sql mencionado en el paso 8, luego en la parte inferior presione el botón continuar.

11.	Ahora ingrese al proyecto mediante la siguiente url en su navegador http://localhost/PRUEBA_PHP_TREDA_SOLUTIONS

12.	Ya que se está usando CodeIgniter como framework, este no necesita instalación por lo que con los pasos anteriores es suficiente para que el proyecto funcione.

