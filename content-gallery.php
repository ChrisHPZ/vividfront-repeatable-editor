<?php
    global $features_metabox; 
    $contents_meta = get_post_meta(get_the_ID(), $features_metabox->get_the_id(), true );

    if( $contents_meta ) :
        foreach( $contents_meta as $cm ) : 
            for( $i = 0; $i < count($cm); $i++ ) : ?>
                <div class="section-gallery">
                    <?php echo apply_filters( 'meta_content', $cm[$i]['textarea'] ); ?>
               </div><!-- end div section-gallery -->
            <?php endfor; ?>
        <?php endforeach; ?>
    <?php endif; ?>