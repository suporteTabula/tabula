chown -R rob:www-data /var/www/docker-images/docker-tabula
find /var/www/docker-images/docker-tabula -type f -exec chmod 664 {} \;    
find /var/www/docker-images/docker-tabula -type d -exec chmod 775 {} \;
chgrp -R www-data storage /var/www/docker-images/docker-tabula/bootstrap/cache
chmod -R ug+rwx storage /var/www/docker-images/docker-tabula/bootstrap/cache