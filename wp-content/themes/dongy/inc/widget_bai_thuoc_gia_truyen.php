<?php
/**
 * Example Widget Class
 */
class bai_thuoc_gia_truyen_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function bai_thuoc_gia_truyen_widget() {
        parent::WP_Widget(false, $name = 'Bai Thuoc Gia Truyen');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
        <?php echo $before_widget; ?>
        <?php if ( $title )
                  echo $before_title . $title . $after_title; ?>
        <div class="rpwe-block ">
            <ul class="rpwe-ul">
            <?php
                $args = array( 'post_type'=>'post', 'post__in'=>get_option('sticky_posts'), 'numberposts' => 6, 'order'=> 'DES', 'orderby' => 'date' );      
                $queryObj = new WP_Query( $args );
                //$queryObj = new WP_Query( 'post_type=post&posts_per_page=6&orderby=date&order=desc' );
                if ($queryObj->have_posts()) :
                    while ($queryObj->have_posts()) :
                        $queryObj->the_post();
                        $thumb_url = wp_get_attachment_thumb_url( get_post_thumbnail_id($queryObj->post->ID) );
                        if($thumb_url == "")
                        {                       
                            $thumb_url = catch_first_image_in_content($queryObj->post->post_content);
                        }
            ?>
                        <li class="rpwe-li rpwe-clearfix">
                            <a class="rpwe-img" href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute('echo=0'); ?>" rel="bookmark">
                                <img class="rpwe-alignleft rpwe-thumb" src="<?=$thumb_url?>" alt="<?php echo the_title_attribute('echo=0'); ?>" width="40">
                            </a>
                            <h3 class="rpwe-title">
                                <a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute('echo=0'); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h3>
                            <time class="rpwe-time published" datetime="<?php the_time('c'); ?>"><?php echo date( 'd/m/Y', strtotime( $queryObj->post->post_date ) );?></time>
                        </li>
            <?php 
                    endwhile; 
                endif;
            ?>
            </ul>
        </div>
        <!-- End Recent Posts -->

        <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {     
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);        
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) { 
        $title      = esc_attr($instance['title']);        
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>        
        <?php 
    }
} // end class bai_thuoc_gia_truyen_widget
add_action('widgets_init', create_function('', 'return register_widget("bai_thuoc_gia_truyen_widget");'));
?>