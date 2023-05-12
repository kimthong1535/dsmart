<?php
if ( ! class_exists( 'dsmart_options' ) ) {
	class dsmart_options {
		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		/* Load Redux Framework */
		public function __construct() {		 
			if ( ! class_exists( 'ReduxFramework' ) ) {
				return;
			}
			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}

		}

		public function initSettings() {			
    		// Set the default arguments
			$this->setArguments();

		    // Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

		    // Create the sections and fields
			$this->setSections();

		    if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
		    	return;
		    }

		    $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		//setup theme option
		public function setArguments() {
			$theme = wp_get_theme();
			$this->args = array(
				'opt_name'  => 'dsmart_option', 
				'display_name' => $theme->get( 'Name' ), 
				'menu_type'          => 'menu',
				'allow_sub_menu'     => true,
				'menu_title'         => __( 'System Options', 'vietsmiler' ),
				'page_title'         => __( 'System Options', 'vietsmiler' ),
				'dev_mode' => false,
				'customizer' => true,
				'menu_icon' => '',
				'hints'              => array(
					'icon'          => 'icon-question-sign',
					'icon_position' => 'right',
					'icon_color'    => 'lightgray',
					'icon_size'     => 'normal',
					'tip_style'     => array(
						'color'   => 'light',
						'shadow'  => true,
						'rounded' => false,
						'style'   => '',
						),
					'tip_position'  => array(
						'my' => 'top left',
						'at' => 'bottom right',
						),
					'tip_effect'    => array(
						'show' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'mouseover',
							),
						'hide' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'click mouseleave',
							),
						),
		        ) // end Hints
				);
		}

		//setup helper tab
		public function setHelpTabs() {
			$this->args['help_tabs'][] = array(
				'id'      => 'redux-help-tab-1',
				'title'   => __( 'Theme Information 1', 'vietsmiler' ),
				'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'vietsmiler' )
				);

			$this->args['help_tabs'][] = array(
				'id'      => 'redux-help-tab-2',
				'title'   => __( 'Theme Information 2', 'arrowicode' ),
				'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'vietsmiler' )
				);
			$this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'vietsmiler' );
		}

		//setup area
		public function setSections() {			
	    	// Header Section
			$this->sections[] = array(
				'title'  => __( 'Logo-favicon', 'vietsmiler' ),
				'desc'   => __( 'All of settings for header on this theme.', 'vietsmiler' ),
				'icon'   => 'el-icon-home',
				'fields' => array(
					array(
						'id'       => 'title-header1',
						'type'     => 'text',
						'title'    => __( 'Title Header1', 'vietsmiler' ),
						'desc'     => __( 'Title Header1', 'vietsmiler' ),
					),
					array(
						'id'       => 'title-header2',
						'type'     => 'text',
						'title'    => __( 'Title Header2', 'vietsmiler' ),
						'desc'     => __( 'Title Header2', 'vietsmiler' ),
					),	
					array(
						'id'       => 'title-header1-en',
						'type'     => 'text',
						'title'    => __( 'Title Header1-en', 'vietsmiler' ),
						'desc'     => __( 'Title Header1-en', 'vietsmiler' ),
					),
					array(
						'id'       => 'title-header2-en',
						'type'     => 'text',
						'title'    => __( 'Title Header2-en', 'vietsmiler' ),
						'desc'     => __( 'Title Header2-en', 'vietsmiler' ),
					),					
					array(
						'id'       => 'logo',
						'type'     => 'media',
						'title'    => __( 'Logo image', 'vietsmiler' ),
						'desc'     => __( 'Image that you want to use as logo', 'vietsmiler' ),
					),
					array(
						'id'       => 'favicon',
						'type'     => 'media',
						'title'    => __( 'Favicon image', 'vietsmiler' ),
						'desc'     => __( 'Image that you want to use as favicon', 'vietsmiler' ),
					),
					array(
						'id'       => 'dsmart',
						'type'     => 'text',
						'title'    => __( 'Global Name', 'vietsmiler' ),
						'desc'     => __( 'The name use to translate language', 'vietsmiler' ),
					)
				)
	    	); 	
	    	// Infor Section
			$this->sections[] = array(
				'title'  => __( 'Information', 'vietsmiler' ),
				'desc'   => __( 'All of settings for information on this theme.', 'vietsmiler' ),
				'icon'   => 'el-icon-home',
				'fields' => array(		
					array(
						'id'       => 'hotline',
						'type'     => 'text',
						'title'    => __( 'Hotline', 'vietsmiler' ),
						'desc'     => __( 'Hotline company', 'vietsmiler' ),
					),array(
						'id'       => 'phone',
						'type'     => 'text',
						'title'    => __( 'Phone', 'vietsmiler' ),
						'desc'     => __( 'Hotline company', 'vietsmiler' ),
					),			
					array(
						'id'       => 'address',
						'type'     => 'text',
						'title'    => __( 'Address', 'vietsmiler' ),
						'desc'     => __( 'Address company', 'vietsmiler' ),
					),					
					array(
						'id'       => 'email',
						'type'     => 'text',
						'title'    => __( 'Email', 'vietsmiler' ),
						'desc'     => __( 'Email company', 'vietsmiler' ),
					),
				)
	    	); 				    	 
	    	//socail links
	    	$this->sections[] = array(
				'title'  => __( 'Socical Links', 'vietsmiler' ),
				'desc'   => __( '', 'arrowicode' ),
				'icon'   => 'el-icon-share-alt',
				'fields' => array(					
					array(
						'id'       => 'facebook',
						'type'     => 'text',
						'title'    => __( 'Facebook', 'vietsmiler' ),
					),
					array(
						'id'       => 'google-plus',
						'type'     => 'text',
						'title'    => __( 'Goole Plus', 'vietsmiler' ),
					),
					array(
						'id'       => 'twitter',
						'type'     => 'text',
						'title'    => __( 'Twitter', 'vietsmiler' ),
					),
					array(
						'id'       => 'youtube',
						'type'     => 'text',
						'title'    => __( 'Youtube', 'vietsmiler' ),					
                    ),
                    array(
						'id'       => 'instagram',
						'type'     => 'text',
						'title'    => __( 'Instagram', 'vietsmiler' ),					
                    )
				)
	    	);
           
			//Footer
	    	$this->sections[] = array(
				'title'  => __( 'Footer', 'vietsmiler' ),
				'desc'   => __( '', 'vietsmiler' ),
				'icon'   => 'el-icon-website',
				'fields' => array(					
					array(
						'id'       => 'copyright',
						'type'     => 'textarea',
						'title'    => __( 'Copyright', 'vietsmiler' ),
						'hint'     => array(
		                    'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
		                )
					)
				)
	    	);

		}
	}
	global $reduxConfig;
	$reduxConfig = new dsmart_options();
}