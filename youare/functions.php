<?php
define ('FUNCTIONS', TEMPLATEPATH . '/functions');
define ('COPY', FUNCTIONS . '/youare.php');
require_once (FUNCTIONS . '/comments.php');
if (get_option('twitter_username') && !get_option('Y_twitter')) update_option('Y_twitter', 'http://twitter.com/'.get_option('twitter_username'));
$themename = "You Are";
$shortname = "Y";
$theme_current_version = "0.1";
$theme_url = "http://jessicasideways.github.io/youare/";

// Stylesheet Auto Detect
$alt_stylesheet_path = TEMPLATEPATH;

$alt_stylesheets     = array();

if(is_dir($alt_stylesheet_path))
{
    if($alt_stylesheet_dir = opendir($alt_stylesheet_path))
    {
        while(($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false)
        {
            if(stristr($alt_stylesheet_file, '.css') !== false && $alt_stylesheet_file != 'style.css')
            {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }
    }
}

asort($alt_stylesheets);
require_once (FUNCTIONS . '/youare-admin.php');

class YouAre_Customize {
	// Theme Customizer
	function register( $wp_customize ) {
		//All our sections, settings, and controls will be added here
		$wp_customize->add_section('youare_altstyle', array(
			'title'	  => __('Alternate Styles','youare'),
			'prority' => 10
		));
		$wp_customize->add_setting('youare_altstyle_css',array(
			'default' => ''
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youare_altstyle_css', array(
			'label'		=>	__('Alternate Theme Stylesheet','youare'),
			'section'	=>	'youare_altstyle',
			'settings'	=>	'youare_altstyle_css',
			'priority'	=>	1,
			'type'		=>	'select',
			'choices'	=>	$alt_stylesheets
		)));
		$wp_customize->add_section('youare_author', array(
			'title'	  => __('Author Information','youare'),
			'prority' => 20
		));
		$wp_customize->add_setting('youare_author_blurb',array(
			'default' => ''
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youare_author_blurb', array(
			'label'		=>	__('Author Blurb','youare'),
			'section'	=>	'youare_author',
			'settings'	=>	'youare_author_blurb',
			'priority'	=>	1
		)));
		$wp_customize->add_setting('youare_author_photo',array(
			'default' => get_template_directory_uri() . '/img/portrait.gif'
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'youare_author_photo', array(
			'label'		=>	__('Author Photo', 'youare'),
			'section'	=>	'youare_author',
			'settings'	=>	'youare_author_photo',
			'priority'	=>	2
		)));
		$wp_customize->add_section('youare_identity', array(
			'title'	  => __('Online Identity','youare'),
			'prority' => 30
		));
		$wp_customize->add_section('youare_rss', array(
			'title'	   => __('RSS Service Options'),
			'priority' => 40
		));
		$wp_customize->add_setting('youare_rss_service', array(
			'default'	=>	''
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youare_rss_service', array(
			'label'		=>	__('Are you using an external RSS Service?','youare'),
			'section'	=>	'youare_rss',
			'settings'	=>	'youare_rss_service',
			'type'		=>	'select',
			'priority'	=>	1,
			'choices'	=>	array(
				'noservice'		=>	__('No Service'),
				'feedblitz'		=>	__('FeedBlitz'),
				'feedburner'	=>	__('FeedBurner')
			)
		)));
		$wp_customize->add_section('youare_ads', array(
			'title'	  => __('Sidebar Ads','youare'),
			'prority' => 50
		));
	
		$wp_customize->add_section('youare_footer', array(
			'title'	  => __('Footer Promo','youare'),
			'prority' => 60
		));
		$wp_customize->add_setting('youare_footer_promoon',array(
			'default' => ''
		));
		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'youare_footer_promoon',
		        array(
		            'label'          => __( 'Promote your company?', 'youare' ),
		            'section'        => 'youare_footer',
		            'settings'       => 'youare_footer_promoon',
					'priority'		 => 1
		        )
		    )
		);
		$wp_customize->add_setting('youare_footer_tagline',array(
			'default' => ''
		));
		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'youare_footer_tagline',
		        array(
		            'label'          => __( 'Company tag line or featured work', 'youare' ),
		            'section'        => 'youare_footer',
		            'settings'       => 'youare_footer_tagline',
					'priority'		 => 2
		        )
		    )
		);
		$wp_customize->add_setting('youare_footer_content',array(
			'default' => ''
		));
		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'youare_footer_content',
		        array(
		            'label'          => __( 'Company tag line or featured work', 'youare' ),
		            'section'        => 'youare_footer',
		            'settings'       => 'youare_footer_content',
					'priority'		 => 3
		        )
		    )
		);
		$wp_customize->add_section('youare_credits', array(
			'title'	  => __('Footer Credits &amp; Stats Code','youare'),
			'prority' => 70
		));
		$wp_customize->add_setting('youare_credits_copyright',array(
			'default' => ''
		));
		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'youare_credits_copyright',
		        array(
		            'label'          => __( 'Copyright (your name)', 'youare' ),
		            'section'        => 'youare_credits',
		            'settings'       => 'youare_credits_copyright'
		        )
		    )
		);
		$wp_customize->add_setting('youare_credits_statscode',array(
			'default' => ''
		));
	}
	public static function header_output() { 
		// Customizer CSS 
	    echo '<style type="text/css">';
		self::generate_css('#site-title a', 'color', 'header_textcolor', '#');
		self::generate_css('body', 'background-color', 'background_color', '#');
		self::generate_css('a', 'color', 'link_textcolor');
		echo '</style>'; 
	}
	
	public static function live_preview()
	{
		wp_enqueue_script( 
			  'youare-themecustomizer',
			  get_template_directory_uri().'/js/theme-customizer.min.js',
			  array( 'jquery','customize-preview' ),
			  '0.1',
			  true						//Put script in footer?
		);
	}
}
add_action( 'wp_head' , array( 'YouAre_Customize' , 'header_output' ) );
add_action( 'customize_preview_init', array('YouAre_Customize','live_preview') );
add_action( 'customize_register', array('YouAre_Customize','register') );

