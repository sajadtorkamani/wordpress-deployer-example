<?php
namespace Deployer;

// https://github.com/deployphp/deployer/blob/master/recipe/common.php
require 'recipe/common.php';

// Hosts
host('prod')
    ->set('remote_user', 'sajad')
    ->set('deploy_path', '~/sites/wordpress-deployer-example');

// Config
set('repository', 'git@github.com:sajadtorkamani/wordpress-deployer-example.git');

set('shared_files', ['wp-config.php']);
set('shared_dirs', ['wp-content/uploads']);
set('writable_dirs', ['wp-content/uploads']);

// Tasks
desc('Deploy the project');
task('deploy', [
    'deploy:prepare',
    'deploy:publish',
]);

after('deploy:failed', 'deploy:unlock');
