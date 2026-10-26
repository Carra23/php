<form id="principal" action="index.php" method="post">
    <label for="tipo">Selecciona el tipo de vivienda</label>
    <select name="tipo" id="tipo" form="principal">
        <option value="alquiler">Alquiler</option>
        <option value="compra">Casa comprada</option>
        <option value="propia">Casa propia construida</option>
    </select>
    <button type="submit" name="enviar" id="enviar" >Enviar</button>
</form>


<?php
    require_once ('./Clases/ViviendaAlquiler.php');

    if(isset($_POST["enviar"])){
        $_SESSION["viviendas"] = [];
        switch ($_POST['tipo']) {
            case 'alquiler':
                    echo "<form id='valalquiler' action='index.php' method='post'>
                            <label for='renta'>Renta mensual: </label>
                            <input type='number' name='renta' id='renta' min='300' max='2500' placeholder='Entre 300 y 2500' required style='width: 130px;'><br>
                            <label for='subida'>Subida anual: </label>
                            <input type='number' name='subida' id='subida' min='0' max='5' placeholder='Entre 0 y 5' required style='width: 100px;'><br>
                            <label for='plazo'>Plazo: </label>
                            <input type='number' name='plazo' id='plazo' min='1' max='30' placeholder='Entre 1 y 30' required style='width: 100px;'><br>
                            <label for='superficieal'>Superficie: </label>
                            <input type='number' name='superficieal' id='superficieal' min='40' max='400' placeholder='Entre 4 y 400m2' required style='width: 120px;'><br>
                            <button type='submit' name='envalquiler' id='envalquiler'>Enviar</button>
                        </form>";
                break;
            
            case 'compra':
                echo "<form id='valcompra' action='index.php' method='post'>
                            <label for='precio'>Precio vivienda: </label>
                            <input type='number' name='precio' id='precio' min='5000' max='800000' placeholder='Entre 5.000 y 800.000' required style='width: 160px;'><br>
                            <label for='entrada'>Porcentaje entrada: </label>
                            <input type='number' name='entrada' id='entrada' min='10' max='50' placeholder='Entre 10% y 50%' required style='width: 130px;'><br>
                            <label for='interes'>Interes anual: </label>
                            <input type='number' name='interes' id='interes' min='0.5' max='8' placeholder='Entre 0.5% y 8%' required style='width: 130px;'><br>
                            <label for='plazo'>Plazo: </label>
                            <input type='number' name='plazo' id='plazo' min='5' max='30' placeholder='Entre 5 y 30 años' required style='width: 130px;'><br>
                            <label for='superficiecom'>Superficie: </label>
                            <input type='number' name='superficiecom' id='superficiecom' min='40' max='400' placeholder='Entre 4 y 400m2' required style='width: 120px;'><br>
                            <button type='submit' name='envcompra' id='envcompra'>Enviar</button>
                        </form>";
                break;
            
            case 'propia':
                echo "<form id='valpropia' action='index.php' method='post'>
                            <label for='preciopro'>Precio suelo: </label>
                            <input type='number' name='preciopro' id='preciopro' min='20000' max='300000' placeholder='Entre 20.000 y 800.000' required style='width: 170px;'><br>
                            <label for='coste'>Coste construccion: </label>
                            <input type='number' name='coste' id='coste' min='600' max='1500' placeholder='Entre 600 y 1500€/m2' required style='width: 130px;'><br>
                            <label for='licencias'>Honorarios y licencias: </label>
                            <input type='number' name='licencias' id='licencias' min='5' max='20' placeholder='Entre 5% y 20%' required style='width: 130px;'><br>
                            <label for='entradapro'>Porcentaje entrada: </label>
                            <input type='number' name='entradapro' id='entradapro' min='10' max='50' placeholder='Entre 10% y 50%' required style='width: 130px;'><br>
                            <label for='interespro'>Interes anual: </label>
                            <input type='number' name='interespro' id='interespro' min='0.5' max='8' placeholder='Entre 0.5% y 8%' required style='width: 130px;'><br>
                            <label for='plazopro'>Plazo: </label>
                            <input type='number' name='plazopro' id='plazopro' min='5' max='30' placeholder='Entre 5 y 30 años' required style='width: 130px;'><br>
                            <label for='superficiepro'>Superficie: </label>
                            <input type='number' name='superficiepro' id='superficiepro' min='40' max='400' placeholder='Entre 4 y 400m2' required style='width: 120px;'><br>
                            <button type='submit' name='envpropia' id='envalquiler'>Enviar</button>
                        </form>";
                break;
        }

    }

    if(isset($_POST["envalquiler"])){
        echo $_POST["renta"] . "<br>";
        echo $_POST["subida"] . "<br>";
        echo $_POST["plazo"] . "<br>";
        echo $_POST["superficieal"] . "<br>";

        $vivienda = new ViviendaAlquiler(1, $_POST["renta"], $_POST["subida"], $_POST["plazo"], $_POST["superficieal"]);
        echo $vivienda->calcularCoste();
        echo "<br>";
        $vivienda->insertar_vivienda($vivienda);
        print_r($_SESSION['viviendas']);
    }
    
    if(isset($_POST["envcompra"])){
        echo $_POST["precio"] . "<br>";
        echo $_POST["entrada"] . "<br>";
        echo $_POST["interes"] . "<br>";
        echo $_POST["plazo"] . "<br>";
        echo $_POST["superficiecom"] . "<br>";
    }

    if(isset($_POST["envpropia"])){
        echo $_POST["preciopro"] . "<br>";
        echo $_POST["coste"] . "<br>";
        echo $_POST["licencias"] . "<br>";
        echo $_POST["entradapro"] . "<br>";
        echo $_POST["interespro"] . "<br>";
        echo $_POST["plazopro"] . "<br>";
        echo $_POST["superficiepro"] . "<br>";
    }
?>