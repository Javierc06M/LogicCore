@extends('layouts.admin')

@section('title', 'Administracion de Clientes')

@section('content')

<!-- CONTENIDO PRINCIPAL - Va dentro de <main class="content"> -->

<!-- Header de página con gradiente -->
<div class="page-hero">
  <div class="hero-background">
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
  </div>
  <div class="hero-content">
    <div class="hero-text">
      <h1 class="hero-title">Gestión de Clientes</h1>
      <p class="hero-subtitle">Administra tu cartera de clientes y mantén relaciones sólidas</p>
    </div>
    <div class="hero-actions">
      <button class="btn btn-glass" id="btnImportar">
        <i data-lucide="upload"></i>
        <span>Importar</span>
      </button>
      <button class="btn btn-shine" id="btnNuevoCliente">
        <i data-lucide="plus"></i>
        <span>Nuevo Cliente</span>
      </button>
    </div>
  </div>
</div>

<!-- Tarjetas de estadísticas premium -->
<div class="stats-container">
  <div class="stat-card-premium">
    <div class="stat-card-glow blue"></div>
    <div class="stat-card-content">
      <div class="stat-header">
        <div class="stat-icon-wrapper blue">
          <i data-lucide="users"></i>
        </div>
        <div class="stat-badge">
          <i data-lucide="trending-up"></i>
          <span>+12%</span>
        </div>
      </div>
      <div class="stat-body">
        <span class="stat-number" data-value="1248">0</span>
        <span class="stat-label">Total Clientes</span>
      </div>
      <div class="stat-footer">
        <div class="stat-progress">
          <div class="progress-bar blue" style="width: 78%"></div>
        </div>
        <span class="stat-meta">Meta mensual: 78%</span>
      </div>
    </div>
  </div>

  <div class="stat-card-premium">
    <div class="stat-card-glow green"></div>
    <div class="stat-card-content">
      <div class="stat-header">
        <div class="stat-icon-wrapper green">
          <i data-lucide="user-check"></i>
        </div>
        <div class="stat-badge up">
          <i data-lucide="trending-up"></i>
          <span>+8%</span>
        </div>
      </div>
      <div class="stat-body">
        <span class="stat-number" data-value="1180">0</span>
        <span class="stat-label">Clientes Activos</span>
      </div>
      <div class="stat-footer">
        <div class="stat-progress">
          <div class="progress-bar green" style="width: 94%"></div>
        </div>
        <span class="stat-meta">Tasa de retención: 94%</span>
      </div>
    </div>
  </div>

  <div class="stat-card-premium">
    <div class="stat-card-glow purple"></div>
    <div class="stat-card-content">
      <div class="stat-header">
        <div class="stat-icon-wrapper purple">
          <i data-lucide="user-plus"></i>
        </div>
        <div class="stat-badge up">
          <i data-lucide="trending-up"></i>
          <span>+24%</span>
        </div>
      </div>
      <div class="stat-body">
        <span class="stat-number" data-value="64">0</span>
        <span class="stat-label">Nuevos este Mes</span>
      </div>
      <div class="stat-footer">
        <div class="stat-progress">
          <div class="progress-bar purple" style="width: 64%"></div>
        </div>
        <span class="stat-meta">vs. mes anterior: +24%</span>
      </div>
    </div>
  </div>

  <div class="stat-card-premium">
    <div class="stat-card-glow orange"></div>
    <div class="stat-card-content">
      <div class="stat-header">
        <div class="stat-icon-wrapper orange">
          <i data-lucide="wallet"></i>
        </div>
        <div class="stat-badge up">
          <i data-lucide="trending-up"></i>
          <span>+18%</span>
        </div>
      </div>
      <div class="stat-body">
        <span class="stat-number currency" data-value="284500">0</span>
        <span class="stat-label">Ingresos Totales</span>
      </div>
      <div class="stat-footer">
        <div class="stat-progress">
          <div class="progress-bar orange" style="width: 85%"></div>
        </div>
        <span class="stat-meta">Objetivo anual: 85%</span>
      </div>
    </div>
  </div>
</div>

