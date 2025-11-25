// ========== CLIENTES PREMIUM - JAVASCRIPT ==========

document.addEventListener('DOMContentLoaded', function() {
 const btnBuscarDoc = document.getElementById("btnBuscarDoc");

    if (!btnBuscarDoc) {
        console.warn("⚠️ No se encontró el botón #btnBuscarDoc");
        return;
    }

    btnBuscarDoc.addEventListener("click", () => {
        console.log("Botón buscar clickeado!");
        buscarDocumento(); // tu función
    });

  lucide.createIcons();
  
  initAnimations();
  initModals();
  initFilters();
  initTable();
  initPagination();
  initTabs();
  
  loadClientes();
});

// ========== DATOS ==========
const clientesData = [
  { id: 1, nombre: 'Juan Díaz Pérez', tipo: 'Persona Natural', tipoDoc: 'DNI', documento: '12345678', email: 'juan.diaz@email.com', telefono: '+51 999 888 777', direccion: 'Av. Principal 123, Miraflores', ciudad: 'Lima', estado: 'activo', compras: 12450, numCompras: 28, fechaRegistro: '2024-03-15', ultimaCompra: 'Hace 5 días' },
  { id: 2, nombre: 'María García López', tipo: 'Persona Natural', tipoDoc: 'DNI', documento: '87654321', email: 'maria.garcia@email.com', telefono: '+51 988 777 666', direccion: 'Jr. Las Flores 456, San Isidro', ciudad: 'Lima', estado: 'activo', compras: 8920, numCompras: 15, fechaRegistro: '2024-01-20', ultimaCompra: 'Hace 2 días' },
  { id: 3, nombre: 'Tech Solutions S.A.C.', tipo: 'Empresa', tipoDoc: 'RUC', documento: '20123456789', email: 'contacto@techsolutions.pe', telefono: '+51 1 234 5678', direccion: 'Av. Javier Prado Este 890', ciudad: 'Lima', estado: 'activo', compras: 45600, numCompras: 52, fechaRegistro: '2023-08-10', ultimaCompra: 'Hoy' },
  { id: 4, nombre: 'Carlos Mendoza Ruiz', tipo: 'Persona Natural', tipoDoc: 'DNI', documento: '45678912', email: 'carlos.mendoza@email.com', telefono: '+51 977 666 555', direccion: 'Calle Los Pinos 234', ciudad: 'Arequipa', estado: 'inactivo', compras: 3200, numCompras: 8, fechaRegistro: '2024-02-28', ultimaCompra: 'Hace 45 días' },
  { id: 5, nombre: 'Distribuidora Norte E.I.R.L.', tipo: 'Empresa', tipoDoc: 'RUC', documento: '20987654321', email: 'ventas@distnorte.com', telefono: '+51 44 567 890', direccion: 'Av. España 567, Centro', ciudad: 'Trujillo', estado: 'activo', compras: 28750, numCompras: 34, fechaRegistro: '2023-11-05', ultimaCompra: 'Hace 1 semana' },
  { id: 6, nombre: 'Ana Lucía Torres Vega', tipo: 'Persona Natural', tipoDoc: 'DNI', documento: '78912345', email: 'ana.torres@email.com', telefono: '+51 966 555 444', direccion: 'Urb. San Miguel Mz. B Lt. 12', ciudad: 'Lima', estado: 'activo', compras: 6780, numCompras: 12, fechaRegistro: '2024-04-02', ultimaCompra: 'Hace 3 días' },
  { id: 7, nombre: 'Roberto Sánchez Villa', tipo: 'Persona Natural', tipoDoc: 'CE', documento: 'CE123456', email: 'roberto.sv@email.com', telefono: '+51 955 444 333', direccion: 'Av. Brasil 321, Jesús María', ciudad: 'Lima', estado: 'inactivo', compras: 1500, numCompras: 4, fechaRegistro: '2024-05-10', ultimaCompra: 'Hace 60 días' },
  { id: 8, nombre: 'Importaciones Global S.A.', tipo: 'Empresa', tipoDoc: 'RUC', documento: '20567891234', email: 'info@impglobal.pe', telefono: '+51 1 987 6543', direccion: 'Zona Industrial Mz. K Lt. 5', ciudad: 'Callao', estado: 'activo', compras: 89400, numCompras: 67, fechaRegistro: '2023-06-18', ultimaCompra: 'Ayer' },
  { id: 9, nombre: 'Patricia Flores Medina', tipo: 'Persona Natural', tipoDoc: 'DNI', documento: '36925814', email: 'patricia.fm@email.com', telefono: '+51 944 333 222', direccion: 'Jr. Huancayo 789', ciudad: 'Huancayo', estado: 'activo', compras: 4350, numCompras: 9, fechaRegistro: '2024-06-01', ultimaCompra: 'Hace 1 semana' },
  { id: 10, nombre: 'Comercial Andina S.R.L.', tipo: 'Empresa', tipoDoc: 'RUC', documento: '20741852963', email: 'ventas@andina.pe', telefono: '+51 54 321 654', direccion: 'Av. Ejército 456', ciudad: 'Arequipa', estado: 'activo', compras: 32100, numCompras: 41, fechaRegistro: '2023-09-22', ultimaCompra: 'Hace 4 días' },
];

