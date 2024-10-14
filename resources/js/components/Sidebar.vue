<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Motorista
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <router-link to="/motorista" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listagem</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/motorista/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Transportadora
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/transportadora" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listagem</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/transportadora/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  name: "Sidebar",
};
</script>

<style></style>
