<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( ' | ', true, 'right' ); ?></title>
    <?php wp_head(); ?>    
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <style>.main-outer-wrapper {background: url('/assets/images/template/background-pagecontent-secondary.gif') repeat-y center 0px #fff; }</style>
    <?php if (function_exists ( 'sat_fgms_modx_clone_get_section' ))  {   echo sat_fgms_modx_clone_get_section('analytics') ; }?> 
</head>
<body <?php body_class(); ?>>
    <?php if (function_exists ( 'sat_fgms_modx_clone_get_section' ))  {   echo sat_fgms_modx_clone_get_section('modal_privacy_policy') ; }?> 
    <div id="outer-container">
        <div id="middle-wrapper">
            <div id="navigation-placeholder-wrapper">
                <div id="navigation-wrapper">
                    <?php if (function_exists ( 'sat_fgms_modx_clone_get_section' ))  {   echo sat_fgms_modx_clone_get_section('navigation_main') ; }?>                
                </div>               
            </div>                
            <?php if (function_exists ( 'sat_fgms_modx_clone_get_section' ))  {   echo sat_fgms_modx_clone_get_section('slideshow_home') ; }?>         
        </div>
        <div class="main-outer-wrapper">
            <div class="container">
                <div class="main-wrapper main" style="padding-top: 0">
                    <div id="content" class="row">
                        <div class="col-sm-3">
                            <?php get_sidebar(); ?>
                        </div>   
                        <div class="col-sm-9" id="main" role="main">
                           <div class="main-content main-col-wrapper ">