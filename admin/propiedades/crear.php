<?php 

    require '../../includes/funciones.php';
    incluirTemplate('header'); 

?>    <main class="contenedor seccion">
        <h1> Crear</h1>
        <a href="../admin" class="boton boton-verde">Nueva propiedad</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" placeholder="titulo propiedad">

                <label for="precio">precio</label>
                <input type="number" id="precio" placeholder="precio propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">descripcion</label>
                <textarea name="" id="descripcion" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>informacion de la propiedad</legend>

                <label for="habitaciones">habitaciones</label>
                <input type="number" id="habitaciones" placeholder="habitaciones propiedad" min="1" max="9">

                <label for="baños">baños</label>
                <input type="number" id="baños" placeholder="baños propiedad" min="1" max="9">
                
                <label for="estacionamientos">estacionamientos</label>
                <input type="number" id="estacionamientos" placeholder="estacionamientos propiedad" min="1" max="9">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select value="1">Juan</select>
                <select value="2">Karen</select>

            </fieldset>

            <input type="submit" value="crear propiedad">   
        </form>

    </main>

    <?php 
    
        incluirTemplate('footer'); 

    ?>