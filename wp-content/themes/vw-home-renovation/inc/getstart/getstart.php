<?php
//about theme info
add_action( 'admin_menu', 'vw_home_renovation_gettingstarted' );
function vw_home_renovation_gettingstarted() {
	add_theme_page( esc_html__('About VW Home Renovation ', 'vw-home-renovation'), esc_html__('Theme Demo Import', 'vw-home-renovation'), 'edit_theme_options', 'vw_home_renovation_guide', 'vw_home_renovation_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_home_renovation_admin_theme_style() {
	wp_enqueue_style('vw-home-renovation-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-home-renovation-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_home_renovation_admin_theme_style');

//guidline for about theme
function vw_home_renovation_mostrar_guide() { 
	//custom function about theme customizer
	$vw_home_renovation_return = add_query_arg( array()) ;
	$vw_home_renovation_theme = wp_get_theme( 'vw-home-renovation' );
?>

<div class="wrap getting-started">
		<div class="getting-started__header">
	    	<div>
                <h2 class="tgmpa-notice-warning"></h2>
            </div>
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to VW Home Renovation ', 'vw-home-renovation' ); ?></h2>
						
						<p class="version"><?php esc_html_e( 'Version', 'vw-home-renovation' ); ?>: <?php echo esc_html($vw_home_renovation_theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'vw-home-renovation' ); ?>	
						</span>
    					
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme Demo Import', 'vw-home-renovation' ); ?></strong></p>
							
							<div class="demo-content">
							<?php
								/* Get Started. */
								require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
							?>
						</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_HOME_RENOVATION_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-home-renovation'); ?></a>
						<a href="<?php echo esc_url( VW_HOME_RENOVATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-home-renovation'); ?></a>
						<a href="<?php echo esc_url( VW_HOME_RENOVATION_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-home-renovation'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup VW Home Renovation Theme', 'vw-home-renovation' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'VW Home Renovation is a user-friendly and visually appealing solution for individuals and businesses looking to revamp their online presence in the home improvement and construction industry. With its clean and modern design, this theme effortlessly showcases your renovation services and projects, making it an ideal choice for contractors, interior designers, and remodeling professionals. The theme is specifically designed for niche related to construction. Whether it is Kitchen remodeling, Bathroom renovation, Basement finishing,Construction, Remodeling, Interior Design, Landscaping, Renovation, Living room makeover, Bedroom redesign, Home office renovation, Custom cabinetry, Painting and wallpapering, Lighting fixtures and installation, Wall decor and accents, Furniture restoration, Pool installation, Roofing repair this theme excels for every niche. You can create a dynamic platform suitable for contractors, interior designers, and DIY enthusiasts. The theme’s intuitive customization options allow you to easily personalize your website without delving into complex technical details. It has Robust features for showcasing projects, services, and client testimonials. Whether you’re a tech-savvy professional or someone with limited web development experience, the user-friendly interface ensures a seamless and stress-free experience. Key features include a responsive design, ensuring your website looks great on any device, from desktops to smartphones. Fully responsive and cross-browser compatible for seamless performance on all devices. The theme also incorporates a variety of gallery and portfolio options, allowing you to showcase before-and-after images of your projects in an engaging manner. Supported by a comprehensive documentation and super-efficient theme customizer for easy website management. Clients can easily get in touch using the built-in contact forms, fostering communication and potential business inquiries. Furthermore, the VW Home Renovation theme is optimized for search engines, enhancing your site’s visibility online. Social media integration is also a breeze, enabling you to connect with your audience across different platforms. The Home Renovation WordPress theme is a stylish and functional solution for those in the home improvement industry, offering an accessible way to establish a professional online presence and attract potential clients. VW Home Renovation is your go-to solution for creating a standout online presence in the competitive home renovation industry.', 'vw-home-renovation' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','vw-home-renovation'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-home-renovation'); ?></a> <?php esc_html_e( 'your website.','vw-home-renovation'); ?> </li>
							<li><?php esc_html_e( 'VW Home Renovation','vw-home-renovation'); ?> <a target="_blank" href="<?php echo esc_url( VW_HOME_RENOVATION_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Documentation','vw-home-renovation'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','vw-home-renovation'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive1.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','vw-home-renovation'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'VW Home Renovation is a user-friendly and visually appealing solution for individuals and businesses looking to revamp their online presence in the home improvement and construction industry. With its clean and modern design, this theme effortlessly showcases your renovation services and projects, making it an ideal choice for contractors, interior designers, and remodeling professionals. The themes intuitive customization options allow you to easily personalize your website without delving into complex technical details. Whether youre a tech-savvy professional or someone with limited web development experience, the user-friendly interface ensures a seamless and stress-free experience. Key features include a responsive design, ensuring your website looks great on any device, from desktops to smartphones. The theme also incorporates a variety of gallery and portfolio options, allowing you to showcase before-and-after images of your projects in an engaging manner. Clients can easily get in touch using the built-in contact forms, fostering communication and potential business inquiries. Furthermore, the VW Home Renovation theme is optimized for search engines, enhancing your sites visibility online. Social media integration is also a breeze, enabling you to connect with your audience across different platforms. The Home Renovation WordPress theme is a stylish and functional solution for those in the home improvement industry, offering an accessible way to establish a professional online presence and attract potential clients.', 'vw-home-renovation' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','vw-home-renovation'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Theme options using Customizer API','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'One click demo importer','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Global color option','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Mobile Responsive Design','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Favicon, logo, title, and tagline customization','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Advanced color options and color pallets','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( '100+ font family options','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Simple menu option','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'SEO friendly','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Pagination option','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Compatible with different WordPress famous plugins like contact form 7','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on all sections','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Responsive Layout for All Devices','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Footer customization options','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Fully integrated with the latest font awesome','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Background image option','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Custom Page Templates','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Sticky post & comment threads','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Section reordering','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Customizable home page','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Footer widgets & editor style','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Social media feature','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Slider with unlimited number of slides','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Our Cleaning Services Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Testimonial Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Our Team Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Counter Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Our Project Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'How We Work Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Pricing Plan Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Brand Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Instagram Feed','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Newsletter Section','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Blog post section','vw-home-renovation'); ?></li>							
										<li><?php esc_html_e( 'Contact page template','vw-home-renovation'); ?></li>	
										<li><?php esc_html_e( 'Shortcodes for the Custom Posttype','vw-home-renovation'); ?></li>	
										<li><?php esc_html_e( 'Featured Image Galleries','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Multiple Layout Options','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Advanced Search and Filtering','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Customization Options','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Social Media Integration','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'User-Friendly','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'E-commerce Integration','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Advanced SEO Optimization','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Responsive Design','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'E-commerce Integration','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Regular Updates','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Mega Menu','vw-home-renovation'); ?></li>
										<li><?php esc_html_e( 'Featured Single Product Pages','vw-home-renovation'); ?></li>		
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','vw-home-renovation'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOME_RENOVATION_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','vw-home-renovation'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOME_RENOVATION_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','vw-home-renovation'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','vw-home-renovation'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','vw-home-renovation'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-home-renovation'); ?></a> <?php esc_html_e( 'your website.','vw-home-renovation'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','vw-home-renovation'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOME_RENOVATION_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','vw-home-renovation'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOME_RENOVATION_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','vw-home-renovation'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','vw-home-renovation'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( VW_HOME_RENOVATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-home-renovation'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php } ?>