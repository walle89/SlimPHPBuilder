<?php
/**
 * Beskrivning.
 *
 * @package SlimPHPBuilder
 * @author  Eric Wallmander
 *          Date: 2012-10-31
 *          Time: 22:10
 */

// @todo Documentation

return array(
    'template' => array
    (
        'projectName'   => 'New Project'
        ,'bodyClasses'  => array
        (
            'index'     => array('classone','classtwo')
            ,'page'     => array('classone','classtwo')
        )
    )
    ,'build' => array
    (
        'baseURL'       => 'http://localhost/proejct' // Full URL to project site. No ending /
        ,'buildPath'    => 'build/' // With ending /
        ,'changelog'    => 'CHANGELOG.txt' // Changelog file

        /**
         * 'phpFile' => 'builedHtmlFile'
         */
        ,'pages'        => array
        (
            'index'     => 'index'
            ,'about'    => 'about'
        )
        ,'dirs'         => array
        (
            'css'
            ,'images'
            ,'js'
        )
        /**
         * Exclude dirs and files
         * @todo Implement in builder
         */
        ,'exclude'      => array
        (
            'css/test.css'
            ,'js/test.js'
            ,'images/test.png'
        )

        ,'buildMethod'   => 'curl' // Comandline, curl
    )
);