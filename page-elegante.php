<?php
/* template name: Elegante */
get_header();
?>
<div class="custom-container">
	<?php
	// Custom WP query query
	$args_query = array(
		'post_type' => array('quedicen'),
		'order' => 'ASC',
		'posts_per_page' => 1,
	);

	$query = new WP_Query( $args_query );
	$i = 0; 

    if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $i++;?> 
        
		<?php
		//all fields
		$fields = get_field_objects();
			
		$candidato_name = $fields["candidato"]["value"];
		//Seguridad Ciudadana
		$seguridad_ciudadana_label = $fields["seguridad_ciudadana"]["label"];
		$seguridad_ciudadana_divider = count($fields["seguridad_ciudadana"]["value"]);
		$seguridada_ciudadana_status = $fields['seguridad_ciudadana']['value'];
	
		$seguridada_ciudadana_sum = 0;
		foreach($seguridada_ciudadana_status as $seguridada_ciudadana_point) {
			$seguridada_ciudadana_sum += (int)$seguridada_ciudadana_point["status"];
			//print_r( (int)$seguridada_ciudadana_point["status"] );
		}
		$seguridada_ciudadana_point = $seguridada_ciudadana_sum / $seguridad_ciudadana_divider;
		if( $seguridada_ciudadana_point >= 4 ):
			$seguridada_ciudadana_face = get_stylesheet_directory_uri() . '/img/comprometido.png';
		elseif( $seguridada_ciudadana_point >= 3 ):
			$seguridada_ciudadana_face = get_stylesheet_directory_uri() . '/img/buen-camino.png';
		elseif ( $seguridada_ciudadana_point >= 2 ):
			$seguridada_ciudadana_face = get_stylesheet_directory_uri() . '/img/falta-concrecion.png';
		elseif ( $seguridada_ciudadana_point >= 1 ):
			$seguridada_ciudadana_face = get_stylesheet_directory_uri() . '/img/habla-del-tema-no-alineado.png';
		elseif ( $seguridada_ciudadana_point >= 0 ):
			$seguridada_ciudadana_face = get_stylesheet_directory_uri() . '/img/no-dice-nada.png';
		endif;

	?> 
			<div class="candidato-col">
				<span>
					<?php echo $candidato_name; ?>
				</span>
			</div>
			<div class="candidato-col">
				<span>
					<?php echo $seguridad_ciudadana_label; ?>
				</span>
				<br>
				<span>
					<?php echo $seguridada_ciudadana_point ?>
				</span>
				<br>
				<span>
					<img src="<?php echo $seguridada_ciudadana_face ?>" alt="">
				</span>
			</div>
		
		
	<?php endwhile; endif;
	wp_reset_postdata();
	?>
</div>
<style>
	.custom-container{
		max-width:1080px;
		margin:auto;
		padding: 100px 0;
		min-height:80vh;
		/* display:flex; */
	}
</style>
<?php
get_footer();