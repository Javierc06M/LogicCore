<!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <div class="logo"><i data-lucide="zap"></i></div>
      <span class="logo-text">Administracion</span>
    </div>

    <nav>
      <div class="nav-section">
        <div class="nav-title">Principal</div>
        <a href="#" class="nav-item" data-title="Dashboard">
          <i data-lucide="layout-dashboard"></i><span>Dashboard</span>
        </a>
        <a href="#" class="nav-item" data-title="Reportes">
          <i data-lucide="bar-chart-3"></i><span>Reportes</span>
        </a>
        <a href="#" class="nav-item" data-title="Ventas">
          <i data-lucide="shopping-cart"></i><span>Ventas</span>
        </a>
      </div>

      <div class="nav-section">
        <div class="nav-title">Documentos</div>
        <div class="nav-item" data-title="Facturación" onclick="toggleSubmenu(this)">
          <i data-lucide="file-text"></i><span>Facturación</span>
          <span class="arrow"><i data-lucide="chevron-down"></i></span>
        </div>
        <div class="submenu">
          <a href="#"><i data-lucide="receipt"></i> Boletas</a>
          <a href="#"><i data-lucide="file-check"></i> Facturas</a>
          <a href="#"><i data-lucide="truck"></i> Guías de Remisión</a>
        </div>
      </div>

      <div class="nav-section">
        <div class="nav-title">Gestión</div>
        <a href="#" class="nav-item" data-title="Inventario">
          <i data-lucide="package"></i><span>Inventario</span>
        </a>
        <a href="{{ route('admin.clients.index') }}" class="nav-item {{ request()-> routeIs('admin.clients.index') ? 'active' : '' }}" data-title="Clientes">
          <i data-lucide="users"></i><span>Clientes</span>
        </a>
        <a href="#" class="nav-item" data-title="Configuración">
          <i data-lucide="settings"></i><span>Configuración</span>
        </a>
      </div>
    </nav>

    <div class="sidebar-footer">
      <div class="user-card">
        <div class="user-avatar">JD</div>
        <div class="user-info">
          <div class="user-name">Juan Díaz</div>
          <div class="user-email">juan@empresa.com</div>
        </div>
      </div>
    </div>
  </aside>