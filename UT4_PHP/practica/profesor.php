<html>
    <head></head>
    <body>
        <h1>AREA PROFESOR</h1>
        <form id="principal" method="post">
            <label for="accion">Selecciona la acción</label>
            <select name="accion" id="accion" form="principal">
                <option value="cursos">Ver cursos</option>
                <option value="alumnos">Ver alumnos</option>
                <option value="crear">Crear curso</option>
                <option value="asignar">Asignar alumnos</option>
                <option value="eliminar">Eliminar curso</option>
                <option value="calificar">Calificar alumnos</option>
                <option value="modificar">Modificar perfil</option>
            </select>
            <br>
            <button type="submit" name="enviar" id="enviar">Enviar</button>
        </form>
    </body>
</html>

<?php
    require_once("./clases/UserProfe.php");
    require_once("./clases/ModeloCurso.php");
    require_once("./clases/ModeloAlumno.php");
    require_once("./clases/ModeloProfe.php");
    session_start();
    $cursos = new ModeloCurso();
    $alumnos = new ModeloAlumno();
    $modprofe = new ModeloProfe();
    $profesor = $_SESSION['usuario'];

    if(isset($_POST["enviar"])){
        switch ($_POST['accion']) {
            case 'cursos':
                    echo "<table style='border: 5px solid black; width: 100%; text-align: center;'>";
                    echo "<tr><th>ID</th><th>NOMBRE</th><th>DESCRIPCION</th><th>DURACION</th><th>ID PROFESOR</th></tr>";
                    foreach($cursos->getCursos() as $curso){
                        echo "<tr>";
                            echo "<td>" . $curso['id_curso'] . "</td>";
                            echo "<td>" . $curso['nombre_curso'] . "</td>";
                            echo "<td>" . $curso['descripcion'] . "</td>";
                            echo "<td>" . $curso['duracion'] . "</td>";
                            echo "<td>" . $curso['id_profesor'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                break;

            case 'alumnos':
                    echo "<table style='border: 5px solid black; width: 100%; text-align: center;'>";
                    echo "<tr><th>ID</th><th>NOMBRE</th><th>EMAIL</th><th>ID CURSO</th><th>NOTA</th></tr>";
                    foreach($alumnos->getAlumnos() as $alumno){
                        echo "<tr>";
                            echo "<td>" . $alumno['id_alumno'] . "</td>";
                            echo "<td>" . $alumno['nombre'] . "</td>";
                            echo "<td>" . $alumno['email'] . "</td>";
                            echo "<td>" . $alumno['id_curso'] . "</td>";
                            echo "<td>" . $alumno['nota'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                break;
            case 'crear':
                echo "<form id='crear' method='post'>
                        <label for='nombre'>Nombre Curso</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;'><br>
                        <label for='descripcion'>Descripcion</label>
                        <input type='text' name='descripcion' id='descripcion' style='width: 150px;'><br>
                        <label for='duracion'>Duración: </label>
                        <input type='number' name='duracion' id='duracion' style='width: 100px;'><br>
                        <button type='submit' name='envcrear' id='envcrear'>Añadir</button>
                    </form>";

                break;
            case 'asignar':

                break;
            case 'eliminar':
                echo "<form id='eliminar' method='post'>
                        <label for='idcurso'>ID Curso</label>
                        <input type='number' name='idcurso' id='idcurso' style='width: 130px;'><br>
                        <button type='submit' name='enveliminar' id='enveliminar'>Eliminar</button>
                    </form>";

                break;
            case 'calificar':

                break;
            case 'modificar':
                echo "<h2>Si se desea mantener los datos escriba el valor actual</h2>";
                echo "<form id='modificar' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;'><br>
                        <label for='apellidos'>Apellidos</label>
                        <input type='text' name='apellidos' id='apellidos' style='width: 150px;'><br>
                        <label for='contraseña'>Contraseña </label>
                        <input type='password' name='contraseña' id='contraseña' style='width: 100px;'><br>
                        <button type='submit' name='envmodificar' id='envmodificar'>Modificar</button>
                    </form>";
                break;
            
        }
    }
    if(isset($_POST["envcrear"])){
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["duracion"])){
            if($cursos->crearCurso($_POST['nombre'], $_POST['descripcion'], $_POST['duracion'], $profesor->getID())){
                echo "Curso añadido con éxito";
            }else{
                echo "<form id='crear' method='post'>
                    <label for='nombre'>Nombre Curso</label>
                    <input type='text' name='nombre' id='nombre' style='width: 130px;' value='" . $_POST['nombre'] . "'><br>
                    <label for='descripcion'>Descripcion</label>
                    <input type='text' name='descripcion' id='descripcion' style='width: 100px;' value='" . $_POST['descripcion'] . "'><br>
                    <label for='duracion'>Duración: </label>
                    <input type='number' name='duracion' id='duracion' style='width: 100px;' value='" . $_POST['duracion'] . "'><br>
                    <button type='submit' name='envcrear' id='envcrear'>Añadir</button>
                </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }

    if(isset($_POST["enveliminar"])){
        if(isset($_POST["idcurso"])){
            if($cursos->eliminarCurso($_POST['idcurso'])){
                echo "Curso eliminado con éxito";
            }else{
                echo "<form id='eliminar' method='post'>
                    <label for='idcurso'>ID Curso</label>
                    <input type='number' name='idcurso' id='idcurso' style='width: 130px;' value='" . $_POST['idcurso'] . "'><br>
                    <button type='submit' name='enveliminar' id='enveliminar'>Eliminar</button>
                </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }

    if(isset($_POST["envmodificar"])){
        if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["contraseña"])){
            if($modprofe->modificarPerfil($_POST["nombre"], $_POST["apellidos"], $_POST["contraseña"], $profesor->getID())){
                echo "Curso eliminado con éxito";
            }else{
                echo "<h2>Si se desea mantener los datos escriba el valor actual</h2>";
                echo "<form id='modificar' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;' value='" . $_POST['nombre'] . "'><br>
                        <label for='apellidos'>Apellidos</label>
                        <input type='text' name='apellidos' id='apellidos' style='width: 150px;' value='" . $_POST['apellidos'] . "'><br>
                        <label for='contraseña'>Contraseña </label>
                        <input type='password' name='contraseña' id='contraseña' style='width: 100px;' value='" . $_POST['contraseña'] . "'><br>
                        <button type='submit' name='envmodificar' id='envmodificar'>Modificar</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }
?>