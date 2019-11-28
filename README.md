**Installation**
     
    git clone git@github.com:artgris/MediaBundleDemo.git media
    cd media/
    composer install
    php bin/console assets:install --symlink
    
    
create a '.env.local' file with your database access:
    
    DATABASE_URL=mysql://root:root@127.0.0.1:3306/media
    
run doctrine commands:

    php bin/console d:d:c --if-not-exists
    php bin/console d:s:u --force
    