<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    <h3 class="post_title_comment"><?php comments_number( esc_html__('0 Comments', 'prohire'), esc_html__('1 Comment', 'prohire'), esc_html__('% Comments', 'prohire') ); ?></h3>
    <?php wp_list_comments('callback=prohire_theme_comment'); ?>
    <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <div class="pagination_area">
        <nav>
            <ul class="pagination">
                <li> <?php paginate_comments_links( 
                        array(
                        'prev_text' => wp_specialchars_decode( 'Previous',ENT_QUOTES),
                        'next_text' => wp_specialchars_decode( 'Next',ENT_QUOTES),
                        ));  
                    ?>
                </li>
            </ul>
       </nav>
    </div>
    <?php endif; ?>
<?php endif; ?>  
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(       
        'class_form' => 'comment-form mt-40',                         
        'title_reply'=> esc_html__( 'Leave a comment', 'prohire' ),
        'fields' => apply_filters( 'comment_form_default_fields', array(
            'author' =>   ' <div class ="row"><div class="col-lg-6">
                                <div class="form_group mb-20">
                                  <input class="form_control" type="text" name="author" placeholder="'.esc_attr__('Name', 'prohire').'"/>
                                </div>
                            </div>',
            'email' =>    ' <div class="col-lg-6">
                                <div class="form_group mb-20">
                                  <input class="form_control" type="email" name="email" placeholder="'.esc_attr__('Email', 'prohire').'"/>
                                </div>
                            </div></div>',
        ) ),   
        'comment_field' => '<div class ="row"><div class="col-lg-12">
                                <div class="form_group mb-20">
                                    <textarea class="form_control" name="comment" '.$aria_req.' placeholder="'.esc_attr__('Write a comment...', 'prohire').'" required="required" data-error="'.esc_attr__('Please,leave us a message.', 'prohire').'"
                                        rows="6"></textarea>
                                </div>
                            </div></div>',   
        'label_submit' => esc_html__( 'Post a comment', 'prohire' ),
        'submit_button' =>  '<button type="submit" class="main-btn">'.esc_attr__(' %4$s', 'prohire').'</button>',
        'submit_field' =>   '<div class ="row"><div class="col-lg-12">
                                '.esc_attr__('%1$s', 'prohire').' '.esc_attr__('%2$s', 'prohire').'
                            </div></div>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',                 
      )
?>
<?php if ( comments_open() ) : ?>
  <?php comment_form($comment_args); ?>
<?php endif; ?> 