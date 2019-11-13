<?php

namespace Deployer;

/**
 * This file contains the recipe to build a deployment archive by cloning the local 
 * PowerUI installation. To do so, creat a build.php file in the same directory as your
 * builds and base-config directories are located.
 * To create the archive run the following command in the console from the PowerUI exface directory:
 * 
 * vendor\bin\dep -f={filepath} CloneLocal
 * 
 * The {filepath} variable is the path to the build.php file
 * 
 * Structure for build.php:

    <?php
    namespace Deployer;
    
    require 'vendor/autoload.php';
    
    //name for the release/archive
    $releaseName = 'ahsfgkuasfashfafs';
    set('release_name', $releaseName);
    
    //name can be generatet instead of set, then this option is needed
    //name will be generated by appending a DateTime stamp to the given string
    //in this option
    //if release_name is set, this option will be ignored
    set('customer_specific_version', '0.28.7-beta');
    
    // === Path definitions ===
    //path to builds directory
    $buildsArchivesPath = __DIR__ . '\\builds';
    set('builds_archives_path', $buildsArchivesPath);
    
    //path to base-config directory
    $baseConfigPath = __DIR__ . '\\base-config';
    set('base_config_path', $baseConfigPath);
    
    require 'vendor/axenox/deployer/Recipes/Build/CloneLocal.php'; 
    
 */

require 'vendor/axenox/deployer/Recipes/Config.php';
require 'vendor/axenox/deployer/Recipes/Build.php';
    
task('CloneLocal', [
    'config:setup_build_config',
    'build:generate_release_name',
    'build:create_from_local',
]); 