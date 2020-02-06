<?php
/* template name: Partidos Testing */
get_header();
?>
<div class="custom-container">
<?php

// check if the repeater field has rows of data
if( have_rows('partido') ):

 	// loop through the rows of data
    while ( have_rows('partido') ) : the_row();

		// display a sub repeater
		// check if the repeater field has rows of data
		if( have_rows('seguridad_ciudadana') ):

			// loop through the rows of data
		while ( have_rows('seguridad_ciudadana') ) : the_row();

			// display a sub field value
			the_sub_field('candidato');

		endwhile;

		else :

		// no rows found

		endif;
		// display a sub repeater
        

    endwhile;

else :

    // no rows found

endif;
?>


</div>
<style>
	.custom-container{
		max-width:1080px;
		margin:auto;
		padding: 100px 0;
		min-height:80vh; 
	}
</style>
<?php
get_footer();
