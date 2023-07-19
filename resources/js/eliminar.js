const form_delete=document.getElementById('formEliminar');
const form_submit=document.getElementById('btnEliminar');

const eliminarProducto = (evt) =>{
	evt.preventDefault();
	if(confirm('¿Esta seguro de eliminar este producto?')){
		form_delete.submit();
	}
}

form_submit.addEventListener('click', eliminarProducto);