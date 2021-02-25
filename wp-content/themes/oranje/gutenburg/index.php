<?php

    function orange_gutenburg_blocks() {
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {
    
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'slider',
                'title'             => __('slider'),
                'description'       => __('A custom slider block.'),
                'render_template'   => 'gutenburg/blocks/slider.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'slider', 'hero' ),
            )); 

            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'video',
                'title'             => __('video'),
                'description'       => __('A custom video block.'),
                'render_template'   => 'gutenburg/blocks/video.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'video', 'hero' ),
            )); 

            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Why do',
                'title'             => __('Why do'),
                'description'       => __('A custom Why do block.'),
                'render_template'   => 'gutenburg/blocks/Why-do.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Why do', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'What do you',
                'title'             => __('What do you'),
                'description'       => __('A custom Why do you block.'),
                'render_template'   => 'gutenburg/blocks/What-do-you.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-admin-multisite',
                'keywords'          => array( 'What-do-you', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Partnership',
                'title'             => __('Partnership'),
                'description'       => __('A custom Partnership block.'),
                'render_template'   => 'gutenburg/blocks/partnership.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'Partnership', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Our values',
                'title'             => __('Our values'),
                'description'       => __('A custom Our values block.'),
                'render_template'   => 'gutenburg/blocks/Our-values.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'Our values', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'we care so much',
                'title'             => __('we care so much'),
                'description'       => __('A custom Our values block.'),
                'render_template'   => 'gutenburg/blocks/we-care-so-much.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'we care so much', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Our Mission  Manifesto',
                'title'             => __('Our Mission  Manifesto'),
                'description'       => __('A custom Our Mission  Manifesto block.'),
                'render_template'   => 'gutenburg/blocks/our-mission-Manifesto.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'Our Mission  Manifesto', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Cta area',
                'title'             => __('Cta area'),
                'description'       => __('A custom Cta area block.'),
                'render_template'   => 'gutenburg/blocks/cta-area.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'Cta area', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Why are you changing',
                'title'             => __('Why are you changing'),
                'description'       => __('A custom Why are you changing block.'),
                'render_template'   => 'gutenburg/blocks/Whyareyouchanging.php',
                'category'          => 'formatting',
                'icon'              => 'dashicons-shortcode',
                'keywords'          => array( 'Why are you changing area', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'What makes us',
                'title'             => __('What makes us'),
                'description'       => __('A custom What makes us block.'),
                'render_template'   => 'gutenburg/blocks/Whatmakesus.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'What makes us area', 'hero' ),
            )); 
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'We believe',
                'title'             => __('We believe'),
                'description'       => __('A custom We believe block.'),
                'render_template'   => 'gutenburg/blocks/Webelieve.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'We believe area', 'hero' ),
            )); 

              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Cta area 2',
                'title'             => __('Cta area 2'),
                'description'       => __('A custom Cta area block.'),
                'render_template'   => 'gutenburg/blocks/cta-area-2.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Cta area 2', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Who are we',
                'title'             => __('Who are we'),
                'description'       => __('A custom Who are we block.'),
                'render_template'   => 'gutenburg/blocks/Who-are-we.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Who are we', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Do you want a partnership',
                'title'             => __('Do you want a partnership'),
                'description'       => __('A custom Do you want a partnership block.'),
                'render_template'   => 'gutenburg/blocks/do-you-want-partnership.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Do you want a partnership ', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Just a video area',
                'title'             => __('Just a video area'),
                'description'       => __('A custom Do you want a partnership block.'),
                'render_template'   => 'gutenburg/blocks/Just-a-video-area.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Just a video area', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Who we area really video',
                'title'             => __('Who we area really video'),
                'description'       => __('A custom Who we area really video block.'),
                'render_template'   => 'gutenburg/blocks/who-we-area-really-video.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Who we area really video', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Partnership in action',
                'title'             => __('Partnership in action'),
                'description'       => __('A custom Partnership in action block.'),
                'render_template'   => 'gutenburg/blocks/Partnership-in-action.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Partnership in action', 'hero' ),
            ));
              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Dolor sit amet',
                'title'             => __('Dolor sit amet'),
                'description'       => __('A custom Dolor sit amet block.'),
                'render_template'   => 'gutenburg/blocks/dolor-sit-amet.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Dolor sit amet', 'hero' ),
            ));

              // register a slider block.
            acf_register_block_type(array(
                'name'              => 'We are a people company',
                'title'             => __('We are a people company'),
                'description'       => __('A custom Dolor sit amet block.'),
                'render_template'   => 'gutenburg/blocks/We-are-a-people-company.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'We are a people company', 'hero' ),
            ));

            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'What makes us completely different',
                'title'             => __('What makes us completely different'),
                'description'       => __('A custom What makes us completely different block.'),
                'render_template'   => 'gutenburg/blocks/What-makes-us-completely-different.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'What makes us completely different', 'hero' ),
            ));

            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'We are run ',
                'title'             => __('We are run '),
                'description'       => __('A custom We are run  block.'),
                'render_template'   => 'gutenburg/blocks/Wearerun.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'We are run ', 'hero' ),
            ));


            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Footer video area',
                'title'             => __('Footer video area'),
                'description'       => __('A custom Footer video area block.'),
                'render_template'   => 'gutenburg/blocks/footer-video-area.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Footer video area', 'hero' ),
            ));

            
            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Google map area',
                'title'             => __('Google map area'),
                'description'       => __('A custom Google map area block.'),
                'render_template'   => 'gutenburg/blocks/google-map.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Google map area', 'hero' ),
            ));


            // register a slider block.
            acf_register_block_type(array(
                'name'              => 'Big enough to execute',
                'title'             => __('Big enough to execute'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/big-enough-to-execute.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Big enough to execute', 'hero' ),
            ));

            // register a slider block.
            acf_register_block_type(array(
                'name'              =>  'Simplified Communication',
                'title'             => __('Simplified Communication'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/Simplified-Communication.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Simplified Communication', 'hero' ),
            ));

            // register a contact block.
            acf_register_block_type(array(
                'name'              =>  'contact',
                'title'             => __('Contact'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/contact-form.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'contact', 'hero' ),
            ));

            // register a contact block.
            acf_register_block_type(array(
                'name'              =>  'jobs-listing',
                'title'             => __('jobs Listing'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/jobs-listing.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'jobs listing', 'hero' ),
            ));

            // register a contact block.
            acf_register_block_type(array(
                'name'              =>  'jobs-dashboard',
                'title'             => __('jobs dashboard'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/jobs-dashboard.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'jobs dashboard', 'hero' ),
            ));

            // register a contact block.
            acf_register_block_type(array(
                'name'              =>  'post-jobs',
                'title'             => __('Post Jobs'),
                'description'       => __('Big enough to execute'),
                'render_template'   => 'gutenburg/blocks/post-jobs.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'post jobs', 'hero' ),
            ));

            // register a career-tips block.
            acf_register_block_type(array(
                'name'              => 'career-tips',
                'title'             => __('Career Tips'),
                'description'       => __('A custom quitk tips block.'),
                'render_template'   => 'gutenburg/blocks/career-tips.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'Career Tips' ),
            ));

            // register a demo block.
            acf_register_block_type(array(
                'name'              => 'multistep-form',
                'title'             => __('Multistep Form'),
                'description'       => __('A custom multistep form block.'),
                'render_template'   => 'gutenburg/blocks/multistep-form.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array( 'multistep-form' ),
            ));

        }
    }
    
    add_action('acf/init', 'orange_gutenburg_blocks');				
    
    function wpb_test() {  	
        // Things that you want to do. 		
        $message = 'Hello world!'; 	 	
        // Output needs to be return		
        return $message;
    } 
    
    add_shortcode('test', 'wpb_test'); 