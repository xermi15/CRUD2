<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Títol: </strong>
	<?php echo $post->title; ?></p>
<p><strong>Autor: </strong>
	<?php echo $post->author; ?></p>
<p><strong>Contingut: </strong>
	<?php echo $post->content; ?></p>
<p><strong>Imatge: </strong>
	<img src="<?php echo constant('URL')."uploads/".$post->image; ?>" width="200"></p>
<p><strong>Data de creació: </strong>
	<?php echo $post->date_create; ?></p>
<p><strong>Data de modificació: </strong>
	<?php echo $post->date_modification; ?></p>
