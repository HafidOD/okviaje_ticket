<?php
require_once("./config/db.php");
require_once("./helpers/PasswordHash.php");

$env = parse_ini_file('.env');

$db_prefix = $env["DB_PREFIX"];

session_start();

define('INDEX_URL', 'index.php');
define('DASHBOARD_URL', 'dashboard.php');

function set_error_msj($msj, $redirect)
{
  $_SESSION['mensaje_error'] = $msj;
  header("Location: $redirect");
  exit();
}

function authenticate_user($conn, $passwordHash, $nombre_usuario, $contrasena, $db_prefix)
{
  // $stmt = $conn->prepare("SELECT ID, user_pass FROM wp_users WHERE user_login = ?");
  $stmt = $conn->prepare("SELECT * FROM wp_users 
INNER JOIN wp_usermeta ON {$db_prefix}users.ID = {$db_prefix}usermeta.user_id 
WHERE ({$db_prefix}users.user_login = ? OR {$db_prefix}users.user_email = ?) AND {$db_prefix}usermeta.meta_key = ?");
  $stmt->execute([$nombre_usuario, $nombre_usuario, "wp_capabilities"]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($result);

  if ($result && $passwordHash->CheckPassword($contrasena, $result['user_pass'])) {
    session_start();
    $user_capabilities = unserialize($result['meta_value']);

    // Obtener el rol del usuario
    $user_role = key($user_capabilities);

    // $_SESSION['nombre_usuario'] = $nombre_usuario;
    $_SESSION['user'] = [
      'ID' => $result['ID'],
      'user_login' => $result['user_login'],
      'user_name' => $result['display_name'],
      'user_email' => $result['user_email'],
      // Agrega otras propiedades del usuario según sea necesario
      'role' => $user_role,
    ];
    header("Location: " . DASHBOARD_URL);
    exit();
  }

  $mensaje = "Nombre de usuario o contraseña incorrectos";
  set_error_msj($mensaje, INDEX_URL);
}

// Recibir datos del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];

authenticate_user($conn, new PasswordHash(8, false), $nombre_usuario, $contrasena, $db_prefix);
