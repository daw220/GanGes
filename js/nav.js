/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
      // Abrir/cerrar sidebar
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('body').toggleClass('sidebar-active');
      });

      // Cerrar sidebar al hacer clic en la página
      $('#cerrar').on('click', function() {
        $('#sidebar').removeClass('active');
        $('body').removeClass('sidebar-active');
      });

      // Cerrar sidebar al hacer clic en la página
      $(document).on('mousedown', function(ev) {

      // Verifica si el clic se realizó fuera del menú desplegable y del botón de activación
      if (!$('#sidebar').is(ev.target) && $('#sidebar').has(ev.target).length === 0 &&
      !$('#sidebarCollapse').is(ev.target) && $('#sidebarCollapse').has(ev.target).length === 0) 
      {
        $('#sidebar').removeClass('active');
        $('body').removeClass('sidebar-active');
      }
        
      });

      // Habilitar submenus
      $('.dropdown-submenu a.dropdown-toggle').on('click', function(e) {
        $(this).next('ul').toggle();
      });
    });