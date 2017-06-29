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

piklist('field', [
    'type'      => 'select',
    'field'     => 'cf_font_family',
    'label'     => 'Typography',
    'value'     => 'SuisseIntl',
    'choices'   => ['SuisseIntl' => 'SuisseIntl', 'SuisseIntl-Mono' => 'SuisseIntl-Mono' ]
]);

piklist('field', [
    'type'      => 'text',
    'field'     => 'width',
    'label'     => 'Largeur (Width)',
    'help'      => 'Ajoutez la largeur en px, em, rem, % (ex: 600px ou 100%)',
    'columns'   => 2
]);

piklist('field',[
    'type'      => 'text',
    'field'     => 'height',
    'label'     => 'Hauteur (Height)',
    'help'      => 'Ajoutez l\'hauteur en px, em, rem (ex: 600px)',
    'columns'   => 2
]);

/* *****************************************************************************
** Margin Section
***************************************************************************** */

$mt = [
    'type'      => 'text',
    'field'     => 'margin_top',
    'label'     => 'Top',
    'columns'   => 2,
];

$mr = [
    'type'      => 'text',
    'field'     => 'margin_right',
    'label'     => 'Right',
    'columns'   => 2,
];

$mb = [
    'type'      => 'text',
    'field'     => 'margin_bottom',
    'label'     => 'Bottom',
    'columns'   => 2
];

$ml = [
    'type'      => 'text',
    'field'     => 'margin_left',
    'label'     => 'Left',
    'columns'   => 2
];

piklist('field',[
    'type' => 'group',
    'label' => 'Marge (Margin)',
    'help'  => 'Ajoutez les differents marges en px. Pas besoin d\'ajouter px',
    'fields' => [ $mt, $mr, $mb, $ml ]
]);

/* *****************************************************************************
** Padding Section
***************************************************************************** */

$pt = [
    'type'      => 'text',
    'field'     => 'cf_padding_top',
    'label'     => 'Top',
    'columns'   =>  2
];

$pr = [
    'type'      => 'text',
    'field'     => 'cf_padding_right',
    'label'     => 'Right',
    'columns'   =>  2
];

$pb = [
    'type'      => 'text',
    'field'     => 'cf_padding_bottom',
    'label'     => 'Bottom',
    'columns'   =>  2
];

$pl = [
    'type'      => 'text',
    'field'     => 'cf_padding_left',
    'label'     => 'Bottom',
    'columns'   =>  2
];

piklist('field',[
    'type' => 'group',
    'label' => 'Padding',
    'help'  => 'Ajoutez les differents padding en px. Pas besoin d\'ajouter px',
    'fields' => [ $pt, $pr, $pb, $pl ]
]);

/* *****************************************************************************
** Media File Section
** This section is for the background image
***************************************************************************** */
piklist('field', [
    'type'  => 'colorpicker',
    'field' => 'cf_colorpicker',
    'label' => 'Color Picker'
]);

piklist('field', [
    'type'          => 'file',
    'field'         => 'cf_upload_media',
    'label'         => 'Add File(s)',
    'description'   => 'This is the media uploader',
    'options'       => [ 'modal_title' => 'Add File(s)' ,'button' => 'Add' ]
]);
