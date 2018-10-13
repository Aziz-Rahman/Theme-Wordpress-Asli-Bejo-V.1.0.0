<?php

global $bejo_option;

if ( $bejo_option['display_comments'] ): // check on/ off display comments

    // Do not delete these lines  
    if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
        die ( _e( 'Please do not load this page directly. Thanks!', 'asli_bejo' ) );

        if ( !empty( $post->post_password ) ) { // if there's a password
            if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  // and it doesn't match the cookie
    ?>
        <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'asli_bejo' ) ; ?></p>
    <?php
            return;
            }
        }
    ?>

    <?php if ( have_comments() ) : ?>

        <!-- START: COMMENT LIST -->
        <div class="article-widget">
            <div class="comments-widget">
                <h4 class="widget-title"><span><?php comments_number( __( 'No Comments', 'asli_bejo' ), __( '1 Comment', 'asli_bejo' ), __( '% Comments', 'asli_bejo' ) ); ?></span></h4>
                    <ul>
                        <?php wp_list_comments( 'callback=blog_aink_comment_list' ); ?>
                    </ul>
            
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                    <div class="navigation clearfix">
                        <span class="prev"><?php previous_comments_link(__( '&larr; Previous', 'asli_bejo' ), 0); ?></span>
                        <span class="next"><?php next_comments_link(__( 'Next &rarr;', 'asli_bejo' ), 0); ?></span>
                    </div>  
                <?php endif; ?>

            </div>
        </div>  
        <!-- END: COMMENT LIST -->
        
    <?php else : // or, if we don't have comments: ?>      
    <?php endif; // end have_comments() ?> 

    <!-- START: Respond -->
    <?php if ( comments_open() ) : ?>
        <div class="article-widget">
            <?php 
            comment_form( array(
                'title_reply'           =>  '<h4 class="widget-title"><span>'. __( 'Leave a Comment','asli_bejo' ) .'</span></h4>',
                'comment_notes_before'  =>  '',
                'comment_notes_after'   =>  '',
                'label_submit'          =>  __( 'Submit', 'asli_bejo' ),
                'cancel_reply_link'     =>  __( 'Cancel Reply', 'asli_bejo' ),
                'logged_in_as'          =>  '<p class="logged-user">' . sprintf( __( 'You are logged in as <a href="%1$s">%2$s</a> &#8212; <a href="%3$s">Logout &raquo;</a>', 'asli_bejo' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                'fields'                => array(
                    'author'                =>  '<div class="form-group col-60"><input type="text" name="author" id="input-name" class="input-s" value="" placeholder="'. __('Fullname', 'asli_bejo') .'" /></div>',
                'email'                 =>  '<div class="form-group col-60"><input type="text" name="email" id="input-email" class="input-s" value=""  placeholder="'. __('Email Address', 'asli_bejo') .'" /></div>',
                'url'                   =>  '<div class="form-group col-60"><input type="text" name="url" id="input-email" class="input-s" value="" placeholder="'. __('Web URL','asli_bejo') .'" /></div>'
                                        ),
                'comment_field'         =>  '<div class="form-group col-100"><textarea name="comment" id="message" placeholder="'. __('Message', 'asli_bejo') .'" /></textarea></div>',
                'label_submit'          => __('Submit','asli_bejo')
                ));
            ?>
        </div>
    <?php endif; // END: Respond ?>
<?php endif; // END: check on/ off comments ?>