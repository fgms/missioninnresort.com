<section class="entry-content">


<?php

		
		  
		  the_content();
		  $wedding_suppliers_array = array('Cake'=>types_render_field('cake',array()),
										   'Floral'=>types_render_field('floral',array()),
										   'Music'=>types_render_field('music',array()),
										   'Officiant'=>types_render_field('officiant',array()),
										   'Phtotography'=>types_render_field('phtoography',array()),
										   'Rentals'=>types_render_field('rental',array())									   
										   );
		  
		  $supplier_table ='';
		  foreach ($wedding_suppliers_array as $key=>$value){
					if (strlen($value) > 0) {							
							  $supplier_table .= "<tr><td>{$key}</td><td>{$value}</td></tr>";
					}
		  }
		  if (strlen($supplier_table) > 10){
					echo "<table class=\"table supplier-table \">
							  <h2>Wedding Suppliers</h2>
							  <thead><tr><td></td><td></td></thead><tbody>{$supplier_table}</tbody></table>";
		  }
		  		  
?>
		  <div class="entry-links"><?php wp_link_pages(); ?></div>
</section>