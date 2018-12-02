<div class="container">
    <h1>Nou Auricular</h1>
    <form action="<?php echo constant('URL'); ?>headphones/newHeadphone" method="post" enctype="multipart/form-data" id="insertForm">

        <div class="form-group">
            <label for="exampleInput">Nom:</label>
            <input type="text" class="form-control" name="title" placeholder="Introdueix el nom">
        </div>

        <div class="form-group">
          <label for="exampleInput">Tipus:</label>
          <select id="inputState" class="form-control" name="type">
            <option selected>SupraAurals</option>
            <option>CircumAurals</option>
            <option>Botó</option>
          </select>
        </div>

        <div class="form-group">
            <label for="exampleInput">Data de llançament (AAAA-MM-DD):</label>
            <input type="text" class="form-control" name="date_launch" placeholder="AAAA-MM-DD">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Imatge:</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-dark">Crear</button>
    </form>
    <hr>
</div>
