// TOGGLE DE LOS MENÚS
document.querySelectorAll('.menuDesplegableBoton').forEach(btn =>{
  btn.addEventListener('click', e => {
    const menuDesplegable = btn.parentElement;
    menuDesplegable.classList.toggle('abierto');

// CIERRA LOS DEMÁS
document.querySelectorAll('.menuDesplegable').forEach(d =>{
  if (d !== menuDesplegable) d.classList.remove('abierto');
  });
  });
});

// CERRAR AL HACER CLICK FUERA
document.addEventListener('click', e =>{
  if (!e.target.closest('.menuDesplegable')) {
      document.querySelectorAll('.menuDesplegable').forEach(d => d.classList.remove('abierto'));
      }
  });