// Load theme CSS & JavaScript

function theme_css_js() {
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script('youare_js', get_template_directory_uri() . '/js/youare.js', array('jquery'), true);
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap_theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	$y_alt_stylesheet = get_option('Y_alt_stylesheet');
	if ( $y_alt_stylesheet && !($y_alt_stylesheet == 'Select a stylesheet:') ) {
		wp_enqueue_style('altstylesheet', get_template_directory_uri() . '/' . $y_alt_stylesheet);
	} else {
		wp_enqueue_style('altstylesheet', get_template_directory_uri() . '/1_default_colors.css');
	}
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}

add_action( 'wp_enqueue_scripts', 'theme_css_js');

// Posts function
function youare_archive_x_posts() {
	$count = 0;
	if (have_posts()) : while(have_posts()): the_post();
		$count++;
	endwhile; endif;
	echo "<p>";
	if ($count == '1') { echo "1 post"; } else { echo $count . " posts"; }
	echo "</p>";
}

// Date function
function youare_posted_date() {
	printf( __( '<time class="entry-date" datetime="%1$s">%2$s</time>', 'youare' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
function youare_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'youare' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}

// Meta description and keywords
function csv_tags() {
	$csv_tags = array();
	$list = array();
	if (get_the_tags()) {
		$list = get_the_tags();
		if (!empty($list)) {
			foreach($list as $tag) {
				$csv_tags[] = $tag->name;
			}
		}
	}
	foreach((get_the_category()) as $cat) {
		$csv_tags[] = $cat->cat_name;
	}
	if (count($list) > 0) {
		echo '<meta name="keywords" content="'.implode(',',$csv_tags).'" />';
	}
}

// Widgets Sidebar
if ( function_exists('register_sidebar_widget') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function set_canonical() {
  if ( is_single() or is_page() ) {
    global $wp_query;
    echo '<link rel="canonical" href="'.get_permalink($wp_query->post->ID).'"/>';
  }
}
add_action('wp_head', 'set_canonical');

// Comments hack: Permalinks: edit, delete or mark certain comments as spam without visiting your WordPress dashboard (http://www.smashingmagazine.com/2009/07/23/10-wordpress-comments-hacks/)

function delete_comment_link($id) {  
if (current_user_can('edit_post')) {  
echo '| <a title="Delete comment" href="'.admin_url("comment.php?action=cdc&c=$id").'">delete</a> ';  
echo '| <a title="Mark comment as spam" href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">mark as spam</a>';  
}  
}


// Comment hack: this code automatically rejects any request for comment posting coming from a browser (or, more commonly, a bot) that has no referrer in the request

function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == рс) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, bugger off!') );
    }
}

