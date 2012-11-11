Para desarrollo en Windows + XAMPP + NetBeans + GitHub:

1. Ingresar desde un navegador Web a http://localhost/phpmyadmin/
2. Crear nueva base de datos llamada `cas-stage` con cotejamiento
   'utf8-spanish-ci'
3. Importar, en el siguiente orden, estos archivos a la base de datos
   `cas-stage`:
	a. developement/cas-stage.sql
	b. developement/data.sql
	c. developement/user.sql
4. Ejecutar el script developement/xampp.cmd para generar el enlace simbólico a la carpeta
   asociada a GitHub en XAMPP
5. Importar el proyecto en NetBeans desde la carpeta 'Documents\GitHub\cas-stage-2.0'