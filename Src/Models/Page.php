<?php

namespace Wordpress\PluginName\Models;

use Wordpress\PluginName\Database\Initialization\Model;

/**
 * used for creating dynamic pages for the wordpress links
 * post => page
 * post_author => creator set to 1
 * post_date & post_date_gmt => timestamp
 * post_title => page title
 * post_content => main content
 * post_excerpt => set it to null
 * post_status => must be publish 
 * comment_status => open or closed
 * ping_status => set to closed 
 * to_ping & pinged => set to null
 * post_modified & post_modified_gmt => timestamp
 * post_content_filtered => set to null
 * post_password => to lock it
 * post_name => which will be the link to be accessed via website url
 * post_parent id for the parent page if u want to make sub page to the main page set to 0 if it parent page
 * guid => which will be the link to be accessed via website url using the following syntax home/?page_id=1 for example
 * menu_order priority 1,2,3
 * post_type => always [must] set it to page
 * post_mime_type => set to null
 * comment_count => set to null 0
 */
class Page extends Model
{
    protected $table = 'wp_posts';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'post_author',
        'post_date',
        'post_content',
        'post_title',
        'post_status',
        'post_excerpt',
        'comment_status',
        'ping_status',
        'post_password',
        'post_name',
        'to_ping',
        'pinged',
        'post_modified',
        'post_modified_gmt',
        'post_content_filtered',
        'post_parent',
        'guid',
        'menu_order',
        'post_type',
        'post_mime_type',
        'comment_count'
    ];
}