<!-- Panel principal de clientes -->
<div class="main-panel">
  <!-- Toolbar superior -->
  <div class="panel-toolbar">
    <div class="toolbar-left">
      <div class="search-wrapper">
        <div class="search-icon">
          <i data-lucide="search"></i>
        </div>
        <input type="text" id="searchClientes" placeholder="Buscar por nombre, documento, email...">
        <div class="search-shortcut-c">
          <kbd>⌘</kbd><kbd>K</kbd>
        </div>
      </div>
    </div>
    
    <div class="toolbar-right">
      <div class="view-toggle">
        <button class="view-btn active" data-view="table" title="Vista tabla">
          <i data-lucide="layout-list"></i>
        </button>
        <button class="view-btn" data-view="grid" title="Vista tarjetas">
          <i data-lucide="layout-grid"></i>
        </button>
      </div>
      
      <div class="toolbar-divider"></div>
      
      <button class="toolbar-btn" id="btnFiltros">
        <i data-lucide="filter"></i>
        <span>Filtros</span>
        <span class="filter-count" id="filterCount" style="display:none">0</span>
      </button>
      
      <button class="toolbar-btn" id="btnExportar">
        <i data-lucide="download"></i>
        <span>Exportar</span>
      </button>
      
      <div class="toolbar-dropdown">
        <button class="toolbar-btn" id="btnMasOpciones">
          <i data-lucide="more-horizontal"></i>
        </button>
        <div class="dropdown-menu" id="menuOpciones">
          <a href="#" class="dropdown-item"><i data-lucide="printer"></i> Imprimir lista</a>
          <a href="#" class="dropdown-item"><i data-lucide="mail"></i> Enviar reporte</a>
          <a href="#" class="dropdown-item"><i data-lucide="archive"></i> Ver archivados</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"><i data-lucide="settings"></i> Configuración</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Panel de filtros avanzados -->
  <div class="filters-advanced" id="filtersPanel">
    <div class="filters-grid">
      <div class="filter-group">
        <label><i data-lucide="toggle-left"></i> Estado</label>
        <div class="select-wrapper">
          <select id="filterEstado">
            <option value="">Todos los estados</option>
            <option value="activo">✓ Activo</option>
            <option value="inactivo">✗ Inactivo</option>
          </select>
          <i data-lucide="chevron-down"></i>
        </div>
      </div>
      
      <div class="filter-group">
        <label><i data-lucide="building-2"></i> Tipo Cliente</label>
        <div class="select-wrapper">
          <select id="filterTipo">
            <option value="">Todos los tipos</option>
            <option value="persona">Persona Natural</option>
            <option value="empresa">Empresa</option>
          </select>
          <i data-lucide="chevron-down"></i>
        </div>
      </div>
      
      <div class="filter-group">
        <label><i data-lucide="map-pin"></i> Ciudad</label>
        <div class="select-wrapper">
          <select id="filterCiudad">
            <option value="">Todas las ciudades</option>
            <option value="lima">Lima</option>
            <option value="arequipa">Arequipa</option>
            <option value="trujillo">Trujillo</option>
          </select>
          <i data-lucide="chevron-down"></i>
        </div>
      </div>
      
      <div class="filter-group">
        <label><i data-lucide="calendar"></i> Fecha Registro</label>
        <div class="date-range">
          <input type="date" id="filterFechaDesde" placeholder="Desde">
          <span>—</span>
          <input type="date" id="filterFechaHasta" placeholder="Hasta">
        </div>
      </div>
    </div>
    
    <div class="filters-actions">
      <button class="btn-text" id="btnLimpiarFiltros">
        <i data-lucide="x"></i> Limpiar todo
      </button>
      <button class="btn btn-primary btn-sm" id="btnAplicarFiltros">
        Aplicar Filtros
      </button>
    </div>
  </div>

  <!-- Barra de selección -->
  <div class="selection-bar" id="selectionBar">
    <div class="selection-info">
      <span class="selection-count">0</span> clientes seleccionados
    </div>
    <div class="selection-actions">
      <button class="btn-selection"><i data-lucide="mail"></i> Enviar email</button>
      <button class="btn-selection"><i data-lucide="tag"></i> Etiquetar</button>
      <button class="btn-selection"><i data-lucide="archive"></i> Archivar</button>
      <button class="btn-selection danger"><i data-lucide="trash-2"></i> Eliminar</button>
    </div>
  </div>

  <!-- Tabla de clientes -->
  <div class="table-wrapper">
    <table class="data-table" id="tablaClientes">
      <thead>
        <tr>
          <th class="th-checkbox">
            <label class="custom-checkbox">
              <input type="checkbox" id="selectAll">
              <span class="checkmark"></span>
            </label>
          </th>
          <th class="sortable" data-sort="nombre">
            <span>Cliente</span>
            <i data-lucide="arrow-up-down"></i>
          </th>
          <th class="sortable" data-sort="documento">
            <span>Documento</span>
            <i data-lucide="arrow-up-down"></i>
          </th>
          <th>
            <span>Contacto</span>
          </th>
          <th class="sortable" data-sort="compras">
            <span>Valor Total</span>
            <i data-lucide="arrow-up-down"></i>
          </th>
          <th class="sortable" data-sort="ultimaCompra">
            <span>Última Actividad</span>
            <i data-lucide="arrow-up-down"></i>
          </th>
          <th>
            <span>Estado</span>
          </th>
          <th class="th-actions">
            <span>Acciones</span>
          </th>
        </tr>
      </thead>
      <tbody id="clientesTableBody">
        <!-- Datos dinámicos -->
      </tbody>
    </table>
  </div>

  <!-- Footer con paginación premium -->
  <div class="panel-footer">
    <div class="footer-left">
      <span class="results-text">Mostrando</span>
      <div class="select-wrapper mini">
        <select id="itemsPerPage">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <i data-lucide="chevron-down"></i>
      </div>
      <span class="results-text">de <strong id="totalResults">1,248</strong> resultados</span>
    </div>
    
    <div class="pagination-premium">
      <button class="page-btn nav" id="firstPage" title="Primera página">
        <i data-lucide="chevrons-left"></i>
      </button>
      <button class="page-btn nav" id="prevPage" title="Anterior">
        <i data-lucide="chevron-left"></i>
      </button>
      
      <div class="page-numbers" id="pageNumbers">
        <!-- Números de página dinámicos -->
      </div>
      
      <button class="page-btn nav" id="nextPage" title="Siguiente">
        <i data-lucide="chevron-right"></i>
      </button>
      <button class="page-btn nav" id="lastPage" title="Última página">
        <i data-lucide="chevrons-right"></i>
      </button>
    </div>
  </div>
