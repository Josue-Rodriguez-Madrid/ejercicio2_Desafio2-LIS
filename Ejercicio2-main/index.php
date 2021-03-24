<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Datos del inventario de la biblioteca</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--[if lt IE 9]>
<script
src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
    <body class='container'>
    <?php
    function __autoload($class_name) {
        include_once("class/" . $class_name . ".class.php");
    }
    if(isset($_POST['enviar'])){
        if(isset($_POST['enviar'])){
            echo "<h3>Libro</h3>";
            $autor = (isset($_POST['autor'])) ? $_POST['autor'] : "";
            $Tlibro = (isset($_POST['Tlibro'])) ? $_POST['Tlibro'] : "";
            $Nedicion = (isset($_POST['Nedicion'])) ? intval($_POST['Nedicion']) : 0;
            $Lpublicacion = (isset($_POST['Lpublicacion'])) ? $_POST['Lpublicacion'] : "";
            $editorial = (isset($_POST['editorial'])) ? $_POST['editorial'] : "";
            $Aedicion = (isset($_POST['Aedicion'])) ? date($_POST['Aedicion']) : "";
            $Npaginas = (isset($_POST['Npaginas'])) ? intval($_POST['Npaginas']) : 0;
            $Notas = (isset($_POST['Notas'])) ? $_POST['Notas'] : "";
            $ISBN = (isset($_POST['ISBN'])) ? intval($_POST['ISBN']) : 0;
            //Creando instancias de la clase empleado
            $libro1 = new libro();
            $libro1->obtenerlibro($autor, $Tlibro, $Nedicion, $Lpublicacion, $editorial, $Aedicion, $Npaginas, $Notas, $ISBN);
        }
    }
    else{
        ?>
        <section class="container">
            <nav class="navbar navbar-dark bg-primary text-white">
                <h1>Formulario</h1>
            </nav>
        <article>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" size="25" maxlength="30" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Tlibro">Titulo del libro:</label>
                <input type="text" name="Tlibro" id="Tlibro" size="25" maxlength="30" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Nedicion">Numero de edicion:</label>
                <input type="text" name="Nedicion" id="Nedicion" size="8" maxlength="2" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Lpublicacion">Lugar de la publicacion</label>
                <input type="text" name="Lpublicacion" id="Lpublicacion" size="4" maxlength="30" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="editorial">Editorial:</label>
                <input type="text" name="editorial" id="editorial" size="4" maxlength="6" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Aedicion">Año de la edicion:</label>
                <input type="text" name="Aedicion" id="Aedicion" size="4" maxlength="6" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Npaginas">Numero de paginas</label>
                <input type="text" name="Npaginas" id="Npaginas" size="4" maxlength="6" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="Notas">Notas:</label>
                <input type="text" name="Notas" id="Notas" size="4" maxlength="13" class="inputField form-control" /><br />
            </div>
            
            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" name="ISBN" id="ISBN" size="4" maxlength="13" class="inputField form-control" /><br />
            </div>
        <input type="submit" name="enviar" class="btn btn-primary mb-2" value="Enviar" class="inputButton" />&nbsp;
        <input type="reset" name="limpiar" class="btn btn-primary mb-2" value="Restablecer" class="inputButton" />
        </fieldset>
    </form>
    <?php
}
?>
</article>
</section>


