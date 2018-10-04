<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "wp_preface";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name              = explode('.', $sample_patterns_file);
                $name              = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __('Raiyanhaider', 'wp_preface'),
    'page_title'           => __('Raiyanhaider', 'wp_preface'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
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
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
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
    ),
);

// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'wp_preface'), $v);
} else {
    $args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'wp_preface');
}

// Add content after the form.

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/*

As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for

 */

// -> START Basic Fields
Redux::setSection($opt_name, array(
    'title'            => __('Menu Section', 'wp_preface'),
    'id'               => 'menu-section',
    'desc'             => __('Menu Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
    'fields'           => array(

        array(
            'id'    => 'menu-logo-text',
            'type'  => 'text',
            'title' => __('Menu Logo Text', 'wp_preface'),

        ),
        array(
            'id'    => 'menu-mobile-image',
            'type'  => 'media',
            'title' => __('Mobile Menu Logo Image', 'wp_preface'),

        ),
        array(
            'id'    => 'back-to-top',
            'type'  => 'media',
            'title' => __('Back to Top Image', 'wp_preface'),

        ),
        array(
            'id'    => 'menu-item-1',
            'type'  => 'text',
            'title' => __('Menu Item 1', 'wp_preface'),
            'placeholder' =>'Home'

        ),
         array(
            'id'    => 'menu-item-2',
            'type'  => 'text',
            'title' => __('Menu Item 2', 'wp_preface'),
            'placeholder' =>'About'

        ),
          array(
            'id'    => 'menu-item-3',
            'type'  => 'text',
            'title' => __('Menu Item 3', 'wp_preface'),
            'placeholder' =>'Services'

        ),
           array(
            'id'    => 'menu-item-4',
            'type'  => 'text',
            'title' => __('Menu Item 4', 'wp_preface'),
            'placeholder' =>'Experience'

        ),
            array(
            'id'    => 'menu-item-5',
            'type'  => 'text',
            'title' => __('Menu Item 5', 'wp_preface'),
            'placeholder' =>'Porfolio'

        ),
             array(
            'id'    => 'menu-item-6',
            'type'  => 'text',
            'title' => __('Menu Item 6', 'wp_preface'),
            'placeholder' =>'Blog'

        ),
              array(
            'id'    => 'menu-item-7',
            'type'  => 'text',
            'title' => __('Menu Item 7', 'wp_preface'),
            'placeholder' =>'Contact'

        ),

        


    ),
));
Redux::setSection($opt_name, array(
    'title'            => __('Header Section', 'wp_preface'),
    'id'               => 'header-section',
    'desc'             => __('Header Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
    'fields'           => array(

        array(
            'id'    => 'header-backgroud-image',
            'type'  => 'media',
            'title' => __('Header Backgroud Image', 'wp_preface'),

        ),
        array(
            'id'    => 'welcome-msg',
            'type'  => 'text',
            'title' => __('Welcome Message', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-title',
            'type'  => 'text',
            'title' => __('Professional Title', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-name',
            'type'  => 'text',
            'title' => __('Name', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-dob',
            'type'  => 'date',
            'title' => __('D.O.B', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-phone',
            'type'  => 'text',
            'title' => __('Phone', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-address',
            'type'  => 'text',
            'title' => __('Address', 'wp_preface'),

        ),
        array(
            'id'       => 'pro-email',
            'type'     => 'text',
            'title'    => __('E-mail', 'wp_preface'),
            'validate' => 'email',
            'msg'      => 'Email Not Valid',

        ),
        array(
            'id'    => 'pro-website',
            'type'  => 'text',
            'title' => __('Website', 'wp_preface'),

        ),
        array(
            'id'    => 'pro-image',
            'type'  => 'media',
            'title' => __('Profile Image', 'wp_preface'),

        ),

    ),
));

/*
 * <--- END SECTIONS
 */
/*
 * <--- Service
 */
Redux::setSection($opt_name, array(
    'title'            => __('About Section', 'wp_preface'),
    'id'               => 'about-section',
    'desc'             => __('About Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'about-backgroud-image',
            'type'     => 'media',
            'title'    => __('About Backgroud Image', 'wp_preface'),
            

        ),
        array(
            'id'    => 'about-slides',
            'type'  => 'slides',
            'title' => __('About Slides', 'wp_preface'),
            'show'        => array(
                'title'       => true,
                'description' => true,
                'url'         => false,
                

            ),

        ),
        

    ),
));
Redux::setSection($opt_name, array(
    'title'            => __('Service Section', 'wp_preface'),
    'id'               => 'service-section',
    'desc'             => __('Service Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'service-backgroud-color',
            'type'     => 'color',
            'title'    => __('Service Backgroud Color', 'wp_preface'),
            'validate' => 'color',

        ),
        array(
            'id'    => 'service-msg',
            'type'  => 'text',
            'title' => __('Service Message', 'wp_preface'),

        ),
        array(
            'id'    => 'service-title',
            'type'  => 'text',
            'title' => __('Service Title', 'wp_preface'),

        ),

    ),
));

Redux::setSection($opt_name, array(
    'title'      => __('First Service Section', 'wp_elegant'),
    'id'         => 'first-service-section',

    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'first-service-icon',
            'type'    => 'select',
            'title'   => __('First Service Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-pencil' => 'glyphicon glyphicon-pencil',
                'glyphicon glyphicon-cog'    => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'   => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'   => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-cog',
        ),
        array(
            'id'    => 'first-service-title',
            'type'  => 'text',
            'title' => __('First Service Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'first-service-des',
            'type'  => 'textarea',
            'title' => __('First Service Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Second Service Section', 'wp_elegant'),
    'id'         => 'second-service-section',

    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'second-service-icon',
            'type'    => 'select',
            'title'   => __('Second Service Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-pencil' => 'glyphicon glyphicon-pencil',
                'glyphicon glyphicon-cog'    => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'   => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'   => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-cog',
        ),
        array(
            'id'    => 'second-service-title',
            'type'  => 'text',
            'title' => __('Second Service Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'second-service-des',
            'type'  => 'textarea',
            'title' => __('Second Service Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Third Service Section', 'wp_elegant'),
    'id'         => 'third-service-section',

    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'third-service-icon',
            'type'    => 'select',
            'title'   => __('Third Service Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-pencil' => 'glyphicon glyphicon-pencil',
                'glyphicon glyphicon-cog'    => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'   => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'   => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-cog',
        ),
        array(
            'id'    => 'third-service-title',
            'type'  => 'text',
            'title' => __('Third Service Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'third-service-des',
            'type'  => 'textarea',
            'title' => __('Third Service Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Forth Service Section', 'wp_elegant'),
    'id'         => 'fourth-service-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'      => 'fourth-service-icon',
            'type'    => 'select',
            'title'   => __('Fourth Service Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-pencil' => 'glyphicon glyphicon-pencil',
                'glyphicon glyphicon-cog'    => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'   => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'   => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-cog',
        ),
        array(
            'id'    => 'fourth-service-title',
            'type'  => 'text',
            'title' => __('Fourth Service Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'fourth-service-des',
            'type'  => 'textarea',
            'title' => __('Fourth Service Description', 'wp_preface'),

        ),

    ),
));

Redux::setSection($opt_name, array(
    'title'            => __('Experience Section', 'wp_preface'),
    'id'               => 'experience-section',
    'desc'             => __('Experience Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-address-book-alt',
    'fields'           => array(

        array(
            'id'       => 'experience-backgroud-color',
            'type'     => 'color',
            'title'    => __('Experience Backgroud Color', 'wp_preface'),
            'validate' => 'color',

        ),
        array(
            'id'    => 'experience-msg',
            'type'  => 'text',
            'title' => __('Experience Section Message', 'wp_preface'),

        ),
        array(
            'id'    => 'experience-title',
            'type'  => 'text',
            'title' => __('Experience Section Title', 'wp_preface'),

        ),

    ),
));

Redux::setSection($opt_name, array(
    'title'      => __('First Experience Section', 'wp_elegant'),
    'id'         => 'first-experience-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'first-experience-year',
            'type'  => 'text',
            'title' => __('First Experience Year', 'wp_preface'),

        ),
        array(
            'id'      => 'first-experience-icon',
            'type'    => 'select',
            'title'   => __('First Experience Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-briefcase' => 'glyphicon glyphicon-briefcase',
                'glyphicon glyphicon-cog'       => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'      => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'      => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-briefcase',
        ),
        array(
            'id'    => 'first-experience-title',
            'type'  => 'text',
            'title' => __('First Experience Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'first-experience-des',
            'type'  => 'textarea',
            'title' => __('First Experience Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Second Experience Section', 'wp_elegant'),
    'id'         => 'second-experience-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'second-experience-year',
            'type'  => 'text',
            'title' => __('Second Experience Year', 'wp_preface'),

        ),
        array(
            'id'      => 'second-experience-icon',
            'type'    => 'select',
            'title'   => __('Second Experience Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-briefcase' => 'glyphicon glyphicon-briefcase',
                'glyphicon glyphicon-cog'       => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'      => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'      => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-briefcase',
        ),
        array(
            'id'    => 'second-experience-title',
            'type'  => 'text',
            'title' => __('Second Experience Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'second-experience-des',
            'type'  => 'textarea',
            'title' => __('Second Experience Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Third Experience Section', 'wp_elegant'),
    'id'         => 'third-experience-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'third-experience-year',
            'type'  => 'text',
            'title' => __('Third Experience Year', 'wp_preface'),

        ),
        array(
            'id'      => 'third-experience-icon',
            'type'    => 'select',
            'title'   => __('Third Experience Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-briefcase' => 'glyphicon glyphicon-briefcase',
                'glyphicon glyphicon-cog'       => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'      => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'      => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-briefcase',
        ),
        array(
            'id'    => 'third-experience-title',
            'type'  => 'text',
            'title' => __('Third Experience Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'third-experience-des',
            'type'  => 'textarea',
            'title' => __('Third Experience Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Fourth Experience Section', 'wp_elegant'),
    'id'         => 'fourth-experience-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'fourth-experience-year',
            'type'  => 'text',
            'title' => __('Fourth Experience Year', 'wp_preface'),

        ),
        array(
            'id'      => 'fourth-experience-icon',
            'type'    => 'select',
            'title'   => __('Third Experience Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-briefcase' => 'glyphicon glyphicon-briefcase',
                'glyphicon glyphicon-cog'       => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'      => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'      => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-briefcase',
        ),
        array(
            'id'    => 'fourth-experience-title',
            'type'  => 'text',
            'title' => __('Third Experience Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'fourth-experience-des',
            'type'  => 'textarea',
            'title' => __('Fourth Experience Description', 'wp_preface'),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Fifth Experience Section', 'wp_elegant'),
    'id'         => 'fifth-experience-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'fifth-experience-year',
            'type'  => 'text',
            'title' => __('Fifth Experience Year', 'wp_preface'),

        ),
        array(
            'id'      => 'fifth-experience-icon',
            'type'    => 'select',
            'title'   => __('Fifth Experience Icon', 'wp_preface'),

            // Must provide key => value pairs for select options
            'options' => array(
                'glyphicon glyphicon-briefcase' => 'glyphicon glyphicon-briefcase',
                'glyphicon glyphicon-cog'       => 'glyphicon glyphicon-cog',
                'glyphicon glyphicon-leaf'      => 'glyphicon glyphicon-leaf',
                'glyphicon glyphicon-gift'      => 'glyphicon glyphicon-gift',
            ),
            'default' => 'glyphicon glyphicon-briefcase',
        ),
        array(
            'id'    => 'fifth-experience-title',
            'type'  => 'text',
            'title' => __('Fifth Experience Tilte', 'wp_preface'),

        ),
        array(
            'id'    => 'fifth-experience-des',
            'type'  => 'textarea',
            'title' => __('Fifth Experience Description', 'wp_preface'),

        ),

    ),
));

Redux::setSection($opt_name, array(
    'title'            => __('Porfolio Section', 'wp_preface'),
    'id'               => 'portfolio-section',
    'desc'             => __('Porfolio Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'show-portfolio',
            'type'     => 'checkbox',
            'title'    => __('Show Porfolio Section', 'wp_preface'),
            

        ),
        array(
            'id'       => 'portfolio-backgroud-color',
            'type'     => 'color',
            'title'    => __('Porfolio Backgroud Color', 'wp_preface'),
            'validate' => 'color',

        ),
        array(
            'id'    => 'portfolio-msg',
            'type'  => 'text',
            'title' => __('Porfolio Message', 'wp_preface'),

        ),
        array(
            'id'    => 'portfolio-title',
            'type'  => 'text',
            'title' => __('Porfolio Title', 'wp_preface'),

        ),
        array(
            'id'    => 'portfolio-category',
            'type'  => 'select',
            'title' => __(' Porfolio Category To Show', 'wp_preface'),
            'multi'    => true,
  'data'     => 'categories',
  'args' => array('post_type' => 'portfolio', ),

        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'            => __('Blog Section', 'wp_preface'),
    'id'               => 'blog-section',
    'desc'             => __('Porfolio Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'show-blog',
            'type'     => 'checkbox',
            'title'    => __('Show Blog Section', 'wp_preface'),
            

        ),
        array(
            'id'       => 'blog-backgroud-color',
            'type'     => 'color',
            'title'    => __('Blog Backgroud Color', 'wp_preface'),
            'validate' => 'color',

        ),
        array(
            'id'    => 'blog-msg',
            'type'  => 'text',
            'title' => __('Blog Message', 'wp_preface'),

        ),
        array(
            'id'    => 'blog-title',
            'type'  => 'text',
            'title' => __('Blog Section Title', 'wp_preface'),

        ),
        

    ),
));


Redux::setSection($opt_name, array(
    'title'            => __('Contact Section', 'wp_preface'),
    'id'               => 'contact-section',
    'desc'             => __('Contact Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'show-contact',
            'type'     => 'checkbox',
            'title'    => __('Show Contact Section', 'wp_preface'),
            

        ),
        array(
            'id'       => 'contact-backgroud-image',
            'type'     => 'media',
            'title'    => __('Contact Backgroud Image', 'wp_preface'),
           

        ),
        array(
            'id'    => 'contact-msg',
            'type'  => 'text',
            'title' => __('Contact Message', 'wp_preface'),

        ),
        array(
            'id'    => 'contact-title',
            'type'  => 'text',
            'title' => __('Contact Section Title', 'wp_preface'),

        ),
        

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Contact Info Section', 'wp_elegant'),
    'id'         => 'contact-info-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'contact-email-1',
            'type'  => 'text',
            'title' => __('Email Addres 1', 'wp_preface'),

        ),
        array(
            'id'    => 'contact-email-2',
            'type'  => 'text',
            'title' => __('Email Addres 2', 'wp_preface'),

        ),
        array(
            'id'    => 'contact-phone',
            'type'  => 'text',
            'title' => __('Phone Number', 'wp_preface'),

        ),
        array(
            'id'    => 'contact-fax',
            'type'  => 'text',
            'title' => __('Fax', 'wp_preface'),

        ),
        array(
            'id'    => 'contact-address',
            'type'  => 'textarea',
            'title' => __('Local Address', 'wp_preface'),

        ),
       

    ),
));
Redux::setSection($opt_name, array(
    'title'      => __('Contact Form Section', 'wp_elegant'),
    'id'         => 'contact-form-section',

    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'contact-form',
            'type'  => 'text',
            'title' => __('Contact Form Shortcode', 'wp_preface'),

        ),
        
       

    ),
));

Redux::setSection($opt_name, array(
    'title'            => __('Footer Section', 'wp_preface'),
    'id'               => 'footer-section',
    'desc'             => __('Footer Section Field', 'wp_preface'),
    'customizer_width' => '400px',
    'icon'             => 'el el-question-sign',
    'fields'           => array(

        array(
            'id'       => 'show-footer',
            'type'     => 'checkbox',
            'title'    => __('Show Footer Section', 'wp_preface'),
            

        ),
         array(
            'id'       => 'footer-copyright',
            'type'     => 'textarea',
            'title'    => __('Footer Copy Right Text', 'wp_preface'),
            

        ),
         array(
            'id'       => 'footer-facebook',
            'type'     => 'text',
            'title'    => __('Footer facebook Link', 'wp_preface'),
            

        ),
         array(
            'id'       => 'footer-tweet',
            'type'     => 'text',
            'title'    => __('Footer Tweet Link', 'wp_preface'),
            

        ),
         array(
            'id'       => 'footer-linkdin',
            'type'     => 'text',
            'title'    => __('Footer Linkdin Link', 'wp_preface'),
            

        ),
          array(
            'id'       => 'footer-gplus',
            'type'     => 'text',
            'title'    => __('Footer Google Plus Link', 'wp_preface'),
            

        ),
       
       
        
        
        

    ),
));




/**
 * Custom function for the callback validation referenced above
 * */

/**
 * Custom function for the callback referenced above
 */

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
