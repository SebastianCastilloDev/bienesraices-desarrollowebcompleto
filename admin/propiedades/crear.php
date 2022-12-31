<?php 

    //base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    //Arreglo con mensaje de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamientos = '';
    $vendedorId = '';


    //Ejecutar el codigo despues de qye el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamientos = $_POST['estacionamientos'];
        $vendedorId = $_POST['vendedor'];

        if(!$titulo){
            $errores[]="Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[]="El precio es obligatorio";
        }
        if( strlen($descripcion) < 50) {
            $errores[]="El descripcion es obligatorio y mayor a 50 letras";
        }
        if(!$habitaciones) {
            $errores[]="El habitaciones es obligatorio";
        }
        if(!$wc) {
            $errores[]="El wc es obligatorio";
        }
        if(!$estacionamientos) {
            $errores[]="El estacionamientos es obligatorio";
        }
        if(!$vendedorId) {
            $errores[]="El vendedor es obligatorio";
        }

        if (empty($errores)) {
            
            $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ('$titulo', '$precio','$descripcion','$habitaciones','$wc','$estacionamientos','$vendedorId');";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        // exit;

        //Insertar en la base de datos

       $resultado = mysqli_query($db,$query);
       if($resultado){
           echo 'insertado correctamente';
       }
    }


    require '../../includes/funciones.php';
    incluirTemplate('header'); 

?>    <main class="contenedor seccion">
        <h1> Crear</h1>
        <a href="../admin" class="boton boton-verde">Nueva propiedad</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" action="/admin/propiedades/crear.php" class="formulario">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" placeholder="titulo propiedad" name="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">precio</label>
                <input type="number" id="precio" placeholder="precio propiedad" name="precio" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">descripcion</label>
                <textarea id="descripcion" cols="30" rows="10" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>informacion de la propiedad</legend>

                <label for="habitaciones">habitaciones</label>
                <input type="number" id="habitaciones" placeholder="habitaciones propiedad" name="habitaciones" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">baños</label>
                <input type="number" id="wc" placeholder="wc propiedad" min="1" max="9" name="wc" value="<?php echo $wc; ?>">
                
                <label for="estacionamientos">estacionamientos</label>
                <input type="number" id="estacionamientos" placeholder="estacionamientos propiedad" name="estacionamientos" min="1" max="9" value="<?php echo $estacionamientos; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

              <select name="vendedor" id="">
                <option value="">Seleccione un vendedor</option>
                <option value="1">Juan</option>
                <option value="2">Karen</option>
              </select>

            </fieldset>

            <input type="submit" value="crear propiedad" class="boton boton-verde">   
        </form>

    </main>

    <?php 
    
        incluirTemplate('footer'); 

    ?>