<?php
class Database{
    //estas son las varaibles que utilizamos para inicializar la conexion a mariaDB
    private static $connection = null;
    private static $statement = null;
    private static $id = null;
    private static $error = null;
//Creamos la funcion que mandaremos a llamar a la hora de interactuar don la base de datos
    private function connect(){
        //se crean variables para mejor manipulacion de la instancia
        //nombre del servidor
        $server = "localhost";
        //nombre de la base de datos
        $database = "netbook";
        //nombre del usuario
        $username = "root";
        //contraseña del usuario
        $password = "";
        try{
            //se procede a realizar la instancia de la conexion y concatenan las variables que antes hemos definido
            @self::$connection = new PDO("mysql:host=$server; dbname=$database; charset=utf8", $username, $password);
        }catch(PDOException $exception){
            throw new Exception($exception->getCode());
        }
    }
    //funcion para desconectar la conexion con la base de datos
    private function desconnect(){
        //se devuelbe un mensaje de error en caso falle
        self::$error = self::$statement->errorInfo();
        self::$connection = null;
    }
    //metodos utilizados para la manipulacion de la base de datos
    public static function executeRow($query, $values){
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

    public static function getRow($query, $values){
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch();
    }

    public static function getRows($query, $values){
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll();
    }

    public static function getLastRowId(){
        return self::$id;
    }
    public static function getException(){
        if(self::$error[0] == "00000"){
            return false;
        }else{
            return self::$error[1];
        }
    }
}
?>