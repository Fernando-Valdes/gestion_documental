------------------------------------------------------------------------------------------------------------------------------------
# Sistema para gestion documental version 1.0
Sistema para la gestión documental del Tribunal Administrativo del Poder Judicial del Estado de Chiapas
Desarrollo: L.S.C. José Fernando Valdes Nanduca

------------------------------------------------------------------------------------------------------------------------------------
# Para la implementación del sistema se deben de seguir los siguientes pasos:
------------------------------------------------------------------------------------------------------------------------------------

# 1: Crear la base de datos
    Nombre: gestion_documental
    charset: utf8mb4
    coleccion de datos: utf8mb4_spanish2_ci

# 2: Modificar el archivo conexion.php (Ubicación carpeta config)
    Modificar la variable '$configMysql', según sea el caso de la implementación del sistema;
    $configMysql="Local" (Si se esta trabajando de manera local para hacer pruebas y testeos)
    $configMysql="Production" (Sistema de producción ya implementado en le servidor funcional)
    
    Modificar las credenciales de acceso en la conexión.

# 3: Ejecutar los script de las siguientes tablas (Ubicación carpeta database)
    19_09_2024_createtable.sql*

-Modelos EER
![alt text](anexosREADME/tablas_cuadro_clasificacion_archivistica.png)



