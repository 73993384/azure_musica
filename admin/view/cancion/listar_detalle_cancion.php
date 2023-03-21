<div class="card border">
  <div class="card-header bg-dark">
    <h4 class="text-white"><strong>Detalle Cancion</strong></h4>
  </div>
  <div class="card-body">
    <div class="container-fluid">
      <form action="?c=cancion&a=Editar_Cancion" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <div class="mb-3">
              <input type="hidden" class="form-control" name="codigo_cancion" value="<?php echo $r->codigo_cancion; ?>">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="<?php echo $r->nombre; ?>">
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="mb-3">
              <label for="duracion" class="form-label">Duracion</label>
              <input type="text" class="form-control" name="duracion" value="<?php echo $r->duracion; ?>">
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="mb-3">
              <label for="precio" class="form-label">Album</label>
              <select class="select2-modal form-control" name="codigo_album" required>
                <?php foreach ($this->album->Listar_Albums_1() as $al) : ?>
                  <option value="<?php echo $al->codigo_album; ?>" <?php if ($r->codigo_album == $al->codigo_album) echo "selected"; ?>>
                    <?php echo $al->artista . " - " . $al->nombre; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="mb-3">
              <label for="duracion" class="form-label">Audio</label>
              <input type="file" class="form-control" name="audio"><br>
              <?php if (isset($r->audio)) : ?>
                <audio controls>
                  <source src="../assets/cancion/<?php echo $r->audio; ?>">
                </audio>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="d-grid gap-2 d-sm-block">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a href="?c=cancion&a=Listar_Canciones" class="btn btn-secondary" type="submit">Volver</a>
        </div>
      </form>
    </div>
  </div>
</div>