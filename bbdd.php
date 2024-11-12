<?php
function connect_database()
    {
        $mysqli = new mysqli("127.0.0.1", "root", "", "chuli");
        if($mysqli -> connect_errno)
        {
            echo "Fallo en la conexión: ".$mysqli->connect_errno;
        }
        return $mysqli;
    }


    function get_noticia()
    {
        $mysqli = connect_database();

        $sql = "SELECT * FROM noticia";

        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecucion: ".$mysqli->errno;
        }
        
        $noticia = array();

        $id_noticia = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $fecha = "";
        $resumen = "";
        $vincular = $sentencia->bind_result($id_noticia, $titulo, $descripcion, $imagen, $fecha, $resumen);
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }
        while($sentencia->fetch())
        {
            $categoria = array('id_noticia' => $id_noticia, 'titulo' => $titulo, 'descripcion' => $descripcion , 'imagen' => $imagen , 'fecha' => $fecha, 'resumen' => $resumen);
            $noticia[] = $categoria;
        }
        $mysqli->close();
        return $noticia;
    }

    function get_noticias_id($titulo)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT * FROM noticia WHERE titulo like ?";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("s", $titulo);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
    
        $noticia = array();
    
        $id_noticia = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $fecha = "";
        $resumen = "";
        $vincular = $sentencia->bind_result($id_noticia, $titulo, $descripcion, $imagen , $fecha, $resumen); ;
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }

        while($sentencia->fetch())
        {
            $categoria = array('id_noticia' => $id_noticia, 'titulo' => $titulo, 'descripcion' => $descripcion , 'imagen' => $imagen , 'fecha' => $fecha, 'resumen' => $resumen);
            $noticia[] = $categoria;
        }
        $mysqli->close();
        return $noticia;
    }

    function get_noticia_id($id_noticia)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT * FROM noticia WHERE id_noticia = ?";
    var_dump($sql);
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("i", $id_noticia);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
    
        $noticia = array();
    
        $id_noticia = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $fecha = "";
        $resumen = "";
        $vincular = $sentencia->bind_result($id_noticia, $titulo, $descripcion, $imagen , $fecha, $resumen); ;
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }
        while($sentencia->fetch())
        {
            $categoria = array('id_noticia' => $id_noticia, 'titulo' => $titulo, 'descripcion' => $descripcion , 'imagen' => $imagen , 'fecha' => $fecha, 'resumen' => $resumen);
            $noticia[] = $categoria;
        }
        $mysqli->close();
        return $noticia;
    }

    
    function insertar_noticia($titulo, $descripcion, $imagen, $fecha, $resumen)
    {
        $mysqli = connect_database();

        $sql = "INSERT INTO noticia (titulo, descripcion, imagen, fecha, resumen) VALUES (?, ?, ?, ?, ?)";

        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("sssss", $titulo, $descripcion, $imagen, $fecha, $resumen);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
        $id_insertado = $mysqli->insert_id;
        $mysqli->close();
        return $id_insertado;
    }

    function crear_categoria($id_noticia, $id_categoria)
    {
        $mysqli = connect_database();

        $sql = "INSERT INTO noticia_categoria (id_noticia, id_categoria) VALUES (?, ?)";

        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ii", $id_noticia, $id_categoria);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $mysqli->close();
    }
    function insertar_integrante($nombre, $instrumento, $fecha_nacimiento, $ciudad)
    {
        $mysqli = connect_database();

        $sql = "INSERT INTO integrantes (nombre, instrumento, fecha_nacimiento, ciudad) VALUES (?, ?, ?, ?)";

        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ssss", $nombre, $instrumento, $fecha_nacimiento, $ciudad);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $mysqli->close();
    }
    
    function get_integrante()
    {
        $mysqli = connect_database();

        $sql = "SELECT * FROM integrantes ORDER BY fecha_nacimiento DESC";
        
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecucion: ".$mysqli->errno;
        }
        
        $integrante = array();

        $id_integrante = -1;
        $nombre = "";
        $instrumento = "";
        $fecha_nacimiento = "";
        $ciudad = "";
        $vincular = $sentencia->bind_result($id_integrante, $nombre, $instrumento, $fecha_nacimiento, $ciudad);
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }
        while($sentencia->fetch())
        {
            $categoria = array('id_integrante' => $id_integrante, 'nombre' => $nombre, 'instrumento' => $instrumento , 'fecha_nacimiento' => $fecha_nacimiento , 'ciudad' => $ciudad);
            $integrante[] = $categoria;
        }
        $mysqli->close();
        return $integrante;
    }
    function get_categoria()
{
    $mysqli = connect_database();

    $sql = "SELECT * FROM categoria";

    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
        echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
        echo "Fallo en la ejecucion: ".$mysqli->errno;
    }
    
    $categoria = array();

    $id_categoria = -1;
    $nombre = "";
    $vincular = $sentencia->bind_result($id_categoria, $nombre);
    if(!$vincular)
    {
        echo "Fallo al vincular la sentencia: ".$mysqli->errno;
    }
    while($sentencia->fetch())
    {
        $categoria[] = array('id_categoria' => $id_categoria, 'nombre' => $nombre); // Cambiado $categoria a [] para agregar todas las categorías
    }
    $mysqli->close();
    return $categoria;
}
    function get_noticia_categoria($id_categoria)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT * FROM noticia_categoria WHERE id_categoria = ?";
    
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("i", $id_categoria);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
    
        $noticia_categoria = array();
    
        $id_noticia = -1;
        $id_categoria = -1;
        $vincular = $sentencia->bind_result($id_noticia, $id_categoria);
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }
        while($sentencia->fetch())
        {
            $categoria = array('id_noticia' => $id_noticia, 'id_categoria' => $id_categoria);
            $noticia_categoria[] = $categoria;
        }
        $mysqli->close();
        return $noticia_categoria;
    }
    
    function get_nombre_categoria($id_categoria)
    {
        $mysqli = connect_database();

        $sql = "SELECT nombre FROM categoria WHERE id_categoria = ?";

        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("i", $id_categoria);
        if(!$asignar)
        {
            echo "Fallo en la asignación: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $nombre = "";
        $vincular = $sentencia->bind_result($nombre);
        if(!$vincular)
        {
            echo "Fallo al vincular la sentencia: ".$mysqli->errno;
        }
        $sentencia->fetch();
        $mysqli->close();
        return $nombre;
    }
   
    function get_fecha($idCategoria)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT DISTINCT fecha FROM noticia INNER JOIN noticia_categoria ON noticia.id_noticia = noticia_categoria.id_noticia WHERE noticia_categoria.id_categoria = ?";
    
        $sentencia = $mysqli->prepare($sql);
        if (!$sentencia) {
            echo "Fallo en la preparación de la sentencia: " . $mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("i", $idCategoria);
        if (!$asignar) {
            echo "Fallo en la asignación: " . $mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if (!$ejecucion) {
            echo "Fallo en la ejecución: " . $mysqli->errno;
        }
    
        $fechas = array();
    
        $fecha = "";
        $sentencia->bind_result($fecha);
        while ($sentencia->fetch()) {
            $fechas[] = $fecha;
        }
    
        $sentencia->close();
        $mysqli->close();
    
        return json_encode($fechas); // Devolver las fechas como JSON
    }

    //funcion para obtener el titulo de la noticia que esten relacionadas con la categoria y fecha seleccionada
    function get_noticia_fecha($idCategoria, $fecha)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT titulo FROM noticia INNER JOIN noticia_categoria ON noticia.id_noticia = noticia_categoria.id_noticia WHERE noticia_categoria.id_categoria = ? AND fecha = ?";
    
        $sentencia = $mysqli->prepare($sql);
        if (!$sentencia) {
            echo "Fallo en la preparación de la sentencia: " . $mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("is", $idCategoria, $fecha);
        if (!$asignar) {
            echo "Fallo en la asignación: " . $mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if (!$ejecucion) {
            echo "Fallo en la ejecución: " . $mysqli->errno;
        }
    
        $titulos = array();
    
        $titulo = "";
        $sentencia->bind_result($titulo);
        while ($sentencia->fetch()) {
            $titulos[] = $titulo;
        }
    
        $sentencia->close();
        $mysqli->close();
    
        return json_encode($titulos); // Devolver los títulos como JSON
    }
    
    
    function login($Nombre, $contraseña)
    {
        $mysqli = connect_database();

        $sql = "SELECT id_usuario FROM usuario WHERE Nombre = ? 
            AND contraseña = ?";
            
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ss", $Nombre, $contraseña);
        if(!$asignar)
        {
            echo "Fallo en la asignación ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución ".$mysqli->errno;
        }

        $usuario = -1;
        $vincular = $sentencia->bind_result($usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros ".$mysqli->errno;
        }

        $result = false;
        if($sentencia->fetch())
        {
            $result = $usuario;
        }

        $mysqli->close();
        return $result;  
    }

    function registro($user, $password) {
        // Conectar a la base de datos
        $mysqli = connect_database();
    
        // Preparar la sentencia SQL
        $sql = "INSERT INTO usuario (Nombre, contraseña) VALUES (?, ?)";
        $sentencia = $mysqli->prepare($sql);
    
        // Asignar los valores a los marcadores de posición
        $sentencia->bind_param("ss", $user, $password);
    
        // Ejecutar la sentencia
        $sentencia->execute();
    
        // Obtener el ID insertado
        $id_insertado = $mysqli->insert_id;
    
        // Cerrar la conexión
        $mysqli->close();
    
        return $id_insertado;
    }
    //FUNCION PARA COMPROBAR SI EL USUARIO EXISTE EN LA BASE DE DATOS 
    function comprobar_usuario($Nombre) {
        $mysqli = connect_database();
    
        $sql = "SELECT id_usuario FROM usuario WHERE Nombre = ?";
        $sentencia = $mysqli->prepare($sql);
        $sentencia->bind_param("s", $Nombre);
        $sentencia->execute();
        $sentencia->store_result();
        $usuario_existente = $sentencia->num_rows > 0;
        
        $sentencia->close();
        $mysqli->close();
    var_dump($usuario_existente);
        return $usuario_existente;
    }
    
    