let currentPage = 1;
let itemsPerPage = 10;
let filteredData = [...clientesData];
let selectedClientId = null;
let selectedRows = new Set();

// ========== ELEMENTOS ==========
const $ = (sel) => document.querySelector(sel);
const $$ = (sel) => document.querySelectorAll(sel);

// ========== ANIMACIONES ==========
function initAnimations() {
  // Animar números de estadísticas
  $$('.stat-number').forEach(el => {
    const target = parseInt(el.dataset.value);
    const isCurrency = el.classList.contains('currency');
    animateNumber(el, target, isCurrency);
  });
}

function animateNumber(el, target, isCurrency = false) {
  const duration = 1500;
  const start = performance.now();
  
  function update(currentTime) {
    const elapsed = currentTime - start;
    const progress = Math.min(elapsed / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 4);
    const current = Math.floor(eased * target);
    
    if (isCurrency) {
      el.textContent = 'S/. ' + current.toLocaleString();
    } else {
      el.textContent = current.toLocaleString();
    }
    
    if (progress < 1) requestAnimationFrame(update);
  }
  
  requestAnimationFrame(update);
}

// ========== MODALES ==========
function initModals() {
  // Nuevo cliente
  $('#btnNuevoCliente').addEventListener('click', () => {
    $('#modalTitle').textContent = 'Nuevo Cliente';
    clearForm();
    openModal($('#modalCliente'));
  });
  
  // Cerrar modales
  $('#closeModal').addEventListener('click', () => closeModal($('#modalCliente')));
  $('#btnCancelar').addEventListener('click', () => closeModal($('#modalCliente')));
  $('#closeDetalle').addEventListener('click', () => closeModal($('#modalDetalle')));
  $('#btnCerrarDetalle').addEventListener('click', () => closeModal($('#modalDetalle')));
  $('#closeEliminar')?.addEventListener('click', () => closeModal($('#modalEliminar')));
  $('#btnCancelarEliminar').addEventListener('click', () => closeModal($('#modalEliminar')));
  
  // Guardar
  $('#btnGuardar').addEventListener('click', saveCliente);
  
  // Editar desde detalle
  $('#btnEditarDetalle').addEventListener('click', () => {
    closeModal($('#modalDetalle'));
    setTimeout(() => editCliente(selectedClientId), 300);
  });
  
  // Confirmar eliminar
  $('#btnConfirmarEliminar').addEventListener('click', () => {
    deleteCliente(selectedClientId);
    closeModal($('#modalEliminar'));
    showToast('success', 'Cliente eliminado', 'El cliente ha sido eliminado correctamente');
  });
  
  // Click fuera cierra modal
  $$('.modal-overlay').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal(modal);
    });
  });
  
  // Escape cierra modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      $$('.modal-overlay.show').forEach(closeModal);
    }
  });
}

