<?php
$codigo_genero = $_POST['codigo_genero'] ?? "1";
$codigo_artista = $_POST['codigo_artista'] ?? " ";

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
        <div class="form-group col-md-5">
          <label for="autor">Artista:</label>
          <select class="select2-modal form-control" name="codigo_artista" >
            <?php foreach ($this->artista->Listar_Artistas($codigo_genero) as $a) : ?>
              <option value="<?php echo $a->codigo_artista; ?>" <?php if ($codigo_artista == $a->codigo_artista) echo "selected"; ?>>
                <?php echo $a->nombre; ?>
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
      <table class="table datatable-album mt-5 display nowrap" style="width:100%">
        <thead class="table-dark">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Genero</th>
            <th class="text-center">Artista</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">Fecha Actualizacion</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php foreach ($this->model->Listar_Albums($codigo_genero,$codigo_artista) as $r) : ?>
            <tr>
              <td><?php echo $r->codigo_album; ?></td>
              <td><?php echo $r->nombre; ?></td>
              <td><?php echo $r->genero; ?><br></td>
              <td><?php echo $r->artista; ?></td>
              <td><img src="<?php echo "../" . $r->imagen; ?>" class="mx-auto" height="100px"></td>
              <td><?php echo $r->fecha_actualizacion; ?></td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <button type="button" class="btn-detalle-album" data-bs-toggle="modal" data-bs-target="#Editar_Album_Modal" 
                    data_codigo_album="<?php echo $r->codigo_album; ?>" data_nombre="<?php echo $r->nombre; ?>" 
                    data_imagen="<?php echo $r->imagen; ?>" data_descripcion="<?php echo $r->descripcion; ?>" 
                    style="background-color: transparent;border: none;">
                    <i class="fa-solid fa-pen-to-square fa-2x text-primary"></i>
                  </button>
                  <!-- <a href="JavaScript:confirma('?c=artista&a=Eliminar_Artista&id=<?php echo $r->codigo_album; ?>')"><i class="fa-solid fa-trash fa-2x text-danger"></i></a> -->
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal Agregar Album-->
<div class="modal fade" id="Agregar_Album_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">AGREGAR ALBUM</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=album&a=Agregar_Album" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre del Album" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="codigo_artista" class="form-label">Artista</label>
                <select class="select2-modal form-control" name="codigo_artista" required>
                  <?php foreach ($this->artista->Listar_Artistas_() as $a) : ?>
                    <option value="<?php echo $a->codigo_artista; ?>">
                      <?php echo $a->nombre; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3"></textarea>
              </div>
            </div>
            <!-- <div class="col-md-12">
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
            </div> -->
            <div class="col-md-12">
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Agregar Album</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Editar Album-->
<div class="modal fade" id="Editar_Album_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">EDITAR ALBUM</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=album&a=Editar_Album" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <input type="hidden" name="codigo_album" id="codigo_album">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="codigo_artista" class="form-label">Artista</label>
                <select class="select2-modal form-control" name="codigo_artista" required>
                  <?php foreach ($this->artista->Listar_Artistas_() as $a) : ?>
                    <option value="<?php echo $a->codigo_artista; ?>" <?php if ($codigo_artista == $a->codigo_artista) echo "selected"; ?>>
                      <?php echo $a->nombre; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" id="descripcion"></textarea>
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
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Editar Album</button>
        </div>
      </form>
    </div>
  </div>
</div>