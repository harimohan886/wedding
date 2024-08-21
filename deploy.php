<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@gitlab.junglesafariindia.in:abhishek.sinha/wedding-imcorbett.git');
set('keep_releases', 4); // Keep only 4 releases

// add('shared_files', ['.env','public/.htaccess','public/blog/.htaccess','public/blog/wp-config.php','public/sitemap.xml','public/robots.txt']);
// add('shared_dirs', ['storage','public/blog/wp-content/plugins','public/blog/wp-content/uploads','public/admin/upload']);
// add('writable_dirs', ['storage','public/blog/wp-content/plugins','public/blog/wp-content/uploads','public/admin/upload']);


// Host configuration
host('production')
    ->set('hostname', '3.110.133.177')
    ->set('remote_user', 'wedding')
    ->set('deploy_path', '/var/www/html/wedding-jimcorbett')
    ->set('identity_file', '/home/wedding/.ssh/id_ed25519');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'deploy:lock',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'deploy:unlock',
    'deploy:symlink',
    'deploy:create_symlinks', // Task to create symbolic links
    'deploy:cleanup'
]);

task('deploy:lock', function () {
    run('mkdir -p {{deploy_path}}/.dep && echo "ci" > {{deploy_path}}/.dep/deploy.lock');
});

task('deploy:unlock', function () {
    run('rm -f {{deploy_path}}/.dep/deploy.lock');
});

task('deploy:symlink', function () {
    run('cd {{deploy_path}} && ln -sfn {{release_path}} current');
});

// Task to create symbolic links
task('deploy:create_symlinks', function () {
    // Remove existing uploads directory
   // run('rm -rf {{deploy_path}}/current/public/admin/uploads');
    // Create symbolic links
    run('ln -sfn {{deploy_path}}/shared/public/blog {{deploy_path}}/current/public/blog');
   // run('ln -sfn {{deploy_path}}/shared/public/admin/uploads {{deploy_path}}/current/public/admin/uploads');
});

after('deploy:failed', 'deploy:unlock');