add_action('check_comment_flood', 'check_referrer');

// Numerical Page Navigation: (Lester Chan - http://lesterchan.net/wordpress/readme/wp-pagenavi.html)
### Function: Page Navigation Options
function pagenavi_init() {
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wp-pagenavi');
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('&laquo; First','wp-pagenavi');
	$pagenavi_options['last_text'] = __('Last &raquo;','wp-pagenavi');
	$pagenavi_options['next_text'] = __('&raquo;','wp-pagenavi');
	$pagenavi_options['prev_text'] = __('&laquo;','wp-pagenavi');
	$pagenavi_options['dotright_text'] = __('...','wp-pagenavi');
	$pagenavi_options['dotleft_text'] = __('...','wp-pagenavi');
	$pagenavi_options['style'] = 1;
	$pagenavi_options['num_pages'] = 5;
	$pagenavi_options['always_show'] = 0;
	return $pagenavi_options;
}

### Function: Page Navigation: Boxed Style Paging
function wp_pagenavi($before = '', $after = '') {
	global $wpdb, $wp_query; 
	$pagenavi_options = array();
	$pagenavi_options = pagenavi_init();

	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		
		/*
		$numposts = 0;
		if(strpos(get_query_var('tag'), " ")) {
		    preg_match('#^(.*)\sLIMIT#siU', $request, $matches);
		    $fromwhere = $matches[1];			
		    $results = $wpdb->get_results($fromwhere);
		    $numposts = count($results);
		} else {
			preg_match('#FROM\s*+(.+?)\s+(GROUP BY|ORDER BY)#si', $request, $matches);
			$fromwhere = $matches[1];
			$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		}
		$max_page = ceil($numposts/$posts_per_page);
		*/
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div class="wp-pagenavi">'."\n";
			switch(intval($pagenavi_options['style'])) {
				case 1:
				
					if(!empty($pages_text)) {
						echo '<span class="pages">&#8201;'.$pages_text.'&#8201;</span>';
					}					
					if ($start_page >= 2 && $pages_to_show < $max_page) {
						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<a href="'.clean_url(get_pagenum_link()).'" title="'.$first_page_text.'">&#8201;'.$first_page_text.'&#8201;</a>';
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotleft_text'].'&#8201;</span>';
						}
					}
					previous_posts_link($pagenavi_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<span class="current">&#8201;'.$current_page_text.'&#8201;</span>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.clean_url(get_pagenum_link($i)).'" title="'.$page_text.'">&#8201;'.$page_text.'&#8201;</a>';
						}
					}
					next_posts_link($pagenavi_options['next_text'], $max_page);
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotright_text'].'&#8201;</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" title="'.$last_page_text.'">&#8201;'.$last_page_text.'&#8201;</a>';
					}
					break;
				case 2;
					echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
						}
					}
					echo "</select>\n";
					echo "</form>\n";
					break;
			}
			echo '</div>'.$after."\n";
		}
	}
}



// Monthly archive grouped by year (Oriol Morell - http://oriolmorell.cat)

