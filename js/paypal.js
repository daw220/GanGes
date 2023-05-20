'use strict'

function inicio(){

   
      $.get("../operaciones/accesoOperations.php?accion=1", (data) => {
        
        if(data != " ")
        {
            let div = document.getElementById("explo");
            div.classList.remove("d-none");
            div.classList.add("d-flex")
            div.classList.add("justify-content-center")
            div.classList.add("align-items-center");
            div.classList.add("mt-5");
            div.classList.add("mx-5");
            let nombre = document.getElementById("nombre");
            nombre.innerHTML=data;

            let btnb = document.getElementById("botonBasico");
            btnb.setAttribute("disabled",true);
            let btna= document.getElementById("botonAvanzado");
            btna.setAttribute("disabled",true);

            $.get("../operaciones/accesoOperations.php?accion=2", (data) => { 
            
                if(data == 1)
                {
                    paypal.Buttons({
                        style: {
                          layout: 'horizontal',
                          color:  'black',
                          shape:  'rect',
                          label:  'paypal'
                        },                       
                        onInit: function(data, actions) {
                            // Deshabilitar el botón de PayPal
                            actions.disable();
                        }
                
                      }).render('#botonBasico');
                      paypal.Buttons({
                        style: {
                          layout: 'horizontal',
                          color:  'blue',
                          shape:  'rect',
                          label:  'paypal'
                        },
                        createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{
                                amount: {
                                    value: '89.99'  
                                }
                              }]
                            });
                          },
                        onApprove(data) {
                            $.get("../operaciones/accesoOperations.php?accion=0&rol=2", (data) => {
                                if(data ==1)
                                {
                                    location.reload();
                                }
                            });
                        },
                        onCancel(data){
                            console.log("cancel")
                        },
                        onError(data){
                            console.log("fallo")
                        }
                
                
                      }).render('#botonAvanzado');
                
                        
                
                }
                else
                {
                    paypal.Buttons({
                        style: {
                          layout: 'horizontal',
                          color:  'black',
                          shape:  'rect',
                          label:  'paypal'
                        },
                        onInit: function(data, actions) {
                            // Deshabilitar el botón de PayPal
                            actions.disable();
                        }
                
                      }).render('#botonBasico');
                      paypal.Buttons({
                        style: {
                          layout: 'horizontal',
                          color:  'black',
                          shape:  'rect',
                          label:  'paypal'
                        },                        
                        onInit: function(data, actions) {
                            // Deshabilitar el botón de PayPal
                            actions.disable();
                        }                
                
                      }).render('#botonAvanzado');
                }
                
            });
        }
        else
        {
            paypal.Buttons({
                style: {
                  layout: 'horizontal',
                  color:  'blue',
                  shape:  'rect',
                  label:  'paypal'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                            value: '49.99'
                        }
                      }]
                    });
                  },
                onApprove: function(data, actions) {
                    $.get("../operaciones/accesoOperations.php?accion=0&rol=1", (data) => {
                        if(data ==1)
                        {
                            location.reload();
                        }
                    });
                },
                onCancel: function(data, actions) {
                    console.log("cancel")
                },
                onError: function(data, actions) {
                    console.log("fallo")
                }
              }).render('#botonBasico');

              paypal.Buttons({
                style: {
                  layout: 'horizontal',
                  color:  'blue',
                  shape:  'rect',
                  label:  'paypal'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                            value: '89.99'  
                        }
                      }]
                    });
                  },
                onApprove(data) {
                    $.get("../operaciones/accesoOperations.php?accion=0&rol=2", (data) => {
                        if(data ==1)
                        {
                            location.reload();
                        }
                    });
                },
                onCancel(data){
                    console.log("cancel")
                },
                onError(data){
                    console.log("fallo")
                }
        
        
              }).render('#botonAvanzado');
        
        }
        

        
    });
}



window.onload = inicio;