</div>

<!-- Modal Nuevo/Editar Cliente Premium -->
<div class="modal-overlay" id="modalCliente">
  <div class="modal-premium">
    <div class="modal-header-premium">
      <div class="modal-icon">
        <i data-lucide="user-plus"></i>
      </div>
      <div class="modal-title-group">
        <h3 id="modalTitle">Nuevo Cliente</h3>
        <p>Complete la información del cliente</p>
      </div>
      <button class="modal-close-premium" id="closeModal">
        <i data-lucide="x"></i>
      </button>
    </div>
    
    <div class="modal-body-premium">
      <div class="form-section">
        <h4 class="section-title"><i data-lucide="file-text"></i> Información del Documento</h4>
        <div class="form-grid">
          <div class="form-group">
            <label for="tipoDocumento">Tipo Documento <span class="required">*</span></label>
            <div class="select-wrapper">
              <select id="tipoDocumento">
                <option value="dni">DNI - Documento Nacional</option>
                <option value="ruc">RUC - Registro Único</option>
                <option value="ce">CE - Carnet Extranjería</option>
                <option value="pasaporte">Pasaporte</option>
              </select>
              <i data-lucide="chevron-down"></i>
            </div>
          </div>
          <div class="form-group">
            <label for="numDocumento">Número de Documento <span class="required">*</span></label>
            <div class="input-with-icon">
              <i data-lucide="hash"></i>
              <input type="text" id="numDocumento" placeholder="Ingrese el número">
              <button class="btn-icon" title="Buscar en SUNAT" id="btnBuscarDoc">
                <i data-lucide="search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="form-section">
        <h4 class="section-title"><i data-lucide="user"></i> Datos Personales</h4>
        <div class="form-group">
          <label for="nombreCliente">Nombre / Razón Social <span class="required">*</span></label>
          <div class="input-with-icon">
            <i data-lucide="user"></i>
            <input type="text" id="nombreCliente" placeholder="Nombre completo o razón social">
          </div>
        </div>
        
        <div class="form-grid">
          <div class="form-group">
            <label for="emailCliente">Correo Electrónico</label>
            <div class="input-with-icon">
              <i data-lucide="mail"></i>
              <input type="email" id="emailCliente" placeholder="correo@ejemplo.com">
            </div>
          </div>
          <div class="form-group">
            <label for="telefonoCliente">Teléfono</label>
            <div class="input-with-icon">
              <i data-lucide="phone"></i>
              <input type="tel" id="telefonoCliente" placeholder="+51 999 999 999">
            </div>
          </div>
        </div>
      </div>

      <div class="form-section">
        <h4 class="section-title"><i data-lucide="map-pin"></i> Ubicación</h4>
        <div class="form-group">
          <label for="direccionCliente">Dirección</label>
          <div class="input-with-icon">
            <i data-lucide="map"></i>
            <input type="text" id="direccionCliente" placeholder="Av. / Jr. / Calle">
          </div>
        </div>
        
        <div class="form-grid cols-3">
          <div class="form-group">
            <label for="distritoCliente">Distrito</label>
            <div class="input-with-icon">
              <i data-lucide="map-pin"></i>
              <input type="text" id="distritoCliente" placeholder="Distrito">
            </div>
          </div>
          <div class="form-group">
            <label for="ciudadCliente">Ciudad</label>
            <div class="input-with-icon">
              <i data-lucide="building"></i>
              <input type="text" id="ciudadCliente" placeholder="Ciudad">
            </div>
          </div>
          <div class="form-group">
            <label for="estadoCliente">Estado</label>
            <div class="select-wrapper">
              <select id="estadoCliente">
                <option value="activo">🟢 Activo</option>
                <option value="inactivo">🔴 Inactivo</option>
              </select>
              <i data-lucide="chevron-down"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="form-section">
        <h4 class="section-title"><i data-lucide="message-square"></i> Notas Adicionales</h4>
        <div class="form-group">
          <textarea id="notasCliente" rows="3" placeholder="Información adicional del cliente..."></textarea>
        </div>
      </div>
    </div>
    
    <div class="modal-footer-premium">
      <button class="btn btn-ghost" id="btnCancelar">
        <i data-lucide="x"></i> Cancelar
      </button>
      <button class="btn btn-primary" id="btnGuardar">
        <i data-lucide="check"></i> Guardar Cliente
      </button>
    </div>
  </div>
