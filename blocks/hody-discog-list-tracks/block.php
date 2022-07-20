<?php
//Variables
$number_of_posts = block_value( 'hody-discog-number-of-tracks' );
$category = block_value( 'category' );
$final_query_global = array( 
    'post_type' => 'track',
    'posts_per_page' => $number_of_posts,
    'category_name' => $category->name,
    );
$track_item_style = 'class="track-item';
if ( block_value( 'hody-discog-show-hide-list-tracks-stream-icons' ) ) {
    $track_item_style .= '"';
} else {
    $track_item_style .= '" style="grid-template-columns: 1fr 0.35fr;"';
}
// The Query
$the_query = new WP_Query($final_query_global);

// The Loop
if ($the_query->have_posts()) { ?>
    <ol class="tracklist-mordern-wrapper <?php block_field('className'); ?>">
     
    
    <style>
            .track-streaming-services a{
            color: <?php block_field( 'hody-discog-track-stream-icon-color' ); ?>
        }
        </style>
    <?php
    while ($the_query->have_posts()) {
        $the_query->the_post();
        
        // Variables
        //$categories = get_the_category();
        //$first_cat = $categories[0]->name;
       // $first_cat_url = get_category_link( $categories[0]->term_id );
        ?>
        <li <?php post_class(); ?>>
        <div <?php echo $track_item_style; ?>>
            <div class="track-poster-num"><h3><a class="track-list-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
            <div class="track-runtime"> 
                    <?php  if ( !empty ( rwmb_get_value( 'hody_discog_track_runtime'))) {  ?>
                        <span> <?php number_format( rwmb_the_value( 'hody_discog_track_runtime' ))  ?> </span><?php } ?>
                        <?php  if ( !empty ( rwmb_get_value( 'hody_discog_track_sample_audio'))) {  ?>
                        <audio playsinline class="<?php block_field('className'); ?> audio-player--icon-and-playtime"  src="<?php rwmb_the_value( 'hody_discog_track_sample_audio' ); ?>" data-plyr-config='{ "title": "sample", "autopause": true, }'></audio>
                        <?php } ?>
            </div>
            <?php if ( block_value( 'hody-discog-show-hide-list-tracks-stream-icons' ) ) { ?>
            <div class="track-streaming-services">
                        <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_spotify_url'))) {  ?>
                        <span class="icon-grid-item">
	 				        <a  href="<?php rwmb_the_value( 'hody_discog_track_spotify_url' ); ?>" class="discog-icon discog-social-icon discog-social-icon-spotify" target="_blank">
	 					    <span class="tooltip">Spotify</span>
	 					    <i class="fab fa-spotify"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_soundcloud_url'))) {  ?>
	 					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_soundcloud_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-soundcloud" target="_blank">
	 					    <span class="tooltip">Soundcloud</span>
	 					    <i class="fab fa-soundcloud"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_youtube_url'))) {  ?>
	 					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_youtube_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-youtube" target="_blank">
	 					    <span class="tooltip">Youtube</span>
	 					    <i class="fab fa-youtube"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_itunes_url'))) {  ?>
	 					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_itunes_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-apple" target="_blank">
	 					    <span class="tooltip">Apple</span>
	 					    <i class="fab fa-apple"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_deezer_url'))) {  ?>
     					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_deezer_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-apple" target="_blank">
	 					    <span class="tooltip">Deezer</span>
	 					    <i class="fab fa-deezer"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_boomplay_url'))) {  ?>
     					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_boomplay_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-apple" target="_blank">
	 					    <span class="tooltip">BoomPlay</span>
	 					    <i class="fab fa-b"></i>					</a>
	 			        </span> <?php } ?>
                         <?php if ( !empty ( rwmb_get_value( 'hody_discog_track_audiomack_url'))) {  ?>
     					<span class="icon-grid-item">
	 				        <a href="<?php rwmb_the_value( 'hody_discog_track_audiomack_url' ) ?>" class="discog-icon discog-social-icon discog-social-icon-apple" target="_blank">
	 					    <span class="tooltip">AudioMack</span>
	 					    <i class="fab fa-a"></i>					</a>
	 			        </span> <?php } ?>
            </div>
            <?php } else {
                
            }  ?>
    </li>
        <?php
    }
    echo '</ol>';
    
    ?> <script type="text/javascript">const players = Plyr.setup('.audio-player--icon-and-playtime');</script>
    <?php

} else {
    // no posts found
    ?> <p>Non Found </p> <span><?php block_field( 'is-this-post-template') ?> </span> <?php
}
/* Restore original Post Data */
wp_reset_postdata();
?>