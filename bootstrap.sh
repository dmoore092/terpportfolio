#update packages
apt-get update
apt-get upgrade

#install git
apt-get install -y git

#Apache2
apt-get install -y apache2
a2enmod rewrite

#php
apt-get install -y libapache2-mod-php5
apt-get install -y php5-common
apt-get install -y php5-mcrypt
apt-get install -y php5-zip

#set mysql pass
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

#install mysql
apt-get install -y mysql-server
apt-get install -y php5-mysql

#restart apache
service apache2 restart
