<?php 

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['post'] = new Timber\Post();

Timber::render( 'index.twig', $context );
