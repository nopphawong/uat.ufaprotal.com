  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/dist/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

          <!-- SidebarSearch Form -->
          <!-- <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div> -->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item">
                      <a href="<?= site_url("agent/info") ?>" class="nav-link <?= $path == "agent/info" ? "active" : "" ?>">
                          <i class="nav-icon fa fa-info-circle"></i>
                          <p>Agent info</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= site_url("banner") ?>" class="nav-link <?= $path == "banner" ? "active" : "" ?>">
                          <i class="nav-icon fa fa-info-circle"></i>
                          <p>Banners</p>
                      </a>
                  </li>

                  <!-- <li class="nav-header">MISCELLANEOUS</li> -->
                  <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-circle"></i>
                          <p>
                              Level 1
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Level 2</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Level 2
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Level 3</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Level 3</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="far fa-dot-circle nav-icon"></i>
                                          <p>Level 3</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Level 2</p>
                              </a>
                          </li>
                      </ul>
                  </li> -->
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>