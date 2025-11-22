<header class="header">
      <div class="header-left">
        <button class="toggle-btn" onclick="toggleSidebar()">
          <i data-lucide="menu"></i>
        </button>
        <div class="search-box">
          <i data-lucide="search"></i>
          <input type="text" placeholder="Buscar cualquier cosa...">
          <span class="search-shortcut">⌘K</span>
        </div>
      </div>

      <div class="header-right">
        <div class="notification-wrapper">
          <button class="header-icon" onclick="toggleNotif()">
            <i data-lucide="bell"></i>
            <span class="badge"></span>
          </button>
          <div class="dropdown notif-dropdown" id="notifDropdown">
            <div class="notif-header">
              <span>Notificaciones</span>
              <span class="notif-badge">3 nuevas</span>
            </div>
            <div class="notif-list">
              <div class="notif-item unread">
                <div class="notif-icon sale"><i data-lucide="trending-up"></i></div>
                <div class="notif-content">
                  <div class="notif-text"><strong>Nueva venta</strong> registrada por S/. 2,450.00</div>
                  <div class="notif-time"><i data-lucide="clock" style="width:12px;height:12px"></i> Hace 5 minutos</div>
                </div>
              </div>
              <div class="notif-item unread">
                <div class="notif-icon alert"><i data-lucide="alert-triangle"></i></div>
                <div class="notif-content">
                  <div class="notif-text"><strong>Stock bajo</strong> en 3 productos del inventario</div>
                  <div class="notif-time"><i data-lucide="clock" style="width:12px;height:12px"></i> Hace 1 hora</div>
                </div>
              </div>
              <div class="notif-item">
                <div class="notif-icon user"><i data-lucide="user-plus"></i></div>
                <div class="notif-content">
                  <div class="notif-text"><strong>Nuevo cliente</strong> Carlos Mendoza registrado</div>
                  <div class="notif-time"><i data-lucide="clock" style="width:12px;height:12px"></i> Hace 3 horas</div>
                </div>
              </div>
            </div>
            <div class="notif-footer">
              <a href="#"><i data-lucide="arrow-right" style="width:14px;height:14px"></i> Ver todas las notificaciones</a>
            </div>
          </div>
        </div>

        <button class="header-icon">
          <i data-lucide="message-square"></i>
        </button>
        
        <button class="header-icon">
          <i data-lucide="calendar"></i>
        </button>

        <div class="divider"></div>

        <div class="profile" onclick="toggleProfile()">
          <div class="profile-avatar">JD</div>
          <div class="profile-info">
            <div class="profile-name">Juan Díaz</div>
            <div class="profile-role">Administrador</div>
          </div>
          <i data-lucide="chevron-down"></i>
          
          <div class="dropdown profile-dropdown" id="profileDropdown">
            <div class="dropdown-header">
              <div class="avatar">JD</div>
              <div class="name">Juan Díaz</div>
              <div class="email">juan@empresa.com</div>
            </div>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item"><i data-lucide="user"></i> Mi Perfil</a>
              <a href="#" class="dropdown-item"><i data-lucide="settings"></i> Configuración</a>
              <a href="#" class="dropdown-item"><i data-lucide="credit-card"></i> Facturación</a>
              <a href="#" class="dropdown-item"><i data-lucide="help-circle"></i> Centro de Ayuda</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item danger"><i data-lucide="log-out"></i> Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div>
    </header>