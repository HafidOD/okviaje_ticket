<?php
session_start();

if (isset($_SESSION['user'])) {
  header("Location: dashboard.php"); // Redirige a la página de inicio de sesión
  exit();
}

$mensaje_error = isset($_SESSION['mensaje_error']) ? $_SESSION['mensaje_error'] : "";
unset($_SESSION['mensaje_error']); // Limpiar el mensaje de error
require_once('./layouts/head.php');
?>

<div class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded shadow-md w-full sm:w-96">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>

    <!-- Mostrar el mensaje de error si existe -->
    <?php if (!empty($mensaje_error)) : ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error:</strong>
        <span class="block sm:inline"><?php echo $mensaje_error; ?></span>
      </div>
    <?php endif; ?>

    <form action="login.php" method="post">
      <div class="mb-4">
        <label for="nombre_usuario" class="block text-sm font-medium text-gray-600">Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
      </div>

      <div class="mb-4">
        <label for="contrasena" class="block text-sm font-medium text-gray-600">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
        Iniciar sesión
      </button>
    </form>
  </div>
</div>

<?php require_once('./layouts/footer.php'); ?>