</div>

<!-- Modal Detalle Cliente Premium -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal-premium modal-lg">
    <button class="modal-close-float" id="closeDetalle">
      <i data-lucide="x"></i>
    </button>
    
    <!-- Header con perfil -->
    <div class="detail-hero">
      <div class="detail-hero-bg"></div>
      <div class="detail-profile">
        <div class="profile-avatar-lg" id="detalleAvatar">JD</div>
        <div class="profile-info-main">
          <h2 id="detalleNombre">Juan Díaz Pérez</h2>
          <p id="detalleDocumento">DNI: 12345678</p>
          <div class="profile-badges">
            <span class="badge-premium active" id="detalleEstado">
              <i data-lucide="check-circle"></i> Activo
            </span>
            <span class="badge-premium type" id="detalleTipo">
              <i data-lucide="user"></i> Persona Natural
            </span>
          </div>
        </div>
        <div class="profile-actions">
          <button class="btn-circle" title="Enviar email">
            <i data-lucide="mail"></i>
          </button>
          <button class="btn-circle" title="Llamar">
            <i data-lucide="phone"></i>
          </button>
          <button class="btn-circle" title="WhatsApp">
            <i data-lucide="message-circle"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="modal-body-premium">
      <!-- Métricas del cliente -->
      <div class="client-metrics">
        <div class="metric-card">
          <div class="metric-icon blue">
            <i data-lucide="shopping-bag"></i>
          </div>
          <div class="metric-data">
            <span class="metric-value" id="detalleTotalCompras">S/. 12,450</span>
            <span class="metric-label">Total en Compras</span>
          </div>
        </div>
        <div class="metric-card">
          <div class="metric-icon green">
            <i data-lucide="receipt"></i>
          </div>
          <div class="metric-data">
            <span class="metric-value" id="detalleNumCompras">28</span>
            <span class="metric-label">Transacciones</span>
          </div>
        </div>
        <div class="metric-card">
          <div class="metric-icon purple">
            <i data-lucide="clock"></i>
          </div>
          <div class="metric-data">
            <span class="metric-value" id="detalleUltimaCompra">Hace 5 días</span>
            <span class="metric-label">Última Compra</span>
          </div>
        </div>
        <div class="metric-card">
          <div class="metric-icon orange">
            <i data-lucide="calendar"></i>
          </div>
          <div class="metric-data">
            <span class="metric-value" id="detalleFecha">15 Mar 2024</span>
            <span class="metric-label">Cliente Desde</span>
          </div>
        </div>
      </div>

      <!-- Tabs de información -->
      <div class="detail-tabs">
        <button class="tab-btn active" data-tab="info">
          <i data-lucide="info"></i> Información
        </button>
        <button class="tab-btn" data-tab="historial">
          <i data-lucide="history"></i> Historial
        </button>
        <button class="tab-btn" data-tab="documentos">
          <i data-lucide="file"></i> Documentos
        </button>
      </div>

      <!-- Contenido de tabs -->
      <div class="tab-content active" id="tab-info">
        <div class="info-grid">
          <div class="info-card">
            <div class="info-card-header">
              <i data-lucide="mail"></i>
              <span>Email</span>
            </div>
            <p id="detalleEmail">juan.diaz@email.com</p>
          </div>
          <div class="info-card">
            <div class="info-card-header">
              <i data-lucide="phone"></i>
              <span>Teléfono</span>
            </div>
            <p id="detalleTelefono">+51 999 888 777</p>
          </div>
          <div class="info-card full-width">
            <div class="info-card-header">
              <i data-lucide="map-pin"></i>
              <span>Dirección</span>
            </div>
            <p id="detalleDireccion">Av. Principal 123, Miraflores, Lima</p>
          </div>
        </div>
      </div>

      <div class="tab-content" id="tab-historial">
        <div class="timeline">
          <div class="timeline-item">
            <div class="timeline-marker green"></div>
            <div class="timeline-content">
              <span class="timeline-date">Hoy, 10:30 AM</span>
              <p>Compra realizada por <strong>S/. 450.00</strong></p>
            </div>
          </div>
          <div class="timeline-item">
            <div class="timeline-marker blue"></div>
            <div class="timeline-content">
              <span class="timeline-date">Hace 5 días</span>
              <p>Compra realizada por <strong>S/. 1,200.00</strong></p>
            </div>
          </div>
          <div class="timeline-item">
            <div class="timeline-marker purple"></div>
            <div class="timeline-content">
              <span class="timeline-date">15 Oct 2024</span>
              <p>Actualización de datos de contacto</p>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-content" id="tab-documentos">
        <div class="empty-state">
          <i data-lucide="file-x"></i>
          <p>No hay documentos adjuntos</p>
          <button class="btn btn-secondary btn-sm">
            <i data-lucide="upload"></i> Subir documento
          </button>
        </div>
      </div>
    </div>
    
    <div class="modal-footer-premium">
      <button class="btn btn-ghost" id="btnCerrarDetalle">Cerrar</button>
      <button class="btn btn-secondary" id="btnArchivar">
        <i data-lucide="archive"></i> Archivar
      </button>
      <button class="btn btn-primary" id="btnEditarDetalle">
        <i data-lucide="edit-3"></i> Editar Cliente
      </button>
    </div>
  </div>
</div>

<!-- Modal Eliminar Premium -->
<div class="modal-overlay" id="modalEliminar">
  <div class="modal-premium modal-sm">
    <div class="delete-modal-content">
      <div class="delete-icon-wrapper">
        <div class="delete-icon-bg"></div>
        <i data-lucide="alert-triangle"></i>
      </div>
      <h3>¿Eliminar cliente?</h3>
      <p>Esta acción eliminará permanentemente al cliente y todos sus datos asociados. Esta acción no se puede deshacer.</p>
      <div class="delete-actions">
        <button class="btn btn-ghost" id="btnCancelarEliminar">Cancelar</button>
        <button class="btn btn-danger" id="btnConfirmarEliminar">
          <i data-lucide="trash-2"></i> Sí, eliminar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Toast de notificaciones -->
<div class="toast-container" id="toastContainer"></div>

@endsection