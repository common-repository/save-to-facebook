<?php
/*
Plugin Name:Save To Facebook
Plugin URI:http://www.miraclewebsoft.com
Description:Save to facebook button on pages, posts or homepage. Place save to facebook button where you want in wordpress.
Version:1
Author:sony7596, miraclewebssoft
Author URI:http://www.miraclewebsoft.com
License:GPL2
License URI:https://www.gnu.org/licenses/gpl-2.0.html
*/
if (!defined('ABSPATH')) {
    exit;
}

if (!defined("SAVE_TO_FACEBOOK_VERSION_CURRENT")) define("SAVE_TO_FACEBOOK_VERSION_CURRENT", '1');
if (!defined("SAVE_TO_FACEBOOK_URL")) define("SAVE_TO_FACEBOOK_URL", plugin_dir_url( __FILE__ ) );
if (!defined("SAVE_TO_FACEBOOK_PLUGIN_DIR")) define("SAVE_TO_FACEBOOK_PLUGIN_DIR", plugin_dir_path(__FILE__));
if (!defined("SAVE_TO_FACBOOK_PLUGIN_NM")) define("SAVE_TO_FACBOOK_PLUGIN_NM", 'Save To Facebook');


Class SAVE_TO_FACEBOOK
{
    public $pre_name = 'save_to_facebook';

    public function __construct()
    {
        // Installation and uninstallation hooks
        register_activation_hook(__FILE__, array($this, $this->pre_name . '_activate'));
        register_deactivation_hook(__FILE__, array($this, $this->pre_name . '_deactivate'));
        add_action('admin_menu', array($this, $this->pre_name . '_setup_admin_menu'));
        add_action("admin_init", array($this, $this->pre_name . '_backend_plugin_js_scripts_filter_table'));
        add_action("admin_init", array($this, $this->pre_name . '_backend_plugin_css_scripts_filter_table'));
        add_action('admin_init', array($this, $this->pre_name . '_settings'));
        add_action('wp_head', array($this, $this->pre_name . '_header_hook_code'));
        add_filter('the_content', array($this, $this->pre_name . '_hook_post'));
    }

    public function save_to_facebook_on_load()
    {


    }

    public function save_to_facebook_setup_admin_menu()
    {
        add_submenu_page('options-general.php', __('Save To Facebook', 'save_to_facebook_td'), SAVE_TO_FACBOOK_PLUGIN_NM, 'manage_options', 'save_to_facebook_slug', array($this, 'save_to_facebook_admin_page'));
    }

    public function save_to_facebook_admin_page()
    {
        include(plugin_dir_path(__FILE__) . 'views/dashboard.php');
    }

    function save_to_facebook_backend_plugin_js_scripts_filter_table()
    {
        wp_enqueue_script("jquery");
        wp_enqueue_script("save_to_facebook.js", SAVE_TO_FACEBOOK_URL . "assets/js/save_to_facebook.js");
    }

    function save_to_facebook_backend_plugin_css_scripts_filter_table()
    {
        wp_enqueue_style("save_to_facebook.css", SAVE_TO_FACEBOOK_URL . "assets/css/save_to_facebook.css");
    }

    public function save_to_facebook_activate()
    {

    }

    public function save_to_facebook_deactivate()
    {
    }


    function save_to_facebook_settings()
    {    //register our settings
        register_setting('save_to_facebook_group', 'stf_align');
        register_setting('save_to_facebook_group', 'stf_position');
        register_setting('save_to_facebook_group', 'btn_size');
        register_setting('save_to_facebook_group', 'stf_fb_api');
        register_setting('save_to_facebook_group', 'stf_hide_homepage');
        register_setting('save_to_facebook_group', 'stf_hide_page');
        register_setting('save_to_facebook_group', 'stf_hide_post');

    }

    function save_to_facebook_header_hook_code()
    {

        if (get_option('stf_fb_api')) {

             $api_key = get_option('stf_fb_api'); ?>

            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=<?php echo $api_key;?>";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <?php
        }

    }

    function save_to_facebook_hook_post($content){


        if(is_single() && get_option('stf_hide_post')){
            return $content;
        }
        if(is_page()&& get_option('stf_hide_page')){
            return $content;
        }
        if(is_front_page()&& get_option('stf_hide_homepage')){
            return $content;
        }

        $btn_size = get_option('btn_size')?get_option('btn_size'):'large';
        $btn_align = get_option('stf_align')?get_option('stf_align'):'left';
        $margin = '10px';
        $custom_content ="";

        if (!get_option('stf_fb_api')){
             return $content;
            }
        $button_fb = '<div style="width:100%; text-align:'.$btn_align.'; margin:'.$margin.' " class="fb-save" data-uri="'.get_permalink().'" data-size="'.$btn_size.'"></div>';

        if(get_option('stf_position') == 'before'){
            $custom_content = $button_fb;
            $custom_content .= $content;

        }
        elseif(get_option('stf_position') == 'after-before'){
            $custom_content = $button_fb;
            $custom_content .= $content;
            $custom_content .= $button_fb;
        }
        else{

            $content .= $button_fb;
            $custom_content .= $content;
        }

        return $custom_content;
    }
}

$SAVE_TO_FACEBOOK_OBJ = new SAVE_TO_FACEBOOK();