function openModal(modal) {
  modal.classList.add('show');
  document.body.style.overflow = 'hidden';
  setTimeout(() => lucide.createIcons(), 50);
}

function closeModal(modal) {
  modal.classList.remove('show');
  document.body.style.overflow = '';
}

// ========== FILTROS ==========
function initFilters() {
  // Toggle filtros
  $('#btnFiltros').addEventListener('click', () => {
    $('#filtersPanel').classList.toggle('show');
    updateFilterCount();
  });  
  // Atajo de teclado
  document.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
      e.preventDefault();
      $('#searchClientes').focus();
    }
  });
  
  // Filtros
  $('#filterEstado').addEventListener('change', applyFilters);
  $('#filterTipo').addEventListener('change', applyFilters);
  $('#filterCiudad').addEventListener('change', applyFilters);
  
  // Limpiar
  $('#btnLimpiarFiltros').addEventListener('click', () => {
    $('#searchClientes').value = '';
    $('#filterEstado').value = '';
    $('#filterTipo').value = '';
    $('#filterCiudad').value = '';
    $('#filterFechaDesde').value = '';
    $('#filterFechaHasta').value = '';
    applyFilters();
  });
  
  // Aplicar filtros
  $('#btnAplicarFiltros')?.addEventListener('click', applyFilters);
  
  // Exportar
  $('#btnExportar').addEventListener('click', exportData);
  
  // Vista toggle
  $$('.view-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      $$('.view-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
}

function applyFilters() {
  const search = $('#searchClientes').value.toLowerCase().trim();
  const estado = $('#filterEstado').value;
  const tipo = $('#filterTipo').value;
  const ciudad = $('#filterCiudad').value;
  
  filteredData = clientesData.filter(c => {
    const matchSearch = !search || 
      c.nombre.toLowerCase().includes(search) ||
      c.documento.includes(search) ||
      c.email.toLowerCase().includes(search);
    
    const matchEstado = !estado || c.estado === estado;
    const matchTipo = !tipo || 
      (tipo === 'persona' && c.tipo === 'Persona Natural') ||
      (tipo === 'empresa' && c.tipo === 'Empresa');
    const matchCiudad = !ciudad || c.ciudad.toLowerCase() === ciudad.toLowerCase();
    
    return matchSearch && matchEstado && matchTipo && matchCiudad;
  });
  
  currentPage = 1;
  loadClientes();
  updateFilterCount();
}

function updateFilterCount() {
  let count = 0;
  if ($('#filterEstado').value) count++;
  if ($('#filterTipo').value) count++;
  if ($('#filterCiudad').value) count++;
  
  const badge = $('#filterCount');
  if (count > 0) {
    badge.textContent = count;
    badge.style.display = 'inline';
  } else {
    badge.style.display = 'none';
  }
}

function debounce(fn, wait) {
  let timeout;
  return (...args) => {
    clearTimeout(timeout);
    timeout = setTimeout(() => fn(...args), wait);
  };
}

// ========== TABLA ==========
function initTable() {
  // Select all
  $('#selectAll').addEventListener('change', (e) => {
    const checked = e.target.checked;
    $$('.row-checkbox input').forEach(cb => {
      cb.checked = checked;
      const id = parseInt(cb.closest('tr').dataset.id);
      checked ? selectedRows.add(id) : selectedRows.delete(id);
    });
    updateSelectionBar();
  });
  
  // Ordenar
  $$('.sortable').forEach(th => {
    th.addEventListener('click', () => sortTable(th.dataset.sort));
  });
  
  // Items per page
  $('#itemsPerPage')?.addEventListener('change', (e) => {
    itemsPerPage = parseInt(e.target.value);
    currentPage = 1;
    loadClientes();
  });
}

