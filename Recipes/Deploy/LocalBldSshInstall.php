<?php
namespace Deployer;

use Symfony\Component\Console\Input\InputOption;

require 'vendor/deployer/deployer/recipe/deploy/shared.php';
require 'vendor/axenox/deployer/Recipes/Config.php';
require 'vendor/axenox/deployer/Recipes/Build.php';
require 'vendor/axenox/deployer/Recipes/RemoteWindows.php';
require 'vendor/axenox/deployer/Recipes/SelfExtractor.php';
require 'vendor/axenox/deployer/Recipes/Deploy.php';
require 'vendor/axenox/deployer/Recipes/Install.php';

option('build', null, InputOption::VALUE_REQUIRED, 'Build name to deploy');

task('LocalBldSshInstall', [
    'config:setup_deploy_config',
    'build:find',
    'remote_windows:use_native_symlinks',
    'deploy:prepare',
    'self_extractor:create',
    'self_extractor:upload',
    'self_extractor:extract',
    'deploy:fix_permissions',
    'deploy:copy_directories',   
    'deploy:shared',
    'deploy:create_symlinks',
    'deploy:create_shared_links',
    'install:install_current_packages',
    'install:uninstall_unused_packages',
    'deploy:cleanup_old_releases',
    'self_extractor:delete_remote_file',
    'self_extractor:delete_local_file',
    'deploy:show_release_names',
    'deploy:success'
]);