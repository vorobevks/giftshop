<div class="content">
	<h1>Магазин подарков</h1>
	<p>
	<table class="table table-dark">
	<?php

		foreach($data as $row)
		{
			echo '<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['description'].'</td></tr>';
		}
		
	?>
	</table>
	</p>
</div>