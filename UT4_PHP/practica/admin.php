<html>
    <head></head>
    <body>
        <h1>AREA ADMIN</h1>
        <form id="principal" method="post">
            <label for="accion">Selecciona la acción</label>
            <select name="accion" id="accion" form="principal">
                <option value="inscalu">Inscribir alumno</option>
                <option value="elialu">Eliminar alumno</option>
                <option value="inscpro">Inscribir profesor</option>
                <option value="elipro">Eliminar profesor</option>
                <option value="asigpro">Asignar profesor</option>
                <option value="listados">Ver listados</option>
                <option value="cursos">Ver cursos</option>
                <option value="alumnos">Ver alumnos</option>
                <option value="crearcurso">Crear curso</option>
                <option value="asigalu">Asignar alumno</option>
            </select>
            <br>
            <button type="submit" name="enviar" id="enviar">Enviar</button>
            <button type="submit" name="cerrar" id="cerra">Cerrar sesion</button>
        </form>
    </body>
</html>

<?php
    require_once("./clases/UserAdmin.php");
    require_once("./clases/ModeloCurso.php");
    require_once("./clases/ModeloAlumno.php");
    require_once("./clases/ModeloProfe.php");
    require_once("./clases/ModeloAdmin.php");
    session_start();
    
    $cursos = new ModeloCurso();
    $alumnos = new ModeloAlumno();
    $profesores = new ModeloProfe();
    $modadmin = new ModeloAdmin();
    $admin = $_SESSION['usuario'];

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

            case 'listados':
                echo "<h1>CURSOS</h1>";
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
                echo "<hr>";
                echo "<h1>ALUMNOS</h1>";
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

                echo "<hr>";
                echo "<h1>PROFESORES</h1>";
                echo "<table style='border: 5px solid black; width: 100%; text-align: center;'>";
                echo "<tr><th>ID</th><th>NOMBRE</th><th>APELLIDOS</th><th>CURSO</th></tr>";
                foreach($profesores->getProfesores() as $profe){
                    echo "<tr>";
                        echo "<td>" . $profe['id_profesor'] . "</td>";
                        echo "<td>" . $profe['nombre'] . "</td>";
                        echo "<td>" . $profe['apellidos'] . "</td>";
                        echo "<td>" . $profe['nombre_curso'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'crearcurso':
                echo "<form id='crear' method='post'>
                        <label for='nombre'>Nombre Curso</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;'><br>
                        <label for='descripcion'>Descripcion</label>
                        <input type='text' name='descripcion' id='descripcion' style='width: 150px;'><br>
                        <label for='duracion'>Duración: </label>
                        <input type='number' name='duracion' id='duracion' style='width: 100px;'><br>
                        <label for='idprof'>ID Profesor: </label>
                        <input type='number' name='idprof' id='idprof' style='width: 100px;'><br>
                        <button type='submit' name='envcrear' id='envcrear'>Añadir</button>
                    </form>";

                break;
            case 'asigalu':
                echo "<form id='asignar' method='post'>
                        <label for='alumno'>ID Alumno</label>
                        <input type='number' name='alumno' id='alumno' style='width: 100px;'><br>
                        <label for='curso'>ID Curso</label>
                        <input type='number' name='curso' id='curso' style='width: 130px;'><br>
                        <button type='submit' name='envasignar' id='envasignar'>Añadir</button>
                    </form>";
                break;

            case 'asigpro':
                echo "<form id='asignar' method='post'>
                        <label for='alumno'>ID Profesor</label>
                        <input type='number' name='profesor' id='profesor' style='width: 100px;'><br>
                        <label for='curso'>ID Curso</label>
                        <input type='number' name='curso' id='curso' style='width: 130px;'><br>
                        <button type='submit' name='envasignar' id='envasignarprof'>Añadir</button>
                    </form>";
                break;

            case 'inscalu':
                echo "<form id='inscribir' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;'><br>
                        <label for='email'>Email</label>
                        <input type='text' name='email' id='email' style='width: 130px;'><br>
                        <label for='fecha'>Fecha nacimiento</label>
                        <input type='date' name='fecha' id='fecha' style='width: 130px;'><br>
                        <button type='submit' name='inscalu' id='inscalu'>Inscribir</button>
                    </form>";

                break;
            case 'elialu':
                echo "<form id='eliminar' method='post'>
                        <label for='idalumno'>ID Alumno</label>
                        <input type='number' name='idalumno' id='idalumno' style='width: 130px;'><br>
                        <button type='submit' name='elialu' id='elialu'>Eliminar</button>
                    </form>";
                break;
            case 'inscpro':
                echo "<form id='inscribir' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;'><br>
                        <label for='apellidos'>Apellidos</label>
                        <input type='text' name='apellidos' id='apellidos' style='width: 130px;'><br>
                        <label for='usuario'>Usuario</label>
                        <input type='text' name='usuario' id='usuario' style='width: 130px;'><br>
                        <label for='pass'>Contraseña</label>
                        <input type='text' name='pass' id='pass' style='width: 130px;'><br>
                        <button type='submit' name='inscpro' id='inscpro'>Inscribir</button>
                    </form>";

                break;
            case 'elipro':
                echo "<form id='eliminar' method='post'>
                        <label for='idprof'>ID Profesor</label>
                        <input type='number' name='idprof' id='idprof' style='width: 130px;'><br>
                        <button type='submit' name='elipro' id='elipro'>Eliminar</button>
                    </form>";
                break;
            
        }
    }

    if(isset($_POST["cerrar"])){
        $_SESSION['usuario'] = "";
        header("Location: index.php");
    }

    if(isset($_POST["envasignar"])){
        if(isset($_POST["alumno"]) && isset($_POST["curso"])){
            if($alumnos->asignarAlumnos($_POST['alumno'], $_POST['curso'])){
                echo "Alumno asignado con éxito";
            }else{
                echo "<form id='asignar' method='post'>
                        <label for='alumno'>ID Alumno</label>
                        <input type='number' name='alumno' id='alumno' style='width: 100px;' value='" . $_POST['alumno'] . "'><br>
                        <label for='curso'>ID Curso</label>
                        <input type='number' name='curso' id='curso' style='width: 130px;' value='" . $_POST['curso'] . "'><br>
                        <button type='submit' name='envasignar' id='envasignar'>Añadir</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }

    if(isset($_POST["envasignar"])){
        if(isset($_POST["profesor"]) && isset($_POST["curso"])){
            if($cursos->asignarProfesor($_POST["profesor"], $_POST["curso"])){
                echo "Profesor asignado con éxito";
            }else{
                echo "<form id='asignar' method='post'>
                        <label for='profesor'>ID Profesor</label>
                        <input type='number' name='profesor' id='profesor' style='width: 100px;' value='" . $_POST['profesor'] . "'><br>
                        <label for='curso'>ID Curso</label>
                        <input type='number' name='curso' id='curso' style='width: 130px;' value='" . $_POST['curso'] . "'><br>
                        <button type='submit' name='envasignar' id='envasignar'>Añadir</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }

    if(isset($_POST["envcrear"])){
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["duracion"]) && isset($_POST["idprof"])){
            if($cursos->crearCurso($_POST['nombre'], $_POST['descripcion'], $_POST['duracion'], $_POST["idprof"])){
                echo "Curso añadido con éxito";
            }else{
                echo "<form id='crear' method='post'>
                    <label for='nombre'>Nombre Curso</label>
                    <input type='text' name='nombre' id='nombre' style='width: 130px;' value='" . $_POST['nombre'] . "'><br>
                    <label for='descripcion'>Descripcion</label>
                    <input type='text' name='descripcion' id='descripcion' style='width: 100px;' value='" . $_POST['descripcion'] . "'><br>
                    <label for='duracion'>Duración: </label>
                    <input type='number' name='duracion' id='duracion' style='width: 100px;' value='" . $_POST['duracion'] . "'><br>
                    <label for='idprof'>ID Profesor: </label>
                    <input type='number' name='idprof' id='idprof' style='width: 100px;' value='" . $_POST['idprof'] . "'><br>
                    <button type='submit' name='envcrear' id='envcrear'>Añadir</button>
                </form>";

                echo "Ha ocurrido un error";
            }
        }      
    }

    if (isset($_POST['inscalu'])){
        if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["fecha"])){
            if($alumnos->insertar($_POST['nombre'], $_POST['email'], $_POST['fecha'])){
                echo "Alumno añadido con éxito";
            }else{
                echo "<form id='inscribir' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;' value='" . $_POST['nombre'] . "'><br>
                        <label for='email'>Email</label>
                        <input type='text' name='email' id='email' style='width: 130px;' value='" . $_POST['email'] . "'><br>
                        <label for='fecha'>Fecha nacimiento</label>
                        <input type='date' name='fecha' id='fecha' style='width: 130px;' value='" . $_POST['fecha'] . "'><br>
                        <button type='submit' name='inscalu' id='inscalu'>Inscribir</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }
    }
    if (isset($_POST['elialu'])){
        if(isset($_POST["idalumno"])){
            if($alumnos->eliminar($_POST['idalumno'])){
                echo "Alumno eliminado con éxito";
            }else{
                echo "<form id='eliminar' method='post'>
                        <label for='idalumno'>ID Alumno</label>
                        <input type='number' name='idalumno' id='idalumno' style='width: 130px;' value='" . $_POST['idalumno'] . "'><br>
                        <button type='submit' name='elialu' id='elialu'>Eliminar</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }
    }

    if (isset($_POST['inscpro'])){
        if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["usuario"]) && isset($_POST["pass"])){
            if($profesores->insertar($_POST['nombre'], $_POST['apellidos'], $_POST['usuario'], $_POST['pass'])){
                echo "Profesor añadido con éxito";
            }else{
                echo "<form id='inscribir' method='post'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre' style='width: 130px;' value='" . $_POST['nombre'] . "'><br>
                        <label for='apellidos'>Apellidos</label>
                        <input type='text' name='apellidos' id='apellidos' style='width: 130px;' value='" . $_POST['apellidos'] . "'><br>
                        <label for='usuario'>Usuario</label>
                        <input type='text' name='usuario' id='usuario' style='width: 130px;' value='" . $_POST['usuario'] . "'><br>
                        <label for='pass'>Contraseña</label>
                        <input type='text' name='pass' id='pass' style='width: 130px;' value='" . $_POST['pass'] . "'><br>
                        <button type='submit' name='inscpro' id='inscpro'>Inscribir</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }
    }

    if (isset($_POST['elipro'])){
        if(isset($_POST["idprof"])){
            if($profesores->eliminar($_POST['idprof'])){
                echo "Profesor eliminado con éxito";
            }else{
                echo "<form id='eliminar' method='post'>
                        <label for='idprof'>ID Alumno</label>
                        <input type='number' name='idprof' id='idprof' style='width: 130px;' value='" . $_POST['idprof'] . "'><br>
                        <button type='submit' name='elipro' id='elipro'>Eliminar</button>
                    </form>";

                echo "Ha ocurrido un error";
            }
        }
    }
    
    
?>