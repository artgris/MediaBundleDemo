**Installation**
    
create .env.local with:

     DATABASE_URL=mysql://root:root@127.0.0.1:3306/artgris_demo    
   
Installation:

    git clone git@github.com:artgris/MediaBundleDemo.git media
    cd media/
    composer install
    php bin/console assets:install --symlink
    
    
add '.env.local' and add your DB access:
    
    DATABASE_URL=mysql://root:root@127.0.0.1:3306/media
    
Run doctrine commands:

    php bin/console d:d:c --if-not-exists
    php bin/console d:s:u --force
    