function loadClientes() {
  const start = (currentPage - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const pageData = filteredData.slice(start, end);
  
  $('#clientesTableBody').innerHTML = pageData.map(c => `
    <tr data-id="${c.id}">
      <td>
        <label class="custom-checkbox">
          <input type="checkbox" class="row-checkbox" ${selectedRows.has(c.id) ? 'checked' : ''}>
          <span class="checkmark"></span>
        </label>
      </td>
      <td>
        <div class="client-cell">
          <div class="client-avatar-sm">${getInitials(c.nombre)}</div>
          <div class="client-details">
            <span class="client-name">${c.nombre}</span>
            <span class="client-type">${c.tipo}</span>
          </div>
        </div>
      </td>
      <td>
        <div class="doc-info">
          <span class="doc-type">${c.tipoDoc}</span>
          <span class="doc-number">${c.documento}</span>
        </div>
      </td>
      <td>
        <div class="contact-cell">
          <span class="contact-item"><i data-lucide="mail"></i> <a href="mailto:${c.email}">${c.email}</a></span>
          <span class="contact-item"><i data-lucide="phone"></i> ${c.telefono}</span>
        </div>
      </td>
      <td>
        <div class="value-cell">
          <span class="value-currency">S/.</span> ${c.compras.toLocaleString()}
        </div>
      </td>
      <td>
        <div class="activity-cell">
          <span class="activity-time">${c.ultimaCompra}</span>
          <span class="activity-date">${c.numCompras} compras</span>
        </div>
      </td>
      <td>
        <span class="status-pill ${c.estado}">
          <i data-lucide="${c.estado === 'activo' ? 'check-circle' : 'x-circle'}"></i>
          ${c.estado === 'activo' ? 'Activo' : 'Inactivo'}
        </span>
      </td>
      <td>
        <div class="actions-cell">
          <button class="action-btn btn-ver" title="Ver detalle"><i data-lucide="eye"></i></button>
          <button class="action-btn btn-editar" title="Editar"><i data-lucide="edit-3"></i></button>
          <button class="action-btn danger btn-eliminar" title="Eliminar"><i data-lucide="trash-2"></i></button>
        </div>
      </td>
    </tr>
  `).join('');
  
  lucide.createIcons();
  bindTableEvents();
  updatePaginationInfo();
}

function bindTableEvents() {
  // Checkbox de fila
  $$('.row-checkbox input').forEach(cb => {
    cb.addEventListener('change', (e) => {
      const id = parseInt(e.target.closest('tr').dataset.id);
      e.target.checked ? selectedRows.add(id) : selectedRows.delete(id);
      updateSelectionBar();
    });
  });
  
  // Ver
  $$('.btn-ver').forEach(btn => {
    btn.addEventListener('click', (e) => {
      viewCliente(parseInt(e.target.closest('tr').dataset.id));
    });
  });
  
  // Editar
  $$('.btn-editar').forEach(btn => {
    btn.addEventListener('click', (e) => {
      editCliente(parseInt(e.target.closest('tr').dataset.id));
    });
  });
  
  // Eliminar
  $$('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', (e) => {
      confirmDelete(parseInt(e.target.closest('tr').dataset.id));
    });
  });
}

function updateSelectionBar() {
  const bar = $('#selectionBar');
  const count = selectedRows.size;
  
  if (count > 0) {
    bar.classList.add('show');
    bar.querySelector('.selection-count').textContent = count;
  } else {
    bar.classList.remove('show');
  }
}

function sortTable(key) {
  filteredData.sort((a, b) => {
    if (key === 'compras') return b.compras - a.compras;
    return a[key]?.localeCompare(b[key]) || 0;
  });
  loadClientes();
}

// ========== PAGINACIÓN ==========
function initPagination() {
  $('#firstPage')?.addEventListener('click', () => { currentPage = 1; loadClientes(); });
  $('#prevPage')?.addEventListener('click', () => { if (currentPage > 1) { currentPage--; loadClientes(); } });
  $('#nextPage')?.addEventListener('click', () => { 
    const total = Math.ceil(filteredData.length / itemsPerPage);
    if (currentPage < total) { currentPage++; loadClientes(); }
  });
  $('#lastPage')?.addEventListener('click', () => { 
    currentPage = Math.ceil(filteredData.length / itemsPerPage); 
    loadClientes(); 
  });
}

