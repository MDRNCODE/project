<div class="theme-offer">
	<?php 
        // Check if the demo import has been completed
        $demo_import_completed = get_option('vw_home_renovation_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-home-renovation') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'vw-home-renovation') . '</a></span>';
        }

		// POST and update the customizer and other related data of THE COURIER SERVICESPRO
        if (isset($_POST['submit'])) {


            // Create a front page and assign the template
            $vw_home_renovation_home_page = null;
            // Using WP_Query instead of get_page_by_title()
            $vw_home_renovation_home_query = new WP_Query(array(
               'post_type' => 'page',
               'title' => 'Home',
               'post_status' => 'publish',
               'posts_per_page' => 1
            ));
            if (!$vw_home_renovation_home_query->have_posts()) {
               $vw_home_renovation_home_title = 'Home';           
               // Create the page
               $vw_home_renovation_home = array(
                   'post_type' => 'page',
                   'post_title' => $vw_home_renovation_home_title,
                   'post_status' => 'publish',
                   'post_author' => 1,
                   'post_slug' => 'home'
               );
               $vw_home_renovation_home_id = wp_insert_post($vw_home_renovation_home);
            } else {
               $vw_home_renovation_home_page = $vw_home_renovation_home_query->posts[0];
               $vw_home_renovation_home_id = $vw_home_renovation_home_page->ID;
            }

            // Set the home page template
            add_post_meta($vw_home_renovation_home_id, '_wp_page_template', 'page-template/custom-home-page.php');

            // Set the static front page
            update_option('page_on_front', $vw_home_renovation_home_id);
            update_option('show_on_front', 'page');

            // Create another page if needed
            $vw_home_renovation_page_query = new WP_Query(array(
               'post_type' => 'page',
               'title' => 'Page',
               'post_status' => 'publish',
               'posts_per_page' => 1
            ));

            if (!$vw_home_renovation_page_query->have_posts()) {
               $vw_home_renovation_page_title = 'Page';
               $vw_home_renovation_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
               
                $vw_home_renovation_page = array(
                   'post_type' => 'page',
                   'post_title' => $vw_home_renovation_page_title,
                   'post_content' => $vw_home_renovation_content,
                   'post_status' => 'publish',
                   'post_author' => 1,
                   'post_slug' => 'page'
                );
                $vw_home_renovation_page_id = wp_insert_post($vw_home_renovation_page);
            }       

            // Top Bar //
            set_theme_mod( 'vw_home_renovation_location', '745 Adelaide Street, Tokto' ); 
            set_theme_mod( 'vw_home_renovation_location_icon', 'fas fa-map-marker-alt' );
            set_theme_mod( 'vw_home_renovation_phone_number', '+00 123 456 7890' ); 
            set_theme_mod( 'vw_home_renovation_phone_number_icon', 'fa fa-phone' );
            set_theme_mod( 'vw_home_renovation_lite_email', 'xyz123@example.com' ); 
            set_theme_mod( 'vw_home_renovation_email_icon', 'fas fa-envelope' );    
            set_theme_mod( 'vw_home_renovation_topbar_button_label', 'Book A Consultation' ); 
            set_theme_mod( 'vw_home_renovation_topbar_button_url', '#' );   
            set_theme_mod( 'vw_home_renovation_button_icon', 'fas fa-angle-right' ); 
        
            // Set the demo import completion flag
    		update_option('vw_home_renovation_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-home-renovation') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'vw-home-renovation') . '</a></span>';

            //end 

            // slider section start //         
            // set_theme_mod( 'vw_home_renovation_banner_image', get_template_directory_uri().'/assets/images/banner.png');
            set_theme_mod( 'vw_home_renovation_designation_small_text', 'Premium Quality' );
            set_theme_mod( 'vw_home_renovation_tagline_title', 'WANT TO KNOW HOW MUCH YOUR HALL INTERIOR WILL COST?' );
            set_theme_mod( 'vw_home_renovation_designation_text', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' );
            set_theme_mod( 'vw_home_renovation_banner_button_label', 'Browse Services' );
            set_theme_mod( 'vw_home_renovation_top_button_url', '#' );
            set_theme_mod( 'vw_home_renovation_banner_icon', 'fas fa-angle-right' );
            set_theme_mod( 'vw_home_renovation_designation_text3', 'Inspiration' );
            set_theme_mod( 'vw_home_renovation_designation_text4', 'Best Luxury Kitchen' );

            for($vw_home_renovation_i=1; $vw_home_renovation_i<=3; $vw_home_renovation_i++) {
                set_theme_mod( 'vw_home_renovation_banner_background_image_sec'.$vw_home_renovation_i, get_template_directory_uri().'/assets/images/banner'.$vw_home_renovation_i.'.png' );              
            }  
            

            // Our Places Section //
            set_theme_mod( 'vw_home_renovation_our_services_heading', 'Our Services' ); 
            set_theme_mod( 'vw_home_renovation_our_services_small_title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit' );
            set_theme_mod( 'vw_home_renovation_services_number', '6' );            

            $vw_home_renovation_tab_text_array = array("Modular Interior", "Luxury Interior", "Home Renovation","Commercial Interior", "Furniture Interior", "Full Home Interior");
            for($vw_home_renovation_tab_index=1; $vw_home_renovation_tab_index <= 6; $vw_home_renovation_tab_index++) {

              $theme_mod_key = 'vw_home_renovation_services_text' . $vw_home_renovation_tab_index;
              $theme_mod_value = $vw_home_renovation_tab_text_array[$vw_home_renovation_tab_index - 1];
              set_theme_mod($theme_mod_key, $theme_mod_value);
               
                    set_theme_mod( 'vw_home_renovation_about_list_icon' . $vw_home_renovation_tab_index, 'fa-solid fa-house-chimney' ); 
                    set_theme_mod( 'vw_home_renovation_our_services_text1' . $vw_home_renovation_tab_index, 'Modular Interior' ); 
                    set_theme_mod( 'vw_home_renovation_designation_our_services_text' . $vw_home_renovation_tab_index, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or- less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the' ); 
                    set_theme_mod( 'vw_home_renovation_banner_button_our_services_label' . $vw_home_renovation_tab_index, 'Learn More' ); 
                    set_theme_mod('vw_home_renovation_top_button_our_services_url' . $vw_home_renovation_tab_index, '#');
                    set_theme_mod('vw_home_renovation_service_icon' . $vw_home_renovation_tab_index, 'fas fa-angle-right');

                    set_theme_mod( 'vw_home_renovation_our_services_background_image'.$vw_home_renovation_tab_index, get_template_directory_uri().'/assets/images/before'.$vw_home_renovation_tab_index.'.png' );
                    set_theme_mod( 'vw_home_renovation_our_services_background_image1'.$vw_home_renovation_tab_index, get_template_directory_uri().'/assets/images/after'.$vw_home_renovation_tab_index.'.png' );
                    set_theme_mod( 'vw_home_renovation_designation_our_services_before_after_text' . $vw_home_renovation_tab_index, 'Before' ); 
                    set_theme_mod( 'vw_home_renovation_designation_our_services_scratch_before_after_text' . $vw_home_renovation_tab_index, 'If you want after please scratch' ); 
                                     
            }  


            //Copyright Text
            set_theme_mod( 'vw_home_renovation_footer_text', 'By VWThemes' );  
                
        }
    ?>
  
	<p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for VW Home Renovation .','vw-home-renovation'); ?></p>
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=vw_home_renovation_guide" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('vw_home_renovation_demo_import_completed')) : ?>
        <form method="post">
            <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','vw-home-renovation'); ?>" class="button button-primary button-large">
        </form>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the theme demo content?")){
			    document.forms[0].submit();
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>

