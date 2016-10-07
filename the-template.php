<?php
/*
* Template Name: The Template
*/
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['settings'] = get_option('epco_settings');

Timber::render('the-template.twig', $context);