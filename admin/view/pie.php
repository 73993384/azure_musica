
        </div>
		  </main>
		</div>
	</div>
	<script src="assets/js/app.js"></script>
	<!-- JQUERY PLUGIN JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<!-- DATATABLE PLUGIN JS -->
	<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
	<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
	<!-- SELECT2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- SWEETALERT2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
	<!-- LightBox js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		$(".select2-modal").each(function() {
			const $this = $(this);
			$this.select2({
				width: "100%",
				dropdownParent: $this.parent()
			});
		});
	</script>
	<script>
		$('.datatable-artista').DataTable({
			pageLength : 10,
			lengthMenu: [
				[5, 10, 25, 50, -1],
				['5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo']
			],
			responsive: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				{	extend: 'pageLength',	className: 'btn btn-info',	text: 'filtro listado',	titleAttr: 'filtrado'},
				{	text: 'Agregar Artista',	titleAttr: 'Agregar Artista',	className: 'btn btn-warning',attr:{'data-bs-toggle':'modal','data-bs-target':'#Agregar_Artista_Modal'}}
			]
		});
	</script>
	<script>
		$('.datatable-genero').DataTable({
			pageLength : 10,
			lengthMenu: [
				[5, 10, 25, 50, -1],
				['5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo']
			],
			responsive: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				{	extend: 'pageLength',	className: 'btn btn-info',	text: 'filtro listado',	titleAttr: 'filtrado'},
				{	text: 'Agregar Genero',	titleAttr: 'Agregar Genero',	className: 'btn btn-warning',attr:{'data-bs-toggle':'modal','data-bs-target':'#Agregar_Genero_Modal'}}
			]
		});
	</script>
	<script>
		$('.datatable-album').DataTable({
			pageLength : 10,
			lengthMenu: [
				[5, 10, 25, 50, -1],
				['5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo']
			],
			responsive: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				{	extend: 'pageLength',	className: 'btn btn-info',	text: 'filtro listado',	titleAttr: 'filtrado'},
				{	text: 'Agregar Album',	titleAttr: 'Agregar Album',	className: 'btn btn-warning',attr:{'data-bs-toggle':'modal','data-bs-target':'#Agregar_Album_Modal'}}
			]
		});
	</script>
	<script>
		$('.datatable-cancion').DataTable({
			pageLength : 10,
			lengthMenu: [
				[5, 10, 25, 50, -1],
				['5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo']
			],
			responsive: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				{	extend: 'pageLength',	className: 'btn btn-info',	text: 'filtro listado',	titleAttr: 'filtrado'},
				{	text: 'Agregar Cancion',	titleAttr: 'Agregar Cancion',	className: 'btn btn-warning',attr:{'data-bs-toggle':'modal','data-bs-target':'#Agregar_Cancion_Modal'}}
			]
		});
	</script>
	<script>
		$('.datatable-playlist').DataTable({
			pageLength : 10,
			lengthMenu: [
				[5, 10, 25, 50, -1],
				['5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo']
			],
			responsive: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				{	extend: 'pageLength',	className: 'btn btn-info',	text: 'filtro listado',	titleAttr: 'filtrado'},
				{	text: 'Agregar Playlist',	titleAttr: 'Agregar Playlist',	className: 'btn btn-warning',attr:{'data-bs-toggle':'modal','data-bs-target':'#Agregar_Playlist_Modal'}}
			]
		});
	</script>
	<script>
		$('.datatable-').DataTable({
			pageLength : 10,
			lengthMenu: [
				[ 5,10, 25, 50, -1 ],
				[ '5 filas', '10 filas', '25 filas', '50 filas', 'Listar Todo' ]
			],
			responsive: true,
			language:{
				url: "//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"
			},
			dom: 'Bfrtip',
			buttons: [
				//{ extend: 'csv', className: 'btn btn-success', titleAttr: 'CSV'},
				{ extend: 'pageLength', className: 'btn btn-info', text:'filtro listado', titleAttr: 'filtrado'},
				{ extend: 'excel', className: 'btn btn-success',text: '<i class="fa-regular fa-file-excel"></i>', titleAttr: 'EXCEL'},
				{ extend: 'pdf', className: 'btn btn-danger', text:'<i class="fa-regular fa-file-pdf"></i>', titleAttr: 'PDF'},
				{ extend: 'print', className: 'btn btn-warning', text:'<i class="fa-solid fa-print"></i>', titleAttr: 'PRINT'},
			]
		});
	</script>
	<!-- Modal Valores -->
	<script>
		$(".btn-detalle-artista").click(async function() {
			let id = $(this).attr('data_codigo_artista');
			let nombre = $(this).attr('data_nombre');
			let imagen = "../" + $(this).attr('data_imagen');
			let nacionalidad = $(this).attr('data_nacionalidad');
			$("#codigo_artista").val(id);
			$("#nombre").val(nombre);
			$("#nacionalidad").val(nacionalidad);
			$('#imagen').attr('src',imagen);
		});
		$(".btn-detalle-genero").click(async function() {
			let id = $(this).attr('data_codigo_genero');
			let nombre = $(this).attr('data_nombre');
			$("#codigo_genero").val(id);
			$("#nombre").val(nombre);
		});
		$(".btn-detalle-album").click(async function() {
			let id = $(this).attr('data_codigo_album');
			let nombre = $(this).attr('data_nombre');
			let imagen = "../" + $(this).attr('data_imagen');
			let descripcion = $(this).attr('data_descripcion');
			$("#codigo_album").val(id);
			$("#nombre").val(nombre);
			$('#imagen').attr('src',imagen);
			$("#descripcion").val(descripcion);
		});
	</script>
	<script>
		function confirma (url) {
			Swal.fire({
        title: "Eliminar",
        text: "¿Deseas Eliminar este Elemento?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
				confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
			})
			.then(resultado => {
        if (resultado.value) {
					//location.replace(url);
					Swal.fire({
						title: 'Eliminado!',
						text: 'El Elemento se Elimino Correctamente.',
						icon: 'success',
						confirmButtonText: "OK",
  					closeOnConfirm: false,
						closeOnClickOutside: false
					}).then(function() {
            location.replace(url);
          });
				}
    	});
		}
	</script>
</body>
</html>