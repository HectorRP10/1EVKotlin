class Database {
    private static $instance = null;
    private $connection;

    // Constructor privado para evitar instanciación externa
    private function __construct() {
        $host = 'localhost'; // Cambia esto si es necesario
        $db = 'nombre_base_datos'; // Cambia esto por el nombre de tu base de datos
        $user = 'usuario'; // Cambia esto por tu usuario de la base de datos
        $pass = 'contraseña'; // Cambia esto por tu contraseña de la base de datos

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            // Establecer el modo de error de PDO a excepción
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    // Método para obtener la instancia de la conexión
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }

    // Previene la clonación de la instancia
    private function __clone() {}

    // Previene la deserialización de la instancia
    private function __wakeup() {}
}

// Uso
try {
    $db = Database::getInstance();
    // Aquí puedes realizar consultas a la base de datos usando $db
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}