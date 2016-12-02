<?php

class Database
{
    private static $dbName = 'University' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'toor';

    private static $conn  = null;

    public function __construct()
    {

    }
    public static function connect()
    {
       if ( null == self::$conn )
       {
        try
        {
          //self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
          self::$conn =  new PDO( "mysql:dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);

        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
       }
       return self::$conn;

      // $conn = mysqli_connect("$dbHost", "$dbUsername", "$dbUserPassword", "$dbName");
      //
      // if (!$conn) {
      //     echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
      //     echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
      //     echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
      //     exit;
      // }
      //
      // echo "Соединение с MySQL установлено!" . PHP_EOL;
      // echo "Информация о сервере: " . mysqli_get_host_info($conn) . PHP_EOL;
      //
      // mysqli_close($conn);

    }

    public static function disconnect()
    {
        self::$conn = null;
    }
}

?>
