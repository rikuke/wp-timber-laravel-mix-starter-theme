<?php /*
Template Name: Etusivu
Template Post Type: page
*/

use Timber\Post;
use Timber\Timber;

$context = Timber::get_context();
$post = new Post();
$context['post'] = $post;
Timber::render(array('pages/page-frontpage.twig', 'pages/page.twig'), $context);
