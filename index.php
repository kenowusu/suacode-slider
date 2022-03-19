<?php
/*
 * Plugin Name: Suacode-Slider
 * Description: Mini plugin for suacode.ai testmonial slider
 * Version: 1.0.0
 * Author: Kenneth
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<?php
/*load custom javascript and stylesheet */
        add_action( 'wp_enqueue_scripts', 'suacode_stylesheet' );
        add_action( 'wp_enqueue_scripts', 'slick_js' );
        add_action('wp_enqueue_scripts','suacode_js');

        function suacode_stylesheet() {
        wp_enqueue_style( 'suacode_slider_style', plugins_url('/css/style.css', __FILE__),null,null);
        }
        
        function slick_js() {
                wp_enqueue_script( 'slick_js',plugins_url( '/js/slick.js', __FILE__ ),array('jquery'));
        }
        function suacode_js() {
        wp_enqueue_script( 'suacode_slider_js', plugins_url( '/js/script.js', __FILE__ ),array('jquery','slick_js'),null,true);
        }?>
<?php 
function suacode_slider($atts){
        $atts = array_change_key_case((array) $atts,CASE_LOWER);
    ob_start();?>     
        <div class='suaslider'>
            <!-- slider buttons -->
            <div class='suaslider-btn left' id='myPrevButton'><span><?php echo file_get_contents(plugins_url( '/img/left-arrow.svg', __FILE__ ));?></span></div>
            <div class='suaslider-btn right' id='myNextButton'><span><?php echo file_get_contents(plugins_url( '/img/right-arrow.svg', __FILE__ ));?></span></div>
            <div class='suaslider-container'>
               <?php
                $args = array(
                           'post_type'=>'testimonials',
                );

                $testimonial_posts = new WP_Query($args);
        
                if($testimonial_posts->have_posts()) :
                while($testimonial_posts->have_posts()) :
                $testimonial_posts->the_post();?>
                        <!-- start of slide -->
                        <div class='suaslider-slide'>
                          
                                <div class='suaslider-slide-student'>
                                        <div class='suaslider-slide-student-img'><?php the_post_thumbnail(array(100,100));?></div>
                                        <div class='suaslider-slide-student-description'>
                                        <div class='suaslider-slide-student-description-name' style='font-size:1rem;font-weight:bold'><?php the_title();?></div>
                                        <div class='suaslider-slide-student-description-title' style='font-size:1rem'><?php the_excerpt();?> </div>
                                  </div>
                                </div>
                                <div class='suaslider-slide-quoteimg'>
                                        <span><?php echo file_get_contents(plugins_url( '/img/quotation.svg', __FILE__ ));?></span>
                                </div>
                                
                                <div class='suaslider-slide-quote'><p> <?php the_content();?> </p></div>
                        </div>
                        <!--------end of slide--->
               <?php endwhile;?>
               <?php wp_reset_postdata();?>
                         </div>
                           </div>
                <?php else:?>
                <p>Hey, No Testimonials</p>
                <?php endif;?>
                <?php return ob_get_clean();?>
<?php }; ?>
<?php add_shortcode('suacode_slider','suacode_slider');?>
<?php function suacode_news(){
    ob_start();?>
    <div class="suanews-c">    
        <!-- slider buttons -->
        <button  class="suaslider-btn left" id="newsPrevButton"><?php echo file_get_contents(plugins_url( '/img/left-arrow.svg', __FILE__ ));?></span></button>
        <button class="suaslider-btn right" id="newsNextButton"><?php echo file_get_contents(plugins_url( '/img/right-arrow.svg', __FILE__ ));?></span></button>
        <div class="suanews-container">     
             <?php
                $args = array(
                           'post_type'=>'news',
                );
                $news_posts = new WP_Query($args);
                if($news_posts->have_posts()) :
                while($news_posts->have_posts()) :
                $news_posts->the_post();?>
                        <!-- start of slide -->
                        <div class="suanews">
                            <a href="<?php the_permalink();?>"  target="_blank" class="suanews-img">
                                <?php the_post_thumbnail(363,254);?>
                                <div class="suanews-img-overlay">
                                    <div><img src="<?php echo plugins_url( '/img/link.svg', __FILE__ );?>" alt=""></div>
                                    
                                </div>
                            </a>
                            <div class="suanews-title">
                            <h2><?php the_title();?></h2>
                            </div>
                            <!-- <div class="suanews-excerpt">
                                <p></p>    
                            </div> -->
                        </div>
                        
                        <!--------end of slide--->
               <?php endwhile;?>
               <?php wp_reset_postdata();?>
                           </div>
                           <div>
                <?php else:?>
                <p>No Latest News</p>
                <?php endif;?>
                <?php return ob_get_clean();?>
<?php };?>
<?php add_shortcode('suacode_news','suacode_news');?>
