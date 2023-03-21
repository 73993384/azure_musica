<?php
$codigo_album = $_POST['codigo_album'] ?? " ";
?>
<div class="card">
  <div class="card-header bg-dark">
    <h1 class="h3 mb-3 text-white"><strong>Listar Canciones</strong></h1>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="row my-4">
        <div class="form-group col-md-5">
          <label for="autor">Album:</label>
          <select class="select2-modal form-control" name="codigo_album">
            <?php foreach ($this->album->Listar_Albums_1() as $al) : ?>
              <option value="<?php echo $al->codigo_album; ?>" <?php if ($codigo_album == $al->codigo_album) echo "selected"; ?>>
                <?php echo $al->artista." - ".$al->nombre; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <input type="submit" name="Buscar" class="btn btn-primary mt-3" value="Buscar" />
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table datatable-cancion mt-5 display nowrap" style="width:100%">
        <thead class="table-dark">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre - Duracion</th>
            <th class="text-center">Album</th>
            <th class="text-center">Cancion</th>
            <th class="text-center">Fecha Actualizacion</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php foreach ($this->model->Listar_Canciones($codigo_album) as $r) : ?>
            <tr>
              <td><?php echo $r->codigo_cancion; ?></td>
              <td><?php echo $r->nombre." - ".$r->duracion; ?></td>
              <td><?php echo $r->artista." - ". $r->album; ?></td>
              <td>
                <audio controls>
                  <source src="../assets/cancion/<?php echo $r->audio; ?>">
                </audio>
              </td>
              <td><?php echo $r->fecha_actualizacion; ?></td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <a href="?c=cancion&a=Detalle_Cancion&id=<?php echo $r->codigo_cancion; ?>"><i class="fa-solid fa-pen-to-square fa-2x text-primary"></i></a>
                  <!-- <a href="JavaScript:confirma('?c=artista&a=Eliminar_Artista&id=<?php echo $r->codigo_cancion; ?>')"><i class="fa-solid fa-trash fa-2x text-danger"></i></a> -->
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
<div class="modal fade" id="Agregar_Cancion_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white ">
        <h5 class="modal-title text-white">AGREGAR CANCION</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="?c=cancion&a=Agregar_Cancion" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre de la Cancion" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="duracion" class="form-label">Duracion</label>
                <input type="text" class="form-control" name="duracion" placeholder="Ingrese la Duracion de la Cancion" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="codigo_album" class="form-label">Album</label>
                <select class="select2-modal form-control" name="codigo_album" required>
                <?php foreach ($this->album->Listar_Albums_1() as $al) : ?>
                  <option value="<?php echo $al->codigo_album; ?>">
                    <?php echo $al->artista." - ".$al->nombre; ?>
                  </option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="audio" class="form-label">Audio</label>
                <input type="file" class="form-control" name="audio" accept=".mp3,audio/*" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" type="submit">Agregar Cancion</button>
        </div>
      </form>
    </div>
  </div>
</div>