function updatePaginationInfo() {
  const total = filteredData.length;
  const totalPages = Math.ceil(total / itemsPerPage);
  const start = (currentPage - 1) * itemsPerPage + 1;
  const end = Math.min(currentPage * itemsPerPage, total);
  
  $('#totalResults').textContent = total.toLocaleString();
  
  // Números de página
  const container = $('#pageNumbers');
  if (!container) return;
  
  let pages = [];
  if (totalPages <= 5) {
    pages = Array.from({length: totalPages}, (_, i) => i + 1);
  } else {
    if (currentPage <= 3) pages = [1, 2, 3, 4, '...', totalPages];
    else if (currentPage >= totalPages - 2) pages = [1, '...', totalPages-3, totalPages-2, totalPages-1, totalPages];
    else pages = [1, '...', currentPage-1, currentPage, currentPage+1, '...', totalPages];
  }
  
  container.innerHTML = pages.map(p => 
    p === '...' 
      ? '<span class="page-dots">...</span>'
      : `<button class="page-btn ${p === currentPage ? 'active' : ''}" data-page="${p}">${p}</button>`
  ).join('');
  
  container.querySelectorAll('.page-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      currentPage = parseInt(btn.dataset.page);
      loadClientes();
    });
  });
  
  // Estados de botones
  $('#firstPage').disabled = currentPage === 1;
  $('#prevPage').disabled = currentPage === 1;
  $('#nextPage').disabled = currentPage === totalPages;
  $('#lastPage').disabled = currentPage === totalPages;
}

// ========== TABS ==========
function initTabs() {
  $$('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const tab = btn.dataset.tab;
      
      $$('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      
      $$('.tab-content').forEach(c => c.classList.remove('active'));
      $(`#tab-${tab}`).classList.add('active');
      
      lucide.createIcons();
    });
  });
}

// ========== CRUD ==========
function viewCliente(id) {
  const c = clientesData.find(x => x.id === id);
  if (!c) return;
  
  selectedClientId = id;
  
  $('#detalleAvatar').textContent = getInitials(c.nombre);
  $('#detalleNombre').textContent = c.nombre;
  $('#detalleDocumento').textContent = `${c.tipoDoc}: ${c.documento}`;
  $('#detalleEstado').innerHTML = `<i data-lucide="${c.estado === 'activo' ? 'check-circle' : 'x-circle'}"></i> ${c.estado === 'activo' ? 'Activo' : 'Inactivo'}`;
  $('#detalleEstado').className = `badge-premium ${c.estado === 'activo' ? 'active' : ''}`;
  $('#detalleTipo').innerHTML = `<i data-lucide="${c.tipo === 'Empresa' ? 'building-2' : 'user'}"></i> ${c.tipo}`;
  $('#detalleEmail').textContent = c.email;
  $('#detalleTelefono').textContent = c.telefono;
  $('#detalleDireccion').textContent = `${c.direccion}, ${c.ciudad}`;
  $('#detalleFecha').textContent = formatDate(c.fechaRegistro);
  $('#detalleTotalCompras').textContent = `S/. ${c.compras.toLocaleString()}`;
  $('#detalleNumCompras').textContent = c.numCompras;
  $('#detalleUltimaCompra').textContent = c.ultimaCompra;
  
  // Reset tabs
  $$('.tab-btn').forEach((b, i) => b.classList.toggle('active', i === 0));
  $$('.tab-content').forEach((c, i) => c.classList.toggle('active', i === 0));
  
  openModal($('#modalDetalle'));
}

