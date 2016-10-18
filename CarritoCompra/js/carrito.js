
/* Creado por: Asier Martinez */

	/* Objeto tipo carrito que va contener todos los elementos que se añadan */

	var Carrito = function() {

	    this.productos = [];
	    var auxb = false;

	    this.add = function(producto){
	    	if (this.productos.length == 0) {
	    		this.productos.push(producto);
	    		return this.productos; 
	    	};
			for (var i = 0; i < this.productos.length; i++) {
				if (producto.nombre == this.productos[i].nombre ) {
		       		this.productos[i].cantidad += 1;
		       		return this.productos; 
		        };
		    };
		    this.productos.push(producto);
			return this.productos; 
		    	    

	    }

	    /* Funcion para borrar un producto del carrito 

	    this.remove = function(producto){
	    	for (var i = 0; i < this.productos.length; i++) {
	    		if (producto.nombre == this.productos[i].nombre) {
	    			this.productos.splice(i, 1);
	    		};
	    	}
	    	Carrito.mostrarCarrito();
	    	return this.productos;
	    }*/
	    /* Funcion para vaciar todo el carrito */

	    this.vaciar = function(){
	    	this.productos.splice(0,this.productos.length);
	    	Carrito.mostrarCarrito();
	    	return this.productos;
	    }


	    this.get = function() {
	    	return this.productos;
		};
		 
		this.set = function(productos) {
		    this.productos = productos;
		};

		/* Funcion para obtener la suma total de precios */

		this.getTotal = function() {
		    var total = 0;
		    $.each(this.productos, function(i,value) {
		        total += value.precio*value.cantidad;

		    });
		    return total;
		};
		
		/* Funcion para mostrar los elementos del carrito y lasuma total */
		this.mostrarCarrito = function() {
		    $(".carrito").empty();
		    $.each(this.productos, function(i,value) {
		        $(".carrito").append('<div class="nombrePrecio"><p><b>Cantidad: </b>' + value.cantidad +'</p><p><b>Producto: </b>' + value.nombre +'</p><p><b>Precio: </b>' + value.precio + '€ </p></div><hr size=1 width= 100%% align=center>');
		    });
		    $(".carrito").append('<br/><h4>Precio Total: ' + this.getTotal() + '</h4><br/><input type="button" value="Check-out" class="checkout" onclick="Carrito.realizarPedido()"><input type="button" value="Vaciar carrito" class="vaciar" onclick="Carrito.vaciar()">');
		}; 

		this.realizarPedido = function(){
	        window.location.href  = "checkout.html?"+this.getTotal();
    	}
	}

	$(document).ready(function(){


		Carrito = new Carrito();

		$('.comprar').click(function(){
		    var producto = {
		        'nombre': $(this).attr('nombre'),
			    'precio': parseFloat($(this).attr('precio')),
			    'cantidad': 1
			}

		    Carrito.add(producto);
			Carrito.mostrarCarrito();

		});


		/* Para recopilar el precio total en la pagina check Out */

		var url = window.location.search.substring(1);
		$("#ptotal").append('<h3> Precio total: ' + url + '</h3>');


		/* Validacion Formulario */

	    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	    var dnireg = /^\d{8}[a-zA-Z]{1}$/;
	    var telefonoreg = /^[0-9]{9}$/;
	    var visareg =  /^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/;

	    $(".boton").click(function (){

	        $(".fallo").remove();
	        if( $(".nombre").val() == "" ){
	            $(".nombre").focus().after("<span class='fallo'>Ingrese su nombre</span>");
	            return false;
	        } else if( $(".email").val() == "" || !emailreg.test($(".email").val())){
	            $(".email").focus().after("<span class='fallo'>Ingrese un email correcto</span>");
	            return false;
	        } else if($(".telefono").val() == "" || !telefonoreg.test($(".telefono").val())){
	            $(".telefono").focus().after("<span class='fallo'>Ingrese un telefono correcto</span>");
	            return false;
	        } else if( $(".dni").val() == "" || !dnireg.test($(".dni").val())){
	            $(".dni").focus().after("<span class='fallo'>Ingrese un DNI correcto</span>");
	            return false;
	        } else if( $(".tcredito").val() == "" || !visareg.test($(".tcredito").val())){
	            $(".tcredito").focus().after("<span class='fallo'>Numero incorrecto</span>");
	            return false;
	        } else {
	        	alert("¡Compra realizada!");
	        }
	    });

	    /* Funciones para quitar el mensaje de error una vez que el campo esta correctamente rellenado */
	    
	    $(".nombre").keyup(function(){
	        if( $(this).val() != "" ){
	            $(".fallo").fadeOut();
	            return false;
	        }
	    });
	    $(".email").keyup(function(){
	        if( $(this).val() != "" && emailreg.test($(this).val())){
	            $(".fallo").fadeOut();
	            return false;
	        }
	    });
	    $(".telefono").keyup(function(){
	        if( $(this).val() != "" && telefonoreg.test($(this).val())){
	            $(".fallo").fadeOut();
	            return false;
	        }
	    });
	   	$(".dni").keyup(function(){
	        if( $(this).val() != "" && dnireg.test($(this).val())){
	            $(".fallo").fadeOut();
	            return false;
	        }
	    $(".tcredito").keyup(function(){
	        if( $(this).val() != "" && visareg.test($(this).val())){
	            $(".fallo").fadeOut();
	            return false;
	        }
	    });	

	});
});




