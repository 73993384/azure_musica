<div class="card">
  <div class="card-header bg-dark">
    <h1 class="text-white"><strong>Detalle Playlist</strong></h1>
  </div>
  <div class="card-body">
    <div class="card border">
      <div class="card-header bg-dark">
        <h4 class="text-white"><strong>Detalles Principales</strong></h4>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <form action="?c=seccion&a=Editar_Seccion" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="mb-3">
                  <input type="hidden" class="form-control" name="codigo_playlist" value="<?php echo $r->codigo_playlist; ?>">
                  <label for="nombre" class="form-label">Nombre Playlist</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre de la Playlist" value="<?php echo $r->nombre; ?>">
                </div>
              </div>
              <div class="d-grid gap-2 d-sm-block">
                <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card border">
      <div class="card-header bg-dark">
        <h4 class="text-white"><strong>Canciones</strong></h4>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">
            <div class="d-grid gap-2 d-sm-block mb-3">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Agregar_Cancion">
                Agregar Cancion
              </button>
            </div>
            <div class="col-md-12 col-lg-12 mb-3">
              <audio id="audio" preload="auto" tabindex="0" controls="">
                <source src="">
              </audio>
              <ul id="playlist">
                <?php foreach ($p as $r) : ?>
                  <li style="background: #333;">
                    <a href="../assets/cancion/<?php echo $r->audio; ?>">
                      <?php echo $r->artista." - ".$r->album." - ".$r->cancion." - ".$r->duracion; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><br>
    <div class="d-grid gap-2 d-sm-block">
      <a href="?c=playlist&a=Listar_Playlists" class="btn btn-secondary" type="submit">Volver</a>
    </div>
  </div>
</div>
<style>
  #playlist,
  audio {
    background: #666;
    width: 100%;
    padding: 20px;
    list-style: none;
    font-family: Arial, Helvetica, sans-serif;
  }

  a {
    text-decoration: none;
  }

  .active a {
    color: #5DB0E6;
    text-decoration: none;
  }

  li a {
    color: #fafafa;
    padding: 5px;
    display: block;
  }

  li a:hover {
    text-decoration: none;
  }
</style>
<script>
  init();

  function init() {
    var audio = document.getElementById('audio');
    var playlist = document.getElementById('playlist');
    var tracks = playlist.getElementsByTagName('a');
    audio.volume = 0.10;
    audio.play();
    for (var track in tracks) {
      var link = tracks[track];
      if (typeof link === "function" || typeof link === "number") continue;

      link.addEventListener('click', function(e) {
        e.preventDefault();
        var song = this.getAttribute('href');
        run(song, audio, this);
      });
    }
    audio.addEventListener('ended', function(e) {
      for (var track in tracks) {
        var link = tracks[track];
        var nextTrack = parseInt(track) + 1;
        if (typeof link === "function" || typeof link === "number") continue;
        if (!this.src) this.src = tracks[0];
        if (track == (tracks.length - 1)) nextTrack = 0;
        console.log(nextTrack);
        if (link.getAttribute('href') === this.src) {
          var nextLink = tracks[nextTrack];
          run(nextLink.getAttribute('href'), audio, nextLink);
          break;
        }
      }
    });
  }

  function run(song, audio, link) {
    var parent = link.parentElement;
    //quitar el active de todos los elementos de la lista
    var items = parent.parentElement.getElementsByTagName('li');
    for (var item in items) {
      if (items[item].classList)
        items[item].classList.remove("active");
    }
    //agregar active a este elemento
    parent.classList.add("active");
    //tocar la cancion
    audio.src = song;
    audio.load();
    audio.play();
  }
</script>
<!-- Modal Agregar Cancion-->
<div class="modal fade" id="Agregar_Cancion" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white ">
          <h5 class="modal-title text-white">AGREGAR CANCION</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="?c=playlist&a=Agregar_Cancion_Playlist" method="POST">
            <div class="form-group row">
              <input type="hidden" name="codigo_playlist" value="<?php echo $r->codigo_playlist; ?>">
              <div class="mb-3">
                <label for="codigo_cancion" class="form-label">Cancion</label>
                <select class="select2-modal form-control" name="codigo_cancion" required>
                  <?php foreach ($this->cancion->Listar_Canciones_() as $c) : ?>
                    <option value="<?php echo $c->codigo_cancion; ?>">
                      <?php echo $c->artista . " - " . $c->album . " - " . $c->nombre . " - " . $c->duracion; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>