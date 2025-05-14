<!-- DaisyUI Sidebar (Drawer) -->
<div class="drawer lg:drawer-open">
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content p-4">
    <!-- Page content here -->
    <label for="my-drawer" class="btn btn-primary drawer-button lg:hidden">☰ Menu</label>
    <h1 class="text-2xl font-bold">Bienvenue sur le Dashboard</h1>
  </div> 
  <div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label> 
    <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
      <!-- Sidebar content here -->
      <li><a href="#">Accueil</a></li>
      <li><a href="#">Utilisateurs</a></li>
      <li><a href="#">Paramètres</a></li>
      <li><a href="#">Déconnexion</a></li>
    </ul>
  </div>
</div>
