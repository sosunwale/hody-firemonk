<?php
//Register a Block
add_action( 'enqueue_block_editor_assets', 'hody_discography_block_script_register' );
function hody_discography_block_script_register() {
   wp_enqueue_script( 'hody-discog-cta-block',  plugin_dir_url(__FILE__).'/hody-discog-cta-block/hody-discog-cta-block.js', array('wp-blocks', 'wp-i18n', 'wp-editor'), true,false);

}

// Register Global List Tracks Block 
use function Genesis\CustomBlocks\add_block;

add_action( 'genesis_custom_blocks_add_blocks', 'hody_discog_add_global_track_list_block' );
function hody_discog_add_global_track_list_block() {

    add_block(
        'hody-discog-list-tracks', 
        array( 
            'title'    => 'Tracks List', 
            'category' => 'theme', 
            'icon'     => 'audiotrack', 
            'keywords' => array( 'music', 'tracks list', 'track' ),
            'displayModal'  => true, 
            'fields'   => array( 
                'hody-discog-number-of-tracks' => array( 
                    'label'   => 'Tracks to show',
                    'location' => 'inspector',
                    'control' => 'range', 
                    'type'    => 'integer',
                    'step'    => 1,
                    "min"     => 0,
                    "max"     => 100,
                    'width'   => '100', 
                ), 
                'hody-discog-show-hide-list-tracks-stream-icons' => array( 
                    'label'   => 'Show/Hide Streaming icons',
                    'location' => 'inspector', 
                    'control' => 'toggle',
                    'type'    => 'boolean', 
                    'width'   => '100', 
                ),
                'hody-discog-track-stream-icon-color' => array( 
                    'label'   => 'Icon Color',
                    'location' => 'editor', 
                    'control' => 'color',
                    'default'    => '#ffffff',
                    'type'      => 'string',
                    'order'     => 2, 
                    'width'   => '100', 
                ),
            ), 
        ) 
    ); 
}


/* Register Album Tracklst Relationship Block 
*   Like the above, we are using genesis custom blocks to generate a query showing tracks conntected to albums
*   from Metabox relationships.
*
*/

add_action( 'genesis_custom_blocks_add_blocks', 'hody_discog_add_album_tracklist_relationship_block' );
function hody_discog_add_album_tracklist_relationship_block() {

    add_block(
        'hody-discog-album-tracklist', 
        array( 
            'title'    => 'Album Tracklist', 
            'category' => 'theme', 
            'icon'     => 'audiotrack', 
            'keywords' => array( 'music', 'tracklist', 'related' ),
            'displayModal'  => true, 
            'fields'   => array( 
                'hody-discog-album-tracklist--show-hide-list-tracks-stream-icons' => array( 
                    'label'   => 'Show/Hide Streaming icons',
                    'location' => 'inspector', 
                    'control' => 'toggle',
                    'type'    => 'boolean', 
                    'width'   => '100', 
                ),
                'hody-discog-album-tracklist--stream-icon-color' => array( 
                    'label'   => 'Icon Color',
                    'location' => 'editor', 
                    'control' => 'color',
                    'default'    => '#ffffff',
                    'type'      => 'string',
                    'order'     => 2, 
                    'width'   => '100', 
                ),
                'hody-discog-album-tracklist--inherit-query' => array( 
                    'label'   => 'Inherit query from template',
                    'location' => 'inspector', 
                    'control' => 'toggle',
                    'type'    => 'boolean', 
                    'width'   => '100', 
                ),
                'hody-discog-album-tracklist--album-id' => array( 
                    'label'   => 'Album Id',
                    'location' => 'inspector', 
                    'control' => 'text',
                    'type'      => 'string',
                    'order'     => 2, 
                    'width'   => '100', 
                ),
            ), 
        ) 
    ); 
}

?> 