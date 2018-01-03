<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">
    <?php 
    if ( have_comments() ) : 
        global $comments_by_type;
        $comments_by_type = &separate_comments( $comments );
        if ( ! empty( $comments_by_type['comment'] ) ) : 
    ?>
    <section id="comments-list" class="comments">
        <h3 class="comments-title"><?php comments_number(); ?></h3>
        <?php if ( get_comment_pages_count() > 1 ) : ?>
        <nav id="comments-nav-above" class="comments-navigation" role="navigation">
            <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
        </nav>
    <?php endif; ?>
    <ul>
        <?php wp_list_comments( 'type=comment' ); ?>
    </ul>
    <?php if ( get_comment_pages_count() > 1 ) : ?>
    <nav id="comments-nav-below" class="comments-navigation" role="navigation">
        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
    </nav>
    <?php endif; ?>
    </section>
    <?php 
    endif; 
    if ( ! empty( $comments_by_type['pings'] ) ) : 
    $ping_count = count( $comments_by_type['pings'] ); 
    ?>
    <section id="trackbacks-list" class="comments">
    <h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'blankslate' ) : __( 'Trackback', 'blankslate' ) ); ?></h3>
    <ul>
    <?php wp_list_comments( 'type=pings&callback=blankslate_custom_pings' ); ?>
    </ul>
    </section>
    <?php 
    endif; 
    endif;
    if ( comments_open() )
    {
        $fields =  array(   'fields' => array(
                                            'author' =>
                                            '<div class="form-group comment-form-author"><label  class="control-label" for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                                            ( $req ? '<span class="required">*</span>' : '' ) .
                                            '<input  class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                                            '" size="30"' . $aria_req . ' /></div>',
                                            'email' =>
                                            '<div class="form-group comment-form-email"><label class="control-label" for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                                            ( $req ? '<span class="required">*</span>' : '' ) .
                                            '<input  class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                                            '" size="30"' . $aria_req . ' /></div>',
                                            'url' =>
                                              '<div class="form-group comment-form-url"><label class="control-label" for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                                              '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                                              '" size="30" /></div>'
                                            ),
                            'comment_field' =>  
                              '<div class="form-group comment-form-comment"><label class="control-label" for="url">' . __( 'Comment', 'domainreference' ) . '</label>' .
                              '<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></div>',                             
                           
                            'comment_notes_after' => '',  
                              );
     
       comment_form($fields); 
    }
    ?>
</section>

