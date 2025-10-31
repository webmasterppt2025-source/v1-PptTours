<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ppt_v1";
    private $charset = "utf8mb4";
    private $conexion;
    
    public function __construct() {
        $this->conectar();
    }
    
    private function conectar() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        try {
            $this->conexion = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conexion->connect_error) {
                throw new Exception("Error de conexión: " . $this->conexion->connect_error);
            }
            
            if (!$this->conexion->set_charset($this->charset)) {
                throw new Exception("Error configurando charset: " . $this->conexion->error);
            }
            
        } catch (Exception $e) {
            error_log("Error de base de datos: " . $e->getMessage());
            die("Error de conexión con el servidor. Por favor, intente más tarde.");
        }
    }
    
    public function getConexion() {
        if (!$this->conexion || !$this->conexion->ping()) {
            $this->reconectar();
        }
        return $this->conexion;
    }
    
    // AGREGAR ESTE MÉTODO
    public function ejecutarConsulta($sql, $params = [], $types = "") {
        try {
            $stmt = $this->getConexion()->prepare($sql);
            
            if (!$stmt) {
                throw new Exception("Error preparando consulta: " . $this->getConexion()->error);
            }
            
            if (!empty($params)) {
                if (empty($types)) {
                    $types = str_repeat('s', count($params));
                }
                $stmt->bind_param($types, ...$params);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            
            if (stripos($sql, 'SELECT') === 0) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                return $data;
            } else {
                $affectedRows = $stmt->affected_rows;
                $stmt->close();
                return $affectedRows;
            }
            
        } catch (Exception $e) {
            error_log("Error en consulta: " . $e->getMessage() . " - SQL: " . $sql);
            return false;
        }
    }
    
    private function reconectar() {
        $this->cerrarConexion();
        $this->conectar();
    }
    
    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion->close();
            $this->conexion = null;
        }
    }
    
    public function __destruct() {
        $this->cerrarConexion();
    }
}

$db = new Database();
?>