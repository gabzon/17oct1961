<?php

/*
Title: Options
Post Type: post
*/

piklist('field', [
    'type'      => 'select',
    'field'     => 'article_year',
    'label'     => 'Année',
    'value'     => 'none',
    'choices'   => ['' => 'Choose Menu'] + piklist( get_terms(['taxonomy' => 'annee']), ['slug','name'] )
]);

piklist('field', array(
    'type' => 'text',
    'field' => 'width',
    'label' => 'Largeur',
));

piklist('field', array(
    'type' => 'text',
    'field' => 'height',
    'label' => 'Hauteur',
));

piklist('field', array(
    'type' => 'text',
    'field' => 'margin_right',
    'label' => 'Margin droite',
));

piklist('field', array(
    'type' => 'text',
    'field' => 'margin_left',
    'label' => 'Margin gauche',
));
