<?php
/* template name: Partidos */
get_header();
?>
<div class="container-intro">
	<div class="container">
		<h1>¿Que dicen?</h1>
		<p>¿Sabes a qué se comprometen los candidatos en la lucha contra la pobreza, desigualdad y el cambio climático? Conoce la valoración y análisis de los discursos y declaraciones públicas de los candidatos a las elecciones generales 2019.</p>
	</div>
</div>
<div class="custom-container-candidato">
	<?php
	// Custom WP query query
	$args_query = array(
		'post_type' => array('quedicen'),
		'orderby' => 'title',
		'order' => 'ASC',
	);

	$query = new WP_Query( $args_query );
	$i = 0;

    if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $i++;
	
	$fields = get_field_objects();
	$candidato 		= get_field_object('candidato');
	?> 
		<?php if($i == 1):?>
		<div class="cats">
			<div></div>
			<?php $skipFirst = false;
			foreach($fields as $field) {
				if(!$skipFirst) {
					$skipFirst = true;
					continue;
				}
				echo "<div>";
				echo $field['label'];
				echo "</div>";
			}?>
			
		</div>
		<?php endif;?>
		<!-- candidato column -->
		<div class="candidato_col">
			<div class="candidato_name">
				<?php echo $candidato['value']; ?>
			</div>

			<?php 
			$skipFirst = false;
			foreach($fields as $field):
				if(!$skipFirst) {
					$skipFirst = true;
					continue;
				}
			
			?>
			<!-- Categorias -->
			<div class="candidato_cat_points">
			<?php
				// Categorias repeater loop
				if( have_rows($field['name']) ):
					// Categorias repeater loop rows
					while ( have_rows($field['name']) ) : the_row();
						// Get status field
						$value 		=  $field['value']; 
						$divider 	=  count($field['value']);
						//calculate
						$sum = 0;
						foreach($value as $point) {
							$sum += (int)$point["status"];
							//print_r( (int)$seguridada_ciudadana_point["status"] );
						}
						$points = $sum / $divider;
						if( $points >= 4 ):
							$face = get_stylesheet_directory_uri() . '/img/comprometido.svg';
						elseif( $points >= 3 ):
							$face = get_stylesheet_directory_uri() . '/img/buen-camino.svg';
						elseif ( $points >= 2 ):
							$face = get_stylesheet_directory_uri() . '/img/falta-concrecion.svg';
						elseif ( $points >= 1 ):
							$face = get_stylesheet_directory_uri() . '/img/habla-del-tema-no-alineado.svg';
						elseif ( $points >= 0 ):
							$face = get_stylesheet_directory_uri() . '/img/no-dice-nada.svg';
						endif;
					endwhile;
			?>
				<div class="face-container">
					<img src="<?php echo $face?>" alt="">
					<div class="tooltip">
						<a href="#">Text</a>
						<a href="#">Text</a>
						<a href="#">text</a>
					</div>
				</div> 
			<?php 
				endif;
			?>
			</div>
			<!-- Categorias -->
			<?php endforeach;?>		
		</div>
		<!-- candidato column -->
	<?php endwhile; endif;
	wp_reset_postdata();
	?>
</div>

<div class="container-footer">
	<div class="container">
		<h1>Leyenda</h1>
		<ul>
			<li><img src="<?php echo get_stylesheet_directory_uri() . '/img/no-dice-nada.svg';?>" alt=""> No dice nada</li>
			<li><img src="<?php echo get_stylesheet_directory_uri() . '/img/habla-del-tema-no-alineado.svg';?>" alt=""> Habla del tema pero no esta alineado en las posiciones</li>
			<li><img src="<?php echo get_stylesheet_directory_uri() . '/img/falta-concrecion.svg';?>" alt=""> Falta concreción</li>
			<li><img src="<?php echo get_stylesheet_directory_uri() . '/img/buen-camino.svg';?>" alt=""> En buen camino</li>
			<li><img src="<?php echo get_stylesheet_directory_uri() . '/img/comprometido.svg';?>" alt=""> Comprometido con el tema</li>
		</ul>
	</div>
</div>
<?php
get_footer();
