<div class="card">
  <div class="card-header bg-dark">
    <h1 class="h3 mb-3 text-white"><strong>Listar Generos</strong></h1>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table datatable-genero mt-5 display nowrap" style="width:100%">
        <thead class="table-dark">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Fecha Actualizacion</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php foreach ($this->model->Listar_Generos() as $r) : ?>
            <tr>
              <td><?php echo $r->codigo_genero; ?></td>
              <td><?php echo $r->nombre; ?><br></td>
              <td><?php echo $r->fecha_actualizacion; ?></td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <button type="button" class="btn-detalle-genero" data-bs-toggle="modal" data-bs-target="#Editar_Genero_Modal" 
                    data_codigo_genero="<?php echo $r->codigo_genero; ?>" data_nombre="<?php echo $r->nombre; ?>" 
                    style="background-color: transparent;border: none;">
                    <i class="fa-solid fa-pen-to-square fa-2x text-primary"></i>
                  </button>
                  <!-- <a href="JavaScript:confirma('?c=artista&a=Eliminar_Artista&id=<?php echo $r->codigo_artista; ?>')"><i class="fa-solid fa-trash fa-2x text-danger"></i></a> -->
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal Agregar Genero-->
<div class="modal fade modal-sm" id="Agregar_Genero_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">AGREGAR GENERO</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=genero&a=Agregar_Genero" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre del Genero" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Agregar Genero</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Genero-->
<div class="modal fade modal-sm" id="Editar_Genero_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">EDITAR GENERO</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=genero&a=Editar_Genero" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <input type="hidden" name="codigo_genero" id="codigo_genero">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre del Genero" id="nombre" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Editar Genero</button>
        </div>
      </form>
    </div>
  </div>
</div>