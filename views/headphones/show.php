<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Name -->
            <h1 class="mt-4">
                <?php echo $headphone->name; ?>
            </h1>

            <!-- Type -->
            <p class="lead">
                by
                <a href="#">
                    <?php echo $headphone->type; ?></a>
            </p>

            <hr>

            <!-- Data llansament auriculars -->
            <p>Data de llançament
                <?php echo $headphone->date_launch; ?>
            </p>

            <hr>

            <!-- Preview Imatge -->
            <img style="max-height: 300px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploadsHP/".$headphone->image; ?>">

            <hr>
        </div>
    </div>
</div>