<!-----------------------------------------------------------     Falta las expresiones regulares ----------------------------------------------------------------->
<?php
            // Arreglos para tener los mensajes controlados:
            $error = array();// este arreglo muestra errores encontrados
            $info = array();// este arreglo almaena toda la informacion que viene del formulario
            // Expresion para nuestro Autor:
            $autor_valido = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
            // Expresion para nuestro Titulo del libro:
            $titulo_valido = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
            // Expresion para nuestra Edición del libro:
            $edicion_valido = "/[0-9]{2}/";
            // Expresion para el lugar de la publicación del libro:
            $publicacion_valido = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
            // Expresion para el lugar de la publicación del libro:
            $editorial_valido = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
            // Expresion solo numeros para año de edición:
            $ano_valido = "/[0-9]{4}/";
            // Expresion solo numeros para número de páginas:
            $paginas_valido = "/[0-9]{3}/";
            // Expresion para las notas:
            $notas_valido = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
            // Expresion para el ISBN:
            $isbn_valida = "/[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{1}/";

            
            if( !empty($_POST) )
            {
                // Verificamos los datos que llegaron del formulario:
                if( isset($_POST['autor']) && isset($_POST['Tlibro']) )
                {
                    // Autor:
                    if( empty($_POST['autor']) )
                        $error[] = "Debes escribir el autor";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si el autor solo tiene letras:
                        if( preg_match($autor_valido, $_POST['autor']) )
                            $info[] = "autor: [".$_POST['autor']."]";
                        else
                            $error[] = "El nombre del autor sólo puede contener letras.";
                    }
                    // titulo:
                    if( empty($_POST['Tlibro']) )
                        $error[] = "Debes escribir el titulo del libro";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si el titulo solo tiene letras:
                        if( preg_match($titulo_valido, $_POST['Tlibro']) )
                            $info[] = "titulo: [".$_POST['Tlibro']."]";
                        else
                            $error[] = "El titulo sólo pueden contener letras.";
                    }
                    // Edicion:
                    if( (isset($_POST['Nedicion']) ) && (!empty($_POST['Nedicion'])) )
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para que solo se ingresen dos numeros del 0 al 9 y 2 letras
                        if( preg_match($edicion_valido, $_POST['Nedicion']) )
                            $info[] ="edicion: [".$_POST['Nedicion']."]";
                        else
                            $error[] = "La edicion solo puede contener 2 numeros.";
                    }
                    // Publicación:
                    if( empty($_POST['Lpublicacion']) )
                        $error[] = "Debes escribir un lugar valido";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si el lugar tiene el formato establecido en la expresion regular:
                        if( preg_match($publicacion_valido, $_POST['Lpublicacion']) )
                            $info[] = "Lugar de Publicación: [".$_POST['Lpublicacion']."]";
                        else
                            $error[] = "Debes escribir un lugar valido.";
                    }
                    // Editorial:
                    if( empty($_POST['editorial']) )
                     $error[] = "Debes escribir una editorial valido";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si la editorial lleva solo letras:
                        if( preg_match($editorial_valido, $_POST['editorial']) )
                            $info[] = "Editorial: [".$_POST['editorial']."]";
                        else
                            $error[] = "Debes escribir una editorial valida.";
                    }

                    // año:
                    if( empty($_POST['Aedicion']) )
                     $error[] = "Debes escribir un año valido";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si el año lleva solo numeros:
                        if( preg_match($ano_valido, $_POST['Aedicion']) )
                            $info[] = "Año de edición: [".$_POST['Aedicion']."]";
                        else
                            $error[] = "Debes escribir un año valido.";
                    }
                
                     // paginas:
                     if( empty($_POST['Npaginas']) )
                     $error[] = "Debes escribir un numero de paginas valido";
                    else
                    {
                        // AQUI USAMOS LA EXPRESION REGULAR: para ver si las paginas lleva solo numeros:
                        if( preg_match( $paginas_valido, $_POST['Npaginas']) )
                            $info[] = "Número de páginas: [".$_POST['Npaginas']."]";
                        else
                            $error[] = "Debes escribir un numero de paginas valido.";
                    }

                    // notas:
                    if( empty($_POST['Notas']) )
                    $error[] = "Debes escribir unas notas valido";
                   else
                   {
                       // AQUI USAMOS LA EXPRESION REGULAR: para ver si las notas lleva solo letras:
                       if( preg_match($notas_valido, $_POST['Notas']) )
                           $info[] = "Notas: [".$_POST['Notas']."]";
                       else
                           $error[] = "Debes escribir notas validas.";
                   }

                   // ISBN:
                   if( empty($_POST['ISBN']) )
                   $error[] = "Debes escribir una isbn valido";
                  else
                  {
                      // AQUI USAMOS LA EXPRESION REGULAR: para ver si el ISBN lleva solo numeros:
                      if( preg_match($isbn_valida, $_POST['ISBN']) )
                          $info[] = "ISBN: [".$_POST['ISBN']."]";
                      else
                          $error[] = "Debes escribir un ISBN valido.";
                  }
                }
            
                else
                {
                    // Mensaje de error si hay campos vacios
                    echo "<legend>Campos vacion o no aceptados</legend>";
                }
                // Si la expresiones regulares NO se cumplen, nos mostrara cuales han sido
                if( count($error) > 0 )
                {
                    echo "<legend>Datos incorrectos:</legend>";
                    // Con este for los mostramos
                    for( $contador=0; $contador < count($error); $contador++ )
                    echo $error[$contador]."<br/>";
                }
                else
                {
                    // Si todos los campos estan correctos se mostrara este mensaje
                    echo "<legend>Todos tus datos son aceptados.</legend>";
                   
                }
            }
            
            
            echo "</br>";
            echo "</br>";
        ?>
</body>
</html>