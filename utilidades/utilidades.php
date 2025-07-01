<?php
require_once 'DAO/connection.php';
require_once ROOT_PATH . 'DAO/AuditService.php';
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
            require_once ROOT_PATH . 'login.php';
            exit();
        }
    }
    // Cerrar sesion
    private static function close_loggin()
    {
        session_destroy();
        header('Location: ' . SITE_URL . 'login');
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

    private static function handleLogin() {
        if(isset($_SESSION['lockout_time'])) {
            $lapsed_time = time() - $_SESSION['lockout_time'];
            if ($lapsed_time < LOCKOUT_TIME) {
                $remaining_time = LOCKOUT_TIME - $lapsed_time;
                $_SESSION['error_message'] = "Demasiados intentos fallidos. Por favor, inténtelo de nuevo en $remaining_time segundos.";
                header('Location: ' . SITE_URL . 'login');
                exit();
            } else {
                unset($_SESSION['login_attempts']);
                unset($_SESSION['lockout_time']);
            }
        }

        require_once ROOT_PATH . 'DAO/AuthService.php';
        $authService = new AuthService();
        $userData = $authService->attemptLogin($_POST['user'], $_POST['pass']);
        if($userData) {
            unset($_SESSION['login_attempts']);
            unset($_SESSION['lockout_time']);
            session_regenerate_id(true);
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['tipo'] = $userData['tipo'];
            self::save_log_audit('Inicio de sesión exitoso', $_POST['user'], 'Usuario ha iniciado sesión correctamente.');
            header('Location: ' . SITE_URL . DEFAULT_URL);
            exit();
        } else {
            $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
            if ($_SESSION['login_attempts'] >= MAX_LOGIN_ATTEMPTS) {
                $_SESSION['lockout_time'] = time();
                $_SESSION['error_message'] = "Demasiados intentos fallidos. Por favor, inténtelo de nuevo más tarde.";
                self::save_log_audit('Bloqueo de cuenta', $_POST['user'], 'Demasiados intentos fallidos de inicio de sesión.');
            } else {
                $attemps_left = MAX_LOGIN_ATTEMPTS - $_SESSION['login_attempts'];
                $_SESSION['error_message'] = "Usuario o contraseña incorrectos. Intentos restantes: $attemps_left.";
                self::save_log_audit('Intento de inicio de sesión fallido', $_POST['user'], 'Usuario o contraseña incorrectos.');
            }
            header('Location: ' . SITE_URL . 'login');
            exit();
        }
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
        $querystring = $_GET['querystring'] ?? '';
        
        if ($querystring === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            self::handleLogin();
        }

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
        if(strtolower($page) == "login") {
            header('Location: ' . SITE_URL . DEFAULT_URL);
            exit();
        }
        // Si el usuario no tiene permiso para acceder a la pagina manda error
        if(!self::has_permissions($tipo, $page)){
            $details = "Intento de acceso a la pagina " . $page . " por el usuario {$_SESSION['user']} con tipo $tipo";
            self::save_log_audit('Acceso denegado', $_SESSION['user'], $details);
            self::show_error(403, "Acceso denegado");
        }
        return self::return_controller($page, $id, $tipo);
    }

    private static function save_log_audit($accion, $user_id, $details): void {
        $auditService = new AuditService();
        $auditService->logAction($accion, $user_id, $details);
    }
    private static function return_controller($page, $id, $tipo): object{
        // Manejo para pagina de detalle grupo
        if($page == 'Grupos' && !empty($id)){
            $id_parts = explode('-', $id);
            if(count($id_parts) == 2){
                include_once ROOT_PATH . '_controller/detalleGrupoCtrl.php';
                return new DetalleGrupoCtrl($id_parts[0], $id_parts[1]);
            } else {
                self::show_error(400, "Informacion no valida");
            }
        }
        // Se obtiene la informacion del controlador
        $controller_info = self::$permisos[$tipo][$page];
        $controller_file = $controller_info['file'];
        $controller_name = $controller_info['controller'];
        
        // La ruta completa y segura al archivo del controlador.
        $controller_path = ROOT_PATH . '_controller/' . $controller_file;

        if (!file_exists($controller_path)) {
            self::show_error(500, "Error Interno: El archivo del controlador no fue encontrado.");
        }
        
        // Usamos require_once para que la aplicación falle si el controlador no existe.
        require_once $controller_path;

        // Lógica para instanciar el controlador (ya la tenías bien).
        if (isset($controller_info['requiere_id']) && $controller_info['requiere_id'] && empty($id)) {
            self::show_error(400, "Información sin proporcionar. Esta página requiere un identificador.");
        }

        if (isset($controller_info['usar_sesion']) && $controller_info['usar_sesion']) {
            return new $controller_name();
        } else if (!empty($id)) {
            return new $controller_name($id); // Pasamos el ID al constructor si es necesario.
        } else {
            return new $controller_name();
        }
    }
    // Funcion para mostrar error con el codigo HTTP correspondiente
private static function show_error($code, $message){
    http_response_code($code);
    echo "
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            margin: 0;
            font-family: sans-serif;
        }
        h1 {
            font-size: 5em; 
            color: #E74C3C;
        }
        h3 {
            font-size: 2em; 
            color: #34495E;
        }
    </style>
    <h1>$code</h1>
    <h3>$message</h3>";
    die();
}
}
