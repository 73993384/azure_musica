<?php
$codigo_genero = $_POST['codigo_genero'] ?? " ";
?>
<div class="card">
  <div class="card-header bg-dark">
    <h1 class="h3 mb-3 text-white"><strong>Listar Artistas</strong></h1>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="row my-4">
        <div class="form-group col-md-5">
          <label for="autor">Genero:</label>
          <select class="select2-modal form-control" name="codigo_genero" required>
            <?php foreach ($this->genero->Listar_Generos() as $g) : ?>
              <option value="<?php echo $g->codigo_genero; ?>" <?php if ($codigo_genero == $g->codigo_genero) echo "selected"; ?>>
                <?php echo $g->nombre; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <input type="submit" name="Buscar" class="btn btn-primary mt-3" value="Guardar" />
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table datatable-artista mt-5 display nowrap" style="width:100%">
        <thead class="table-dark">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Genero</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">Nacionalidad</th>
            <th class="text-center">Fecha Actualizacion</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php foreach ($this->model->Listar_Artistas($codigo_genero) as $r) : ?>
            <tr>
              <td><?php echo $r->codigo_artista; ?></td>
              <td><?php echo $r->nombre; ?></td>
              <td><?php echo $r->genero; ?><br></td>
              <td><img src="<?php echo "../" . $r->imagen; ?>" class="mx-auto" height="100px"></td>
              <td><?php echo $r->nacionalidad; ?></td>
              <td><?php echo $r->fecha_actualizacion; ?></td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <button type="button" class="btn-detalle-artista" data-bs-toggle="modal" data-bs-target="#Editar_Artista_Modal" data_codigo_artista="<?php echo $r->codigo_artista; ?>" data_nombre="<?php echo $r->nombre; ?>" data_imagen="<?php echo $r->imagen; ?>" data_nacionalidad="<?php echo $r->nacionalidad; ?>" style="background-color: transparent;border: none;">
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
<!-- Modal Agregar Artista-->
<div class="modal fade" id="Agregar_Artista_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">AGREGAR ARTISTA</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=artista&a=Agregar_Artista" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre del Artista" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="codigo_genero" class="form-label">Genero</label>
                <select class="select2-modal form-control" name="codigo_genero" required>
                  <?php foreach ($this->genero->Listar_Generos() as $g) : ?>
                    <option value="<?php echo $g->codigo_genero; ?>">
                      <?php echo $g->nombre; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" placeholder="Ingrese la Nacionalidad del Artista" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Agregar Artista</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Editar Artista-->
<div class="modal fade" id="Editar_Artista_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">EDITAR ARTISTA</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=artista&a=Editar_Artista" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <input type="hidden" name="codigo_artista" id="codigo_artista">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="codigo_genero" class="form-label">Genero</label>
                <select class="select2-modal form-control" name="codigo_genero" required>
                  <?php foreach ($this->genero->Listar_Generos() as $g) : ?>
                    <option value="<?php echo $g->codigo_genero; ?>" <?php if ($codigo_genero == $g->codigo_genero) echo "selected"; ?>>
                      <?php echo $g->nombre; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
                <div class="m-1">
                  <img id="imagen" class="mx-auto" height="190px">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Editar Artista</button>
        </div>
      </form>
    </div>
  </div>
</div>