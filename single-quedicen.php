<?php get_header();?>

<?php
$fields = get_field_objects();
if( $fields ): ?>
    <ul>
        <?php foreach( $fields as $field ): ?>
            <li><?php echo $field['label']; ?>: </li>
            <?php 
            echo "<pre>";
            print_r($field);
            echo "</pre>";
            ?>
			<br>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php get_footer();?>
