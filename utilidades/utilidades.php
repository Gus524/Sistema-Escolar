<?php
require_once 'DAO/connection.php';
class Utilidades
{
    // Matriz para controlar la navegabilidad dependiendo el tipo de usuario
    private static $permisos = [
        'alumno' => [
            'Inicio' => ['controller' => 'InicioCtrl', 'file' => 'inicioCtrl.php'],
            'Horario' => ['controller' => 'HorarioPersonalCtrl', 'file' => 'horarioPersonalCtrl.php'],
            'Mapa' => ['controller' => 'MapaCtrl', 'file' => 'mapaCtrl.php'],
            'Horarios' => ['controller' => 'HorariosCtrl', 'file' => 'horariosCtrl.php'],
            'Ocupabilidad' => ['controller' => 'OcupabilidadCtrl', 'file' => 'ocupabilidadCtrl.php'],
            'EstadoGeneral' => ['controller' => 'EstadoGeneralCtrl', 'file' => 'estadoGeneralCtrl.php'],
            'HistorialAcademico' => ['controller' => 'HistorialAcademicoCtrl', 'file' => 'historialAcademicoCtrl.php'],
            'Calificaciones' => ['controller' => 'CalificacionAlumnoCtrl', 'file' => 'calificacionAlumnoCtrl.php'],
            'Datos' => [
                'controller' => 'DatosCtrl',
                'file' => 'datosCtrl.php',
                'usar_sesion' => true
            ]
        ],
        'docente' => [
            'Inicio' => ['controller' => 'InicioCtrl', 'file' => 'inicioCtrl.php'],
            'Horario' => ['controller' => 'HorarioPersonalCtrl', 'file' => 'horarioPersonalCtrl.php'],
            'Mapa' => ['controller' => 'MapaCtrl', 'file' => 'mapaCtrl.php'],
            'Horarios' => ['controller' => 'HorariosCtrl', 'file' => 'horariosCtrl.php'],
            'Ocupabilidad' => ['controller' => 'OcupabilidadCtrl', 'file' => 'ocupabilidadCtrl.php'],
            'Grupos' => ['controller' => 'GruposDocenteCtrl', 'file' => 'gruposDocenteCtrl.php'],
            'Datos' => [
                'controller' => 'DatosCtrl',
                'file' => 'datosCtrl.php',
                'usar_sesion' => true
            ]
        ],
        'gestion' => [
            'Inicio' => ['controller' => 'InicioCtrl', 'file' => 'inicioCtrl.php'],
            'Horario' => ['controller' => 'HorarioPersonalCtrl', 'file' => 'horarioPersonalCtrl.php'],
            'Mapa' => ['controller' => 'MapaCtrl', 'file' => 'mapaCtrl.php'],
            'Horarios' => ['controller' => 'HorariosCtrl', 'file' => 'horariosCtrl.php'],
            'Ocupabilidad' => ['controller' => 'OcupabilidadCtrl', 'file' => 'ocupabilidadCtrl.php'],
            'Alumnos' => ['controller' => 'AlumnosCtrl', 'file' => 'alumnosCtrl.php'],
            'Datos' => [
                'controller' => 'DatosCtrl',
                'file' => 'datosCtrl.php',
                'requiere_id' => true
            ]
        ]
    ];
    // Obtener el tipo de usuario y guardarlo en la sesion
    public static function get_tipo_usuario(string $user): string
    {
        // Obtiene el usuario con expresiones regulares, solo digitos para la boleta del alumno y rfc para docente
        return match (true) {
            preg_match('/^\d+$/', $user) === 1 => 'alumno',
            preg_match('/^[A-Z&Ñ]{3,4}\d{6}[A-Z\d]{3}$/', $user) === 1 => 'docente',
            default => 'gestion',
        };
    }
    // Comprobar si el usuario tiene sesion iniciada
    private static function is_user_logged()
    {
        if (!isset($_SESSION['user']) && !isset($_SESSION['tipo'])) {
            include_once ROOT_PATH . 'login';
            exit();
        }
    }
    // Cerrar sesion
    private static function close_loggin()
    {
        session_destroy();
        header('Location: login');
        exit();
    }
    // Verificar los permisos del usuario para acceder a una pagina
    private static function has_permissions($tipo, $page)
    {
        return isset(self::$permisos[$tipo][$page]);
    }
    // Obtiene el controlador de la pagina
    private static function get_controller($tipo, $page)
    {
        if (!self::has_permissions($tipo, $page)) {
            return null;
        }
        return self::$permisos[$tipo][$page];
    }
    // Funcion para asignar o mantener el tipo de usuario
    private static function set_tipo_user($tipo)
    {
        if (!isset($_SESSION['tipo'])) {
            $_SESSION['tipo'] = $tipo;
        }
    }
    // Funcion para manejar la navegacion del sistema
    public static function navigation(): object
    {
        self::is_user_logged();
        $tipo = self::get_tipo_usuario($_SESSION['user']);
        self::set_tipo_user($tipo);
        // Se lee la URL de la navegación
        $querystring = isset($_GET['querystring']) ? $_GET["querystring"] : DEFAULT_URL;
        // Se comprueba si la URL termina con un slash
        if (!str_ends_with($querystring, '/')) {
            $querystring .= '/';
        }
        // Divide la URL en partes
        $petitions = explode("/", $querystring);
        // Obtiene la página solicitada
        $page = isset($petitions[0]) ? $petitions[0] : "";
        // Obtiene el id solicitado
        $id = isset($petitions[1]) ? $petitions[1] : "";
        if($page == "Cerrar") {
            self::close_loggin();
        }
        // Si el usuario no tiene permiso para acceder a la pagina manda error
        if(!self::has_permissions($tipo, $page)){
            self::show_error(403, "Acceso denegado");
        }
        return self::return_controller($page, $id, $tipo);
    }
    private static function return_controller($page, $id, $tipo): object{
        // Manejo para pagina de detalle grupo
        if($page == 'Grupos' && !empty($id)){
            $id_parts = explode('-', $id);
            if(count($id_parts) == 2){
                include_once ROOT_PATH . 'detalleGrupoCtrl.php';
                return new DetalleGrupoCtrl($id_parts[0], $id_parts[1]);
            } else {
                self::show_error(400, "Informacion no valida");
            }
        }
        // Se obtiene la informacion del controlador
        $controller = self::get_controller($tipo, $page);
        // Comprueba si la pagina no existe
        if($controller === null) {
            self::show_error(404, "La pagina solicitada no existe");
        }
        // Comprueba si se necesita ID para el tipo de usuario (Para paginas de gestion escolar)
        if(isset($controller['requiere_id']) && $controller['requiere_id'] && empty($id)) {
            self::show_error(400, "Informacion sin proporcionar");
        }
        // Incluir el archivo del controlador
        include $controller['file'];
        // Obtener el nombre dle controlador
        $controller_name = $controller['controller'];
        //Generar el controlador
        if(isset($controller['usar_sesion']) && $controller['usar_sesion']){
            // Para paginas con usuarios que generan informacion a partir de su sesion
            $ctrl = new $controller_name();
        } else if (!empty($id)){
            // Para paginas donde se debe cargar informacion con un id
            $ctrl = new $controller_name();
        } else {
            // Para cualquier otra pagina
            $ctrl = new $controller_name();
        }
        return $ctrl;
    }
    // Funcion para mostrar error con el codigo HTTP correspondiente
    private static function show_error($code, $message){
        http_response_code($code);
        echo "<h1>$code</h1>";
        echo "<h3>$message</h3>";
        die();
    }
}
