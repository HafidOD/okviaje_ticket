<!-- Navbar -->
<nav class="bg-blue-500 p-4">
  <div class="container mx-auto flex justify-between items-center">
    <!-- Logo -->
    <a href="#" class="text-white text-lg font-semibold">Tu Logo</a>

    <!-- Menú de Navegación -->
    <div class="hidden lg:flex space-x-4">
      <a href="#" class="text-white">Reservar</a>
      <?php echo ($user['role'] == "administrator") ? '<a href="#" class="text-white">Reservaciones</a>' : null; ?>

      <a href="logout.php" class="text-white">Logout</a>
      <!-- <?php echo $user['user_name'] ?> -->
    </div>

    <!-- Botón de Menú para Dispositivos Pequeños -->
    <div class="lg:hidden">
      <button id="menu-toggle" class="text-white focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </div>
</nav>

<!-- Menú Desplegable para Dispositivos Pequeños -->
<div id="menu" class="lg:hidden hidden bg-white shadow-md">
  <a href="#" class="block py-2 px-4 text-blue-500">Inicio</a>
  <a href="#" class="block py-2 px-4 text-blue-500">Acerca de</a>
  <a href="#" class="block py-2 px-4 text-blue-500">Servicios</a>
  <a href="#" class="block py-2 px-4 text-blue-500">Contacto</a>
</div>

<script>
  // Script para mostrar/ocultar el menú desplegable
  const menuToggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');

  menuToggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>