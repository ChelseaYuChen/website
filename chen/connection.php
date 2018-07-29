
 <?php 


define('DB_SERVER', "localhost");
define('DB_USER', "id6396725_weblogin");
define('DB_PASSWORD', "G45623498");
define('DB_DATABASE', "id6396725_weblogin");
define('DB_DRIVER', "mysql");

$conn = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");



// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";
 ?>








  
















