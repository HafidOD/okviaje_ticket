<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php"); // Redirige a la página de inicio de sesión
  exit();
}
$user = $_SESSION['user'];
// var_dump($user);
require_once('./layouts/head.php');
?>
<header>
  <?php require_once('./components/header.php'); ?>
</header>
<div class="">
  <div class="my-4">
    <h2 class="text-center text-xl font-medium">Bienvenido <?php echo $user['user_name'] ?></h2>
  </div>
  <div class="flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-full md:w-3/5">
      <h2 class="text-lg mb-4 font-semibold">Agregar reserva</h2>
      <form action="#" method="post" class="grid grid-cols-2 gap-4">

        <!-- Primera Columna -->
        <div class="mb-4 col-span-1">
          <label for="confirmation" class="block text-sm font-medium text-gray-600"># Confirmation:</label>
          <input type="text" id="confirmation" name="confirmation" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4 col-span-1">
          <label for="name" class="block text-sm font-medium text-gray-600">Name / Nombre:</label>
          <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="number_adults" class="block text-sm font-medium text-gray-600">Adults / Adultos:</label>
          <input type="text" id="number_adults" name="number_adults" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="number_children" class="block text-sm font-medium text-gray-600">Children / Menores:</label>
          <input type="text" id="number_children" name="number_children" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="hotel" class="block text-sm font-medium text-gray-600">Hotel:</label>
          <input type="text" id="hotel" name="hotel" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="room" class="block text-sm font-medium text-gray-600">Room / Habitación:</label>
          <input type="text" id="room" name="room" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Segunda Columna -->
        <div class="mb-4 col-span-1">
          <label for="time_pickup" class="block text-sm font-medium text-gray-600">Pick up Time / Hr Pick up:</label>
          <input type="time" id="time_pickup" name="time_pickup" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="date_pickup" class="block text-sm font-medium text-gray-600">Service Date / Fecha Tour:</label>
          <input type="date" id="date_pickup" name="date_pickup" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="service" class="block text-sm font-medium text-gray-600">Service / Servicio:</label>
          <input type="text" id="service" name="service" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4 col-span-1">
          <label for="supplier" class="block text-sm font-medium text-gray-600">Supplier / Proveedor:</label>
          <input type="text" id="supplier" name="supplier" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <button type="submit" class="col-span-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
          Reservar
        </button>

      </form>
    </div>
  </div>
</div>
<script>
  // Obtén la fecha actual en formato YYYY-MM-DD
  const today = new Date().toISOString().split('T')[0];
  // Establece la fecha mínima en el campo de fecha
  document.getElementById('date_pickup').min = today;
</script>
<?php require_once('./layouts/footer.php'); ?>