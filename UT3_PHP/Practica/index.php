<form id="principal" method="post">
    <label for="tipo">Selecciona el tipo de vivienda</label>
    <select name="tipo" id="tipo" form="principal">
        <option value="alquiler">Alquiler</option>
        <option value="compra">Casa comprada</option>
        <option value="propia">Casa propia construida</option>
        <option value="tienda">Tienda de campaña</option>
    </select>
    <br>
    <button type="submit" name="enviar" id="enviar">Enviar</button>

    <button type="submit" name="borrar" id="borrar">Borrar 1º</button>
    <button type="submit" name="imprimir" id="imprimir">Imprimir</button>
    <input type="checkbox" name="orden" id="orden"/>
    <label for="orden">Orden Coste Total</label>
</form>


<?php    
    require_once ('./Clases/ViviendaAlquiler.php');
    require_once ('./Clases/ViviendaCompra.php');
    require_once ('./Clases/ViviendaPropia.php');
    require_once ('./Clases/ColeccionViviendas.php');
    session_start();

    $coleccion = new ColeccionViviendas();
    if(!isset($_SESSION['viviendas']) && !isset($_SESSION['contador'])){
        $_SESSION["contador"] = 1;
    }

    if(isset($_POST["enviar"])){
        switch ($_POST['tipo']) {
            case 'alquiler':
                    echo "<form id='valalquiler' method='post'>
                            <label for='renta'>Renta mensual: </label>
                            <input type='number' name='renta' id='renta' placeholder='Entre 300 y 2500'  style='width: 130px;'><br>
                            <label for='subida'>Subida anual: </label>
                            <input type='number' name='subida' id='subida' placeholder='Entre 0 y 5%'  style='width: 100px;'><br>
                            <label for='plazo'>Plazo: </label>
                            <input type='number' name='plazo' id='plazo' placeholder='Entre 1 y 30'  style='width: 100px;'><br>
                            <label for='superficieal'>Superficie: </label>
                            <input type='number' name='superficieal' id='superficieal' placeholder='Entre 4 y 400m2'  style='width: 120px;'><br>
                            <button type='submit' name='envalquiler' id='envalquiler'>Añadir</button>
                        </form>";
                break;
            
            case 'compra':
                echo "<form id='valcompra' method='post'>
                            <label for='precio'>Precio vivienda: </label>
                            <input type='number' name='precio' id='precio' placeholder='Entre 5.000 y 800.000'  style='width: 160px;'><br>
                            <label for='entrada'>Porcentaje entrada: </label>
                            <input type='number' name='entrada' id='entrada' placeholder='Entre 10% y 50%'  style='width: 130px;'><br>
                            <label for='interes'>Interes anual: </label>
                            <input type='number' name='interes' id='interes' placeholder='Entre 0.5% y 8%'  style='width: 130px;'><br>
                            <label for='plazo'>Plazo: </label>
                            <input type='number' name='plazo' id='plazo' placeholder='Entre 5 y 30 años'  style='width: 130px;'><br>
                            <label for='superficiecom'>Superficie: </label>
                            <input type='number' name='superficiecom' id='superficiecom' placeholder='Entre 4 y 400m2'  style='width: 120px;'><br>
                            <button type='submit' name='envcompra' id='envcompra'>Añadir</button>
                        </form>";
                break;
            
            case 'propia':
                echo "<form id='valpropia' method='post'>
                            <label for='preciopro'>Precio suelo: </label>
                            <input type='number' name='preciopro' id='preciopro' placeholder='Entre 20.000 y 800.000'  style='width: 170px;'><br>
                            <label for='coste'>Coste construccion: </label>
                            <input type='number' name='coste' id='coste' placeholder='Entre 600 y 1500€/m2'  style='width: 130px;'><br>
                            <label for='licencias'>Honorarios y licencias: </label>
                            <input type='number' name='licencias' id='licencias' placeholder='Entre 5% y 20%'  style='width: 130px;'><br>
                            <label for='entradapro'>Porcentaje entrada: </label>
                            <input type='number' name='entradapro' id='entradapro' placeholder='Entre 10% y 50%'  style='width: 130px;'><br>
                            <label for='interespro'>Interes anual: </label>
                            <input type='number' name='interespro' id='interespro' placeholder='Entre 0.5% y 8%'  style='width: 130px;'><br>
                            <label for='plazopro'>Plazo: </label>
                            <input type='number' name='plazopro' id='plazopro' placeholder='Entre 5 y 30 años'  style='width: 130px;'><br>
                            <label for='superficiepro'>Superficie: </label>
                            <input type='number' name='superficiepro' id='superficiepro' placeholder='Entre 4 y 400m2'  style='width: 120px;'><br>
                            <button type='submit' name='envpropia' id='envalquiler'>Añadir</button>
                        </form>";
                break;
            case 'tienda':
                echo "<h1>Estas en la Puerta del Sol :) </h1>";
                echo "<h2>Coste total: 0€</h2><h3>Acciones de Quechua</h3>";
                echo "<img src='stonks.webp' alt='stonks de quechua' width='300' height='200'>";
                break;
        }

    }

    if(isset($_POST["envalquiler"])){
        if(($_POST["renta"] >= 300 && $_POST["renta"] <= 2500) && ($_POST["subida"] >= 0 && $_POST["subida"] <= 5) && ($_POST["plazo"] >= 1 && $_POST["plazo"] <= 30) && ($_POST["superficieal"] >= 40 && $_POST["superficieal"] <= 400)){
            $vivienda = new ViviendaAlquiler($_POST["renta"], $_POST["subida"], $_POST["plazo"], $_POST["superficieal"]);
            $vivienda->calcularCoste();
            $coleccion->insertar_vivienda($vivienda);
            $coleccion->imprimirTabla($_SESSION['viviendas']->getArray());
        }else{
            echo "<form id='valalquiler' method='post'>
                        <label for='renta'>Renta mensual: </label>
                        <input type='number' name='renta' id='renta' placeholder='Entre 300 y 2500'  style='width: 130px;' value= " . $_POST['renta'] . "><br>
                        <label for='subida'>Subida anual: </label>
                        <input type='number' name='subida' id='subida' placeholder='Entre 0 y 5%'  style='width: 100px;' value= " . $_POST['subida'] . "><br>
                        <label for='plazo'>Plazo: </label>
                        <input type='number' name='plazo' id='plazo' placeholder='Entre 1 y 30'  style='width: 100px;' value= " . $_POST['plazo'] . "><br>
                        <label for='superficieal'>Superficie: </label>
                        <input type='number' name='superficieal' id='superficieal' placeholder='Entre 4 y 400m2'  style='width: 120px;' value= " . $_POST['superficieal'] . "><br>
                        <button type='submit' name='envalquiler' id='envalquiler'>Añadir</button>
                </form>";
            echo "<h1>Introduce los valores dentro del rango correcto</h1>";
        }
    }
    
    if(isset($_POST["envcompra"])){
        if(($_POST["precio"] >= 20000 && $_POST["precio"] <= 30000) && ($_POST["entrada"] >= 10 && $_POST["entrada"] <= 50) && ($_POST["interes"] >= 0.5 && $_POST["interes"] <= 8) && ($_POST["plazo"] >= 5 && $_POST["plazo"] <= 30) && ($_POST["superficiecom"] >= 40 && $_POST["superficiecom"] <= 400)){
            $viviendacom = new ViviendaCompra($_POST["precio"], $_POST["entrada"], $_POST["interes"], $_POST["plazo"], $_POST["superficiecom"]);
            $viviendacom->calcularCoste();
            $coleccion->insertar_vivienda($viviendacom);
            $coleccion->imprimirTabla($_SESSION['viviendas']->getArray());
        }else{
            echo "<form id='valcompra' method='post'>
                    <label for='precio'>Precio vivienda: </label>
                    <input type='number' name='precio' id='precio' placeholder='Entre 5.000 y 800.000'  style='width: 160px;' value= " . $_POST['precio'] . "><br>
                    <label for='entrada'>Porcentaje entrada: </label>
                    <input type='number' name='entrada' id='entrada' placeholder='Entre 10% y 50%'  style='width: 130px;' value= " . $_POST['entrada'] . "><br>
                    <label for='interes'>Interes anual: </label>
                    <input type='number' name='interes' id='interes' placeholder='Entre 0.5% y 8%'  style='width: 130px;' value= " . $_POST['interes'] . "><br>
                    <label for='plazo'>Plazo: </label>
                    <input type='number' name='plazo' id='plazo' placeholder='Entre 5 y 30 años'  style='width: 130px;' value= " . $_POST['plazo'] . "><br>
                    <label for='superficiecom'>Superficie: </label>
                    <input type='number' name='superficiecom' id='superficiecom' placeholder='Entre 4 y 400m2'  style='width: 120px;' value= " . $_POST['superficiecom'] . "><br>
                    <button type='submit' name='envcompra' id='envcompra'>Añadir</button>
                </form>";
            echo "<h1>Introduce los valores dentro del rango correcto";
        }
    }

    if(isset($_POST["envpropia"])){
        if(($_POST["preciopro"] >= 20000 && $_POST["preciopro"] <= 30000) && ($_POST["coste"] >= 600 && $_POST["coste"] <= 1500) && ($_POST["licencias"] >= 5 && $_POST["licencias"] <= 20) && ($_POST["entradapro"] >= 10 && $_POST["entradapro"] <= 50) && ($_POST["interespro"] >= 0.5 && $_POST["interespro"] <= 8) && ($_POST["plazopro"] >= 5 && $_POST["plazopro"] <= 30) && ($_POST["superficiepro"] >= 40 && $_POST["superficieal"] <= 400)){
            $viviendapro = new ViviendaPropia($_POST["preciopro"], $_POST["coste"], $_POST["licencias"], $_POST["entradapro"], $_POST["interespro"], $_POST["plazopro"], $_POST["superficiepro"]);
            $viviendapro->calcularCoste();
            $coleccion->insertar_vivienda($viviendapro);
            $coleccion->imprimirTabla($_SESSION['viviendas']->getArray());
        }else{
            echo "<form id='valpropia' method='post'>
                    <label for='preciopro'>Precio suelo: </label>
                    <input type='number' name='preciopro' id='preciopro' placeholder='Entre 20.000 y 800.000'  style='width: 170px;' value= " . $_POST['preciopro'] . "><br>
                    <label for='coste'>Coste construccion: </label>
                    <input type='number' name='coste' id='coste' placeholder='Entre 600 y 1500€/m2'  style='width: 130px;' value= " . $_POST['coste'] . "><br>
                    <label for='licencias'>Honorarios y licencias: </label>
                    <input type='number' name='licencias' id='licencias' placeholder='Entre 5% y 20%'  style='width: 130px;' value= " . $_POST['licencias'] . "><br>
                    <label for='entradapro'>Porcentaje entrada: </label>
                    <input type='number' name='entradapro' id='entradapro' placeholder='Entre 10% y 50%'  style='width: 130px;' value= " . $_POST['entradapro'] . "><br>
                    <label for='interespro'>Interes anual: </label>
                    <input type='number' name='interespro' id='interespro' placeholder='Entre 0.5% y 8%'  style='width: 130px;' value= " . $_POST['interespro'] . "><br>
                    <label for='plazopro'>Plazo: </label>
                    <input type='number' name='plazopro' id='plazopro' placeholder='Entre 5 y 30 años'  style='width: 130px;' value= " . $_POST['plazopro'] . "><br>
                    <label for='superficiepro'>Superficie: </label>
                    <input type='number' name='superficiepro' id='superficiepro' placeholder='Entre 4 y 400m2'  style='width: 120px;' value= " . $_POST['superficiepro'] . "><br>
                    <button type='submit' name='envpropia' id='envalquiler'>Añadir</button>
                </form>";
            echo "<h1>Introduce los valores dentro del rango correcto";
        }
    }

    if(isset($_POST['imprimir'])){
        if(!isset($_POST['orden'])){
            $coleccion->imprimirTabla($_SESSION['viviendas']->getArray());
        }else{
            $coleccion->imprimirTabla($_SESSION['viviendas']->ordenar_por_coste_total());
        }
    }

    if(isset($_POST["borrar"])){
        echo "<table style='border: 5px solid black; width: 100%; text-align: center;'>";
        $coleccion->eliminar_primera()->imprimirFila();
        echo "</table>";
    }
?>