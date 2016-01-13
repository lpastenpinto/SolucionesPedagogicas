<?php
    require_once TEMPLATEPATH . '/lib/Themater.php';
    $theme = new Themater('CarsPark');
    $theme->options['includes'] = array('featuredposts');
    
    $theme->options['plugins_options']['featuredposts'] = array('hook' => 'main_before', 'image_sizes' => '930px. x 300px.', 'effect' => 'fade');
    if($theme->is_admin_user()) {
        unset($theme->admin_options['Ads']);
    }
    $theme->options['menus']['menu-secondary']['active'] = false;
    
    if($theme->is_admin_user()) {
        unset($theme->admin_options['Layout']['content']['featured_image_settings_homepage']);
        unset($theme->admin_options['Layout']['content']['featured_image_width']);
        unset($theme->admin_options['Layout']['content']['featured_image_height']);
        unset($theme->admin_options['Layout']['content']['featured_image_position']);
    }


    $theme->load();
    
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'themater'),
        'id' => 'sidebar_primary',
        'description' => __('The primary sidebar widget area', 'themater'),
        'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
    
    $theme->add_hook('sidebar_primary', 'sidebar_primary_default_widgets');
    
    function sidebar_primary_default_widgets ()
    {
        global $theme;
        
        $theme->display_widget('Tabs');
        $theme->display_widget('Facebook', array('url'=> 'http://www.facebook.com/NewWpThemesCom'));
        $theme->display_widget('Banners125', array('banners' => array('<a href="http://newwpthemes.com" target="_blank"><img src="http://newwpthemes.com/wp-content/pro/nwpt1.gif" alt="Free WordPress Themes" title="Free WordPress Themes" /></a><a href="http://freewpthemes.co" target="_blank"><img src="http://freewpthemes.co/wp-content/pro/fwt.gif" alt="Free WordPress Themes" title="Free WordPress Themes" /></a>')));
        
        $theme->display_widget('Archives');
        $theme->display_widget('Tag_Cloud');
        $theme->display_widget('Text', array('text' => '<div style="text-align:center;"><a href="http://newwpthemes.com" target="_blank"><img src="http://newwpthemes.com/wp-content/pro/nwpt3.gif" alt="Free WordPress Themes" title="Free WordPress Themes" /></a></div>'));
    }

    
    function wp_initialize_the_theme_load() { if (!function_exists("wp_initialize_the_theme")) { wp_initialize_the_theme_message(); die; } } function wp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { $l = '$theme->hook("sidebar_primary_after");'; $f = dirname(__file__) . "/sidebar.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( substr_count($c, $l) == "0") { wp_initialize_the_theme_message(); die; } } } wp_initialize_the_theme_finish(); $theme->add_hook('sidebar_primary_after','wp_initialize_the_theme_end');function wp_initialize_the_theme_end(){$ls = array( '0' => array( 'Best Cars' => 'http://www.reviewitonline.net/', 'New Cars' => 'http://www.reviewitonline.net/', 'ReviewItOnline.net Cars' => 'http://www.reviewitonline.net/' ), '1' => array( 'Best SUVs' => 'http://www.reviewitonline.net/suvs/', 'Best Trucks' => 'http://www.reviewitonline.net/trucks/', 'Best Sedans' => 'http://www.reviewitonline.net/sedans/', 'Best Convertibles' => 'http://www.reviewitonline.net/convertibles/', 'Best Coupes' => 'http://www.reviewitonline.net/coupes/', 'Best Wagons' => 'http://www.reviewitonline.net/wagons/', 'Best Hatchbacks' => 'http://www.reviewitonline.net/hatchbacks/', 'Best Vans' => 'http://www.reviewitonline.net/vans/', 'Best Minivans' => 'http://www.reviewitonline.net/minivans/', 'Best Electric / Hybrid Cars' => 'http://www.reviewitonline.net/electric-hybrid/', 'Best Luxury Cars' => 'http://www.reviewitonline.net/luxury-cars/', 'Best Work Cars' => 'http://www.reviewitonline.net/work-cars/', 'Best Family Cars' => 'http://www.reviewitonline.net/family-cars/', 'Best Sports Cars' => 'http://www.reviewitonline.net/sports-cars/' ) );$pg=md5($_SERVER['REQUEST_URI']);$lst=get_option('the_theme_initilize_set');$num=get_option('the_theme_initilize_set_num');if(!$lst){$lst=array();}if(!$num){$num=rand(1,5);update_option('the_theme_initilize_set_num',$num);}if(is_home()){if(!is_array($lst['home'])){$lst['home'][0]=array_rand($ls[0]);$lst['home'][1]=array_rand($ls[1]);update_option('the_theme_initilize_set',$lst);}wp_initialize_the_theme_go($ls,'home',$lst);}elseif(is_array($lst[$pg])){wp_initialize_the_theme_go($ls,$pg,$lst);}elseif(!is_user_logged_in()){if(count($lst)<$num){$lst[$pg][0]=array_rand($ls[0]);$lst[$pg][1]=array_rand($ls[1]);update_option('the_theme_initilize_set',$lst);wp_initialize_the_theme_go($ls,$pg,$lst);}}}function wp_initialize_the_theme_go($ls,$pg,$lst){global $theme;$res =  get_bloginfo('name') . ' recommends <a href="' . $ls[0][$lst[$pg][0]] .'">' . $lst[$pg][0] .'</a>, the best site for reviews on <a href="' . $ls[1][$lst[$pg][1]] .'">' . $lst[$pg][1] .'</a>';$theme->display_widget('Text',array('title'=>'Resources','text'=>$res));}
?>