function editCliente(id) {
  const c = clientesData.find(x => x.id === id);
  if (!c) return;
  
  selectedClientId = id;
  $('#modalTitle').textContent = 'Editar Cliente';
  
  $('#tipoDocumento').value = c.tipoDoc.toLowerCase();
  $('#numDocumento').value = c.documento;
  $('#nombreCliente').value = c.nombre;
  $('#emailCliente').value = c.email;
  $('#telefonoCliente').value = c.telefono;
  $('#direccionCliente').value = c.direccion;
  $('#ciudadCliente').value = c.ciudad;
  $('#estadoCliente').value = c.estado;
  
  openModal($('#modalCliente'));
}



async function buscarDocumento() {
    const inputDoc = document.getElementById('numDocumento');
    if (!inputDoc) {
        console.error("❌ No se encontró el input #numDocumento");
        return;
    }

    const numero = inputDoc.value.trim();

    if (!numero) {
        showToast('error', 'Error', 'Ingrese un número de documento');
        return;
    }

    // Detectar tipo según cantidad
    let tipo = null;
    if (numero.length === 8) tipo = "DNI";
    if (numero.length === 11) tipo = "RUC";

    if (!tipo) {
        showToast('error', 'Error', 'El documento debe tener 8 (DNI) o 11 (RUC) dígitos');
        return;
    }

    try {
        // Endpoint Laravel (AJUSTA SI NECESITA)
        const url = `/clientes/buscar/${tipo}/${numero}`;

        const response = await fetch(url, {
            headers: { "Accept": "application/json" }
        });

        // Si Laravel devuelve HTML → error 500 o 404
        if (!response.ok) {
            showToast('warning', 'No encontrado', 'No existe un cliente con este documento');
            return;
        }

        const result = await response.json();

        // Si viene vacío
        if (!result || !result.data) {
            showToast('warning', 'No encontrado', 'No hay datos registrados para este documento');
            return;
        }

        const c = result.data;

        // Rellenar datos del formulario
        document.getElementById('tipoDocumento').value = c.document_type.toLowerCase();
        document.getElementById('nombreCliente').value = c.name ?? c.business_name ?? "";
        document.getElementById('emailCliente').value = c.email ?? "";
        document.getElementById('telefonoCliente').value = c.phone ?? "";
        document.getElementById('direccionCliente').value = c.address ?? "";
        document.getElementById('distritoCliente').value = c.district ?? "";
        document.getElementById('ciudadCliente').value = c.province ?? "";
        document.getElementById('estadoCliente').value = c.status === "ACTIVE" ? "activo" : "inactivo";

        showToast('success', 'Datos encontrados', 'El cliente fue cargado correctamente');

    } catch (error) {
        console.error("❌ Error en la búsqueda:", error);
        showToast('error', 'Error', 'Hubo un problema realizando la búsqueda');
    }
}




