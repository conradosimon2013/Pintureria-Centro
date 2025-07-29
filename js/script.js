  const dropdown = document.getElementById('dropdown-categorias');
  const trigger = document.getElementById('dropdownCategorias');
  const menu = document.getElementById('menu-categorias');

  let timer;

  function showDropdown() {
    dropdown.classList.add('show');
    menu.classList.add('show');
  }

  function hideDropdown() {
    dropdown.classList.remove('show');
    menu.classList.remove('show');
  }

  dropdown.addEventListener('mouseenter', () => {
    clearTimeout(timer);
    showDropdown();
  });

  dropdown.addEventListener('mouseleave', () => {
    timer = setTimeout(() => {
      hideDropdown();
    }, 300); // espera 300ms antes de cerrar
  });