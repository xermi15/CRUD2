<div class="container">
    <h1>Modificar Auriculars <?php echo $headphone->id; ?></h1>
    <form action="<?php echo constant('URL'); ?>headphones/updateHeadphone" method="post" enctype="multipart/form-data" id="updateForm">
        <input type="hidden" name="id" value="<?php echo $headphone->id; ?>" readonly>

        <div class="form-group">
            <label for="exampleInput">Nom:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $headphone->name;?>">
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
            <input type="text" class="form-control" name="date_launch" value="<?php echo $headphone->date_launch; ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Imatge:</label>
            <div class="col-auto">
                <img src='<?php echo constant('URL')."uploadsHP/".$headphone->image; ?>' style='width:auto;'/>
            </div>
            <div class="col-auto">
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>

        </div>

    <button type="submit" value="Update" class="btn btn-dark">Modificar</button>
</form>
<hr>
</div>