async function saveCliente() {
  const documento = $('#numDocumento').value.trim();
  const tipoDocumento = $('#tipoDocumento').value.toUpperCase();

  // VALIDACIÓN DE LONGITUD
  if (tipoDocumento === "DNI" && documento.length !== 8) {
    showToast("error", "Error", "El DNI debe tener 8 dígitos");
    return;
  }

  if (tipoDocumento === "RUC" && documento.length !== 11) {
    showToast("error", "Error", "El RUC debe tener 11 dígitos");
    return;
  }

  let name = null;
  let lastname = null;
  let business_name = null;

  const nombreCompleto = $('#nombreCliente').value.trim();

  // SEPARAR NOMBRE Y APELLIDO SI ES PERSONA
  if (tipoDocumento === 'DNI') {
    const partes = nombreCompleto.split(" ");
    lastname = partes.slice(0, 2).join(" ") || null; // 2 apellidos
    name = partes.slice(2).join(" ") || null;       // nombre(s)
  }

  // RAZÓN SOCIAL SI ES EMPRESA
  if (tipoDocumento === 'RUC') {
    business_name = nombreCompleto;
  }

  const data = {
    type: tipoDocumento === 'RUC' ? 'COMPANY' : 'PERSON',
    document_type: tipoDocumento,
    document_number: documento,
    name,
    lastname,
    business_name,
    email: $('#emailCliente').value.trim(),
    phone: $('#telefonoCliente').value.trim(),
    address: $('#direccionCliente').value.trim(),
    district: $('#distritoCliente').value.trim(),
    province: $('#ciudadCliente').value.trim(),
    status: $('#estadoCliente').value === 'activo' ? 'ACTIVE' : 'INACTIVE'
  };

  // Validación final
  if (!data.document_number || (!data.name && !data.business_name)) {
    showToast("error", "Error", "Complete los campos obligatorios");
    return;
  }

  try {
    let url = '/clientes';
    let method = 'POST';

    if (selectedClientId) {
      url = `/clientes/${selectedClientId}`;
      method = 'PUT';
    }

    const response = await fetch(url, {
      method,
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify(data)
    });

    const result = await response.json();

    if (!response.ok) {
      showToast("error", "Error", result.message || "Error al guardar");
      return;
    }

    showToast(
      "success",
      selectedClientId ? "Cliente actualizado" : "Cliente creado",
      "Operación realizada correctamente"
    );

    closeModal($('#modalCliente'));
    selectedClientId = null;
    loadClientes();

  } catch (error) {
    console.error(error);
    showToast("error", "Error inesperado", "Hubo un problema en el servidor");
  }
}




function confirmDelete(id) {
  selectedClientId = id;
  openModal($('#modalEliminar'));
}

function deleteCliente(id) {
  const idx = clientesData.findIndex(c => c.id === id);
  if (idx !== -1) clientesData.splice(idx, 1);
  selectedClientId = null;
  selectedRows.delete(id);
  applyFilters();
}

function clearForm() {
  selectedClientId = null;
  $('#tipoDocumento').value = 'dni';
  $('#numDocumento').value = '';
  $('#nombreCliente').value = '';
  $('#emailCliente').value = '';
  $('#telefonoCliente').value = '';
  $('#direccionCliente').value = '';
  $('#distritoCliente').value = '';
  $('#ciudadCliente').value = '';
  $('#estadoCliente').value = 'activo';
  $('#notasCliente').value = '';
}

// ========== UTILIDADES ==========
function getInitials(name) {
  return name.split(' ').map(n => n[0]).slice(0, 2).join('').toUpperCase();
}

function formatDate(str) {
  const d = new Date(str);
  return d.toLocaleDateString('es-ES', { day: 'numeric', month: 'short', year: 'numeric' });
}

function exportData() {
  const csv = [
    ['Nombre', 'Tipo', 'Documento', 'Email', 'Teléfono', 'Ciudad', 'Estado', 'Total Compras'],
    ...filteredData.map(c => [c.nombre, c.tipo, `${c.tipoDoc}: ${c.documento}`, c.email, c.telefono, c.ciudad, c.estado, c.compras])
  ].map(r => r.join(',')).join('\n');
  
  const blob = new Blob([csv], { type: 'text/csv' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = `clientes_${new Date().toISOString().split('T')[0]}.csv`;
  a.click();
  URL.revokeObjectURL(url);
  
  showToast('success', 'Exportación completa', `Se exportaron ${filteredData.length} clientes`);
}

// ========== TOAST ==========
function showToast(type, title, message) {
  const container = $('#toastContainer');
  const id = Date.now();
  
  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.innerHTML = `
    <div class="toast-icon"><i data-lucide="${type === 'success' ? 'check' : type === 'error' ? 'x' : 'info'}"></i></div>
    <div class="toast-content">
      <div class="toast-title">${title}</div>
      <div class="toast-message">${message}</div>
    </div>
    <button class="toast-close"><i data-lucide="x"></i></button>
  `;
  
  container.appendChild(toast);
  lucide.createIcons();
  
  toast.querySelector('.toast-close').addEventListener('click', () => toast.remove());
  setTimeout(() => toast.remove(), 5000);
}