function get_year_archives($type='monthly', $show_post_count = false) {
        global $month, $wpdb;

        // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
        $archive_date_format_over_ride = 0;

        $now = current_time('mysql');

	$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts WHERE post_date < '
$now' AND post_date != '0000-00-00 00:00:00' AND post_status = 'publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC" . $limit);
                if ( $arcresults ) {
                        $afterafter = $after;
			$act_year=0;
			$output="";
                        foreach ( $arcresults as $arcresult ) {
				if ($act_year!=$arcresult->year) {
					if (strlen($output)) {
						$output.="</ul></li>";
					} 
					$act_year=$arcresult->year;
					$output.="<li>".$act_year.": <ul class='months'>";
				}
                                $url = get_month_link($arcresult->year, $arcresult->month);
                                if ( $show_post_count ) {
                                        $text = sprintf('%s', substr($month[zeroise($arcresult->month,2)],0,3));
                                        $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
                                } else {
                                        $text = sprintf('%s', substr($month[zeroise($arcresult->month,2)],0,3));
                                }
                                $output.="<li>".get_archives_link($url, $text, $format, $before, $after)."</li>";
                        }
			echo "<ul class='year_arch'>".$output."</ul></li></ul>";
	        }
}


// Gravatar Favicon (Patrick Chia - http://patrick.bloggles.info/plugins/)

if ( !function_exists( 'get_favicon' ) ) :
function get_favicon( $id_or_email, $size = '96', $default = '', $alt = false){
	$avatar = get_avatar($id_or_email, $size, $default, $alt);

	$openPos = strpos($avatar, 'src=\'');
	$closePos = strpos(substr($avatar, ($openPos+5)), '\'');
	$newAvatar = substr($avatar, ($openPos+5), ($closePos-($openPos+5)) );
	
	return $newAvatar;
}
endif;

function blog_favicon() {
	$apple_icon = get_favicon( get_bloginfo('admin_email'), 60 );
	$favicon_icon = get_favicon( get_bloginfo('admin_email'), 18 );

	if ( get_option('show_avatars') ) {
		echo "<link rel=\"apple-touch-icon\" href=\"$apple_icon\" />\n";
		echo "<link rel=\"shortcut icon\" type=\"image/png\" href=\"$favicon_icon\" />\n";
	}
}

function admin_logo() {
	$admin_logo = get_favicon( get_bloginfo('admin_email'), 31 );

	if ( get_option('show_avatars') ) {
	?>
	<style type="text/css">
		#header-logo{background: transparent url( <?php echo $admin_logo; ?> ) no-repeat scroll center center;
		-moz-border-radius: 5px;
		-webkit-border-bottom-left-radius: 5px;	-webkit-border-bottom-right-radius: 5px; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px;
		-khtml-border-bottom-left-radius: 5px;-khtml-border-bottom-right-radius: 5px;-khtml-border-top-left-radius: 5px;-khtml-border-top-right-radius: 5px;
		border-bottom-left-radius: 5px;	border-bottom-right-radius: 5px;border-bottom-top-radius: 5px;border-bottom-top-radius: 5px;}
		</style>
	<?php
	}
}

function add_feed_logo() {
	$feed_logo = get_favicon( get_bloginfo('admin_email'), 48 );
	echo "
   <image>
    <title>". get_bloginfo('name')."</title>
    <url>". $feed_logo ."</url>
    <link>". get_bloginfo('siteurl') ."</link>
   </image>\n";
}

add_action( 'wp_head', "blog_favicon" );
add_action( 'admin_head', 'blog_favicon' );
add_action( 'login_head', 'blog_favicon' );
add_action( 'admin_head', 'admin_logo' );
add_action('rss_head', add_feed_logo );
add_action('rss2_head', add_feed_logo );
?>
<?php if ( !function_exists('y_addgravatar') ) {
	function y_addgravatar( $avatar_defaults ) {
		$myavatar = get_bloginfo('template_directory').'/images/youare_gravatar.png';
                //default avatar
		$avatar_defaults[$myavatar] = 'YouAre.com';

		return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'y_addgravatar' );
}

 ?>
<?php remove_action('wp_head', 'wp_generator'); ?>
<?php remove_action('wp_head', 'rsd_link'); ?>
<?php remove_action('wp_head', 'wlwmanifest_link'); ?>