// ===============================================================
// ===============  PANEL.js — NEXUSPANEL FINAL  =================
// ===============================================================

// Ejecutar cuando el DOM está listo
document.addEventListener("DOMContentLoaded", () => {
  lucide.createIcons(); // Cargar iconos iniciales
});

// Obtener elementos del DOM
function getElements() {
  return {
    sidebar: document.getElementById("sidebar"),
    notifDropdown: document.getElementById("notifDropdown"),
    profileDropdown: document.getElementById("profileDropdown"),
    overlay: document.getElementById("overlay"), // opcional si luego lo agregas
  };
}

// ===============================================================
// ========== FUNCIONES GLOBALES QUE EL HTML REQUIERE ============
// ===============================================================

// Abrir / cerrar sidebar (desktop/móvil)
function toggleSidebar() {
  const { sidebar } = getElements();

  if (!sidebar) return;

  if (window.innerWidth <= 768) {
    sidebar.classList.toggle("mobile-open");
  } else {
    sidebar.classList.toggle("collapsed");
  }
}

// Toggle del dropdown de Notificaciones
function toggleNotif(event) {
  event?.stopPropagation();

  const { notifDropdown, profileDropdown } = getElements();

  if (!notifDropdown) return;

  profileDropdown.classList.remove("show");
  notifDropdown.classList.toggle("show");

  setTimeout(() => lucide.createIcons(), 10);
}

// Toggle del dropdown de Perfil
function toggleProfile(event) {
  event?.stopPropagation();

  const { profileDropdown, notifDropdown } = getElements();

  if (!profileDropdown) return;

  notifDropdown.classList.remove("show");
  profileDropdown.classList.toggle("show");

  setTimeout(() => lucide.createIcons(), 10);
}

// Abrir/cerrar submenús laterales (Facturación, etc.)
function toggleSubmenu(element) {
  if (!element) return;

  element.classList.toggle("open");

  const submenu = element.nextElementSibling;

  if (submenu && submenu.classList.contains("submenu")) {
    submenu.classList.toggle("open");
  }
}

// ===============================================================
// ============ CERRAR DROPDOWNS AL CLIC FUERA ===================
// ===============================================================

document.addEventListener("click", function (e) {
  const { notifDropdown, profileDropdown } = getElements();

  if (!notifDropdown || !profileDropdown) return;

  // Cerrar notificaciones si clic fuera
  if (!e.target.closest(".notification-wrapper")) {
    notifDropdown.classList.remove("show");
  }

  // Cerrar perfil si clic fuera
  if (!e.target.closest(".profile")) {
    profileDropdown.classList.remove("show");
  }
});

// ===============================================================
// ============== OPCIONAL: cerrar sidebar móvil =================
// ===============================================================

function closeSidebarMobile() {
  const { sidebar } = getElements();
  if (sidebar) sidebar.classList.remove("mobile-open");
}

// Cerrar sidebar móvil al cambiar tamaño
window.addEventListener("resize", () => {
  const { sidebar } = getElements();

  if (!sidebar) return;

  if (window.innerWidth > 768) {
    sidebar.classList.remove("mobile-open");
  }
});

