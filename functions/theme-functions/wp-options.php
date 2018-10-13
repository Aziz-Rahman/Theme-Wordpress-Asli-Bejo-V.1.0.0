<?php
// ReduxFramework Sample Config File
// For full documentation, please visit: https://docs.reduxframework.com
if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {
            // General Settings
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Setting', 'asli_bejo'),
                'fields' => array(
                     array(
                        'id'                => 'logo_type',
                        'type'              => 'button_set',
                        'title'             => __('Logo Type', 'asli_bejo'), 
                        'desc'              => sprintf(__('Use site <a href="%s" target="_blank">title & desription</a>, image logo or use your profile.', 'asli_bejo'), admin_url('/options-general.php') ),
                        'options'           => array('1' => __('Site Title', 'asli_bejo'), '2' => __('Image Logo', 'asli_bejo'), '3' => __('Your Avatar', 'asli_bejo')),
                        'default'           => '3'
                    ),

                    array(
                        'id'                => 'logo_image',
                        'type'              => 'media', 
                        'url'               => true,
                        'required'          => array('logo_type', 'equals', '2'),
                        'title'             => __('Image Logo', 'asli_bejo'),
                        'output'            => 'true',
                        'desc'              => __('Upload your logo or type the URL on the text box.', 'asli_bejo'),
                        'default'           => array('url' => get_stylesheet_directory_uri() .'/images/logo.jpg'),
                    ),

                    array(
                        'id'                => 'your_avatar',
                        'type'              => 'media', 
                        'url'               => true,
                        'required'          => array('logo_type', 'equals', '3'),
                        'title'             => __('Your Avatar', 'asli_bejo'),
                        'output'            => 'true',
                        'desc'              => __('Upload your profile.', 'asli_bejo'),
                        'default'           => array('url' => get_stylesheet_directory_uri() .'/images/avatar.jpg'),
                    ),

                    array(
                        'id'                => 'author_name',
                        'type'              => 'text',
                        'required'          => array('logo_type', 'equals', '3'),
                        'title'             => __('Author Name', 'asli_bejo'),
                        'output'            => 'true',
                        'desc'              => __('Create your name.', 'asli_bejo'),
                        'default'           => __('Create Your Name', 'asli_bejo')
                    ),

                    array(
                        'id'                    => 'author_description',
                        'type'                  => 'textarea',
                        'required'              => array('logo_type', 'equals', '3'),
                        'title'                 => __('Author Short Description', 'asli_bejo'),
                        'default'               => __('Write a short description about your self and what you do. That way your blog readers could get to know you better.', 'asli_bejo')
                    ),

                    array(
                        'id'                =>'favicon',
                        'type'              => 'media', 
                        'title'             => __('Favicon', 'asli_bejo'),
                        'output'            => 'true',
                        'mode'              => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'              => __('Upload your favicon.', 'asli_bejo'),
                        'default'           => array('url' => get_stylesheet_directory_uri().'/images/favicon.png'),
                    ),

                    array(
                        'id'                   		=> 'post_excerpt_length',
                        'type'                 		=> 'slider',
                        'title'                		=> __('Post Excerpt Length', 'asli_bejo'),
                        'default'              		=> 65,
                        'min'                  	    => 20,
                        'step'                 		=> 1,
                        'max'                   	=> 65,
                        'display_value'        		=> 'text'
                    ),

                    array(
                        'id'                        => 'share_buttons',
                        'type'                      => 'switch',
                        'title'                     => __('Display Share Buttons', 'asli_bejo'),
                        'desc'                      => __('Display share buttons in posts detail.', 'asli_bejo'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'feature_search',
                        'type'                      => 'switch',
                        'title'                     => __('Display Search Form', 'asli_bejo'),
                        'desc'                      => __('Display search form under site title.', 'asli_bejo'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'display_comments',
                        'type'                      => 'switch',
                        'title'                     => __('Display Comments', 'asli_bejo'),
                        'desc'                      => __('Display comments in post detail.', 'asli_bejo'),
                        'default'                   => 1,
                    ),
                )
            );


             // Typography Settings
            $this->sections[] = array(
                'icon'    => 'el-icon-text-width',
                'title'   => __('Typography', 'asli_bejo'),
                'fields'  => array(
                    array(
                        'id'                => 'body_text_wp',
                        'type'              => 'typography',
                        'title'             => __('Text Body', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'output'            => array('body #main'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'line-height'       => '26px',
                            'color'             => '#a2a2a2',
                        )
                    ),

                    array(
                        'id'                => 'site_title_font_asli_bejo',
                        'type'              => 'typography',
                        'title'             => __('Site Title', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'output'            => array('header#header .site-title'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '30px',
                            'font-weight'       => '400',
                            'color'             => '#fff',
                        )
                    ),

                    array(
                        'id'                => 'site_desc_font_wp',
                        'type'              => 'typography',
                        'title'             => __('Site Description', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'text-align'        => false,
                        'line-height'       => true,
                        'output'            => array('header#header .description'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'line-height'       => '22px',
                            'color'             => '#fff',
                        )
                    ),

                    array(
                        'id'                => 'post_title',
                        'type'              => 'typography',
                        'title'             => __('Post Title', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'output'            => array('#main article.blog-post header.major .post-title'),
                        'default'           => array(
                            'font-family'       => 'Montserrat Alternates',
                            'font-size'         => '26px',
                            'line-height'       => '35px',
                            'font-weight'       => '700',
                            'color'             => '#787878',
                            )
                        ),

                    array(
                        'id'                => 'meta_text_wp',
                        'type'              => 'typography',
                        'title'             => __('Meta Post Content', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => false,
                        'text-align'        => false,
                        'output'            => array('article.hentry header.major .entry-meta'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '10px',
                            'font-weight'       => '400',
                            'color'             => '#a2a2a2',
                            )
                        ),

                    array(
                        'id'                => 'post_tag_wp',
                        'type'              => 'typography',
                        'title'             => __('Tags Post Content', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => false,
                        'text-align'        => false,
                        'output'            => array('article.hentry .entry-content .post-tags, article.hentry .entry-content .post-tags span b'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'color'             => '#a2a2a2',
                            )
                        ),

                    array(
                        'id'                => 'asli_bejo-commments-list',
                        'type'              => 'typography',
                        'title'             => __('Comment List', 'asli_bejo'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'output'            => array('.article-widget .comments-widget .main-comment .detail'),
                        'default'           => array(
                            'font-family'       => 'Source Sans Pro',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'line-height'       => '26px',
                            'color'             => '#a2a2a2'
                        )
                    ),
                ),
            );

              
            // Color Settings
            $this->sections[] = array(
                'icon'    => 'el-icon-brush',
                'title'   => __('Colors', 'asli_bejo'),
                'fields'  => array(
                    array(
                        'id'                        => 'info_link_color',
                        'type'                      => 'info',
                        'icon'                      => 'el-icon-info-sign',
                        'title'                     => __('Link Color', 'asli_bejo'),
                        'desc'                      => __('Link color settings.', 'asli_bejo'),
                    ),

                    array(
                        'id'                    => 'main_link_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Main Link Color', 'asli_bejo'),
                        'active'                => false,
                        'output'                => array('body a'),
                        'default'               => array(
                                                    'regular'  => '#7D910F',
                                                    'hover'    => '#E0BC51',
                        )
                    ),
                    array(
                        'id'                    => 'site_title_link',
                        'type'                  => 'link_color',
                        'title'                 => __('Site Title Link Color', 'asli_bejo'),
                        'active'                => false,
                        'output'                => array('header#header .site-title a'),
                        'default'               => array(
                                                    'regular'  => '#fff',
                                                    'hover'    => '#7D910F',
                        )
                    ),

                    array(
                        'id'                    => 'post_title_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Post Title Link color ', 'asli_bejo'),
                        'active'                => false,
                        'output'                => array('#main article.blog-post header.major .post-title a'),
                        'default'               => array(
                                                'regular'  => '#787878',
                                                'hover'    => '#575758',
                        )
                    ),

                    array(
                        'id'                    => 'meta_post_wp',
                        'type'                  => 'link_color',
                        'title'                 => __('Post Meta Link Color', 'asli_bejo'),
                        'active'                => false,
                        'output'                => array('article.hentry .entry-meta span a'),
                        'default'               => array(
                                                'regular'  => '#7D910F',
                                                'hover'    => '#E0BC51',
                        )
                    ),

                    array(
                        'id'                    => 'widgets_area',
                        'type'                  => 'link_color',
                        'title'                 => __('Widgets Link Color', 'asli_bejo'),
                        'active'                => false,
                        'output'                => array('.my-widgets-area a'),
                        'default'               => array(
                                                'regular'  => '#7D910F',
                                                'hover'    => '#E0BC51',
                        )
                    ),

                    array(
                        'id'                    => 'info_bg_color',
                        'type'                  => 'info',
                        'icon'                  => 'el-icon-info-sign',
                        'title'                 => __('Background Color', 'asli_bejo'),
                        'desc'                  => __('Background color settings.', 'asli_bejo'),
                    ),

                    array(
                        'id'                    => 'bg_tags_widgets',
                        'type'                  => 'background',
                        'title'                 => __('Tags Widgets Background Color', 'asli_bejo'),
                        'output'                => array('.widget_tag_cloud .widget-wrapper .tagcloud a'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'bg_tags_widgets_hover',
                        'type'                  => 'background',
                        'title'                 => __('Tags Widgets Background Hover Color', 'asli_bejo'),
                        'output'                => array('.widget_tag_cloud .widget-wrapper .tagcloud a:hover'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                        'background-color'      => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'button_bg_comment',
                        'type'                  => 'background',
                        'title'                 => __('Button Comments Background Color', 'asli_bejo'),
                        'output'                => array('.button.submit-button, .form-submit input[type="submit"].submit'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#E0BC51',
                        )
                    ),

                    array(
                        'id'                    => 'button_bg_comment_hover',
                        'type'                  => 'background',
                        'title'                 => __('Button Comments Background Hover Color', 'asli_bejo'),
                        'output'                => array('.button.submit-button:hover, .form-submit input[type="submit"].submit:hover'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#C9A741',
                        )
                    ),

                    array(
                        'id'                    => 'info_border_color',
                        'type'                  => 'info',
                        'icon'                  => 'el-icon-info-sign',
                        'title'                 => __('Border Color', 'asli_bejo'),
                        'desc'                  => __('Border color settings.', 'asli_bejo'),
                    ),

                    array( 
                        'id'                    => 'tags_border_color',
                        'type'                  => 'border',
                        'title'                 => __('Tags Widgets Border Color', 'asli_bejo'),
                        'all'                   => true,
                        'top'                   => true,
                        'left'                  => true,
                        'right'                 => true,
                        'bottom'                => true,
                        'output'                => array('.my-widgets-area .widget-wrapper .tagcloud a'),
                        'default'               => array(
                                                    'border-top'    => '1px',
                                                    'border-left'   => '1px',
                                                    'border-right'  => '1px',
                                                    'border-bottom' => '1px',
                                                    'border-style'  => 'solid',
                                                    'border-color'  => '#ccc'
                        )
                    ),  
                ),
            );

            // Social Networks
            $this->sections[] = array(
                'icon' => 'el-icon-user',
                'title' => __('Social Networks', 'asli_bejo'),
                'fields' => array(
                    array(
                        'id'                          => 'url_facebook',
                        'type'                        => 'text', 
                        'title'                       => __('Facebook Profile', 'asli_bejo'),
                        'desc'                        => __('Your facebook profile page.', 'asli_bejo'),
                        'placeholder'                 => 'http://facebook.com',
                        'default'                     => 'http://facebook.com'
                    ),

                    array(
                        'id'                          => 'url_twitter',
                        'type'                        => 'text', 
                        'title'                       => __('Twitter Profile', 'asli_bejo'),
                        'desc'                        => __('Your twitter profile page.', 'asli_bejo'),
                        'placeholder'                 => 'http://twitter.com',
                        'default'                     => 'http://twitter.com'
                    ),

                      array(
                        'id'                          => 'url_gplus',
                        'type'                        => 'text', 
                        'title'                       => __('Google+ Profile', 'asli_bejo'),
                        'desc'                        => __('Your google+ profile page.', 'asli_bejo'),
                        'placeholder'                 => 'http://plus.google.com',
                        'default'                     => 'http://plus.google.com'
                    ),

                    array(
                        'id'                          => 'url_youtube',
                        'type'                        => 'text', 
                        'title'                       => __('YouTube Profile', 'asli_bejo'),
                        'desc'                        => __('Your YouTube video page.', 'asli_bejo'),
                        'placeholder'                 => 'http://youtube.com',
                        'default'                     => 'http://youtube.com'
                    ),

                    array(
                        'id'                          => 'url_instagram',
                        'type'                        => 'text', 
                        'title'                       => __('Instagram Profile', 'asli_bejo'),
                        'desc'                        => __('Your instagram page.', 'asli_bejo'),
                        'placeholder'                 => 'http://instagram.com',
                        'default'                     => 'http://instagram.com'
                    ),

                    array(
                        'id'                          => 'url_linkedin',
                        'type'                        => 'text', 
                        'title'                       => __('Linkedin Profile', 'asli_bejo'),
                        'desc'                        => __('Your linkedin page.', 'asli_bejo'),
                        'placeholder'                 => 'http://linkedin.com',
                        'default'                     => 'http://linkedin.com'
                    ),

                    array(
                        'id'                          => 'url_pinterest',
                        'type'                        => 'text', 
                        'title'                       => __('Pinterest Profile', 'asli_bejo'),
                        'desc'                        => __('Your pinterest page.', 'asli_bejo'),
                        'placeholder'                 => 'http://pinterest.com',
                        'default'                     => 'http://pinterest.com'
                    ),
                )
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'asli_bejo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'asli_bejo')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'asli_bejo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'asli_bejo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'asli_bejo');
        }

        //  All the possible arguments for Redux.
        //  For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'             => 'bejo_option',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'         => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'      => $theme->get( 'Version' ),
                // Version that appears at the top of your panel
                'menu_type'            => 'submenu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'       => true,
                // Show the sections below the admin menu item or not
                'menu_title'           => __( 'My Options', 'asli_bejo' ),
                'page_title'           => __( 'My Options', 'asli_bejo' ),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'       => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography'     => true,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar'            => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon'     => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable'      => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode'             => false,
                // Show the time the page took to load, etc
                'update_notice'        => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer'           => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'        => 61,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'          => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'     => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'            => get_template_directory_uri() .'/images/theme-options.png',
                // Specify a custom URL to an icon
                'last_tab'             => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'            => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'            => 'asli_bejopanel',
                // Page slug used to denote the panel
                'save_defaults'        => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show'         => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark'         => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export'   => false,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'       => 60 * MINUTE_IN_SECONDS,
                'output'               => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'           => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'             => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'          => false,
                // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                    'hide'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'click mouseleave',
                        ),
                    ),
                )
            );

            // Panel Intro text -> before the form
            $this->args['intro_text'] = __('<p>If you like this theme, please consider giving it a 5 star rating on ThemeForest. <a href="http://themeforest.net/downloads" target="_blank">Rate now</a>.</p>', 'asli_bejo');

            // Add content after the form.
            // $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'asli_bejo');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}