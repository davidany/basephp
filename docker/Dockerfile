FROM centos:centos7

RUN yum -y install deltarpm
RUN yum -y update && \
    yum -y install \
    epel-release \
    httpd \
    httpd-tools \
     httpd-devel \
    unzip ksh zip unzip \
    yum-utils nano which wget epel-release  \
    && yum groupinstall -y 'Development tools' \
	&& yum -y install mod_proxy_uwsgi mod_proxy_html libssh2-devel apr-devel   apr-util-devel

RUN yum install -y https://download.postgresql.org/pub/repos/yum/reporpms/EL-7-x86_64/pgdg-redhat-repo-latest.noarch.rpm
RUN yum -y install libxml2-devel sqlite-devel libcurl-devel oniguruma-devel unixODBC-devel libtidy-devel libxslt-devel \
    libpng-devel freetype-devel unixODBC unixODBC-devel  postgresql15 postgresql15-odbc   postgresql15-server postgresql15-contrib redis mlocate \
    && updatedb

#RUN yum -y install libxml2-devel sqlite-devel
##prepare other installs
ARG FOLDERNAME=installtemp
ARG   PHP_VERSION=8.1.19
ARG    APACHE_VERSION=2.4.6
ARG    PHP_VERSION_SHORT=81
ARG    PHP_INSTALL_FOLDER=php-$PHP_VERSION

ENV FOLDERNAME=$FOLDERNAME \
    PHP_VERSION=$PHP_VERSION \
    APACHE_VERSION=$APACHE_VERSION \
    PHP_VERSION_SHORT=$PHP_VERSION_SHORT \
    PHP_INSTALL_FOLDER=$PHP_INSTALL_FOLDER


RUN mkdir -p /$FOLDERNAME
RUN chmod 777 -R /$FOLDERNAME

RUN yum install -y https://rpms.remirepo.net/enterprise/remi-release-7.rpm

RUN yum install -y --enablerepo=remi-php$PHP_VERSION_SHORT php  php-mcrypt php-cli php-gd php-curl php-mysql \
  php-ldap php-zip php-fileinfo php-xdebug php-pear php-devel php-sockets php-mbstring \
   php$PHP_VERSION_SHORT-php-devel php$PHP_VERSION_SHORT-php-pecl-ssh2 php-pecl-ssh2 php-pgsql

RUN yum install -y  --enablerepo=remi-php$PHP_VERSION_SHORT    php$PHP_VERSION_SHORT-php-odbc  php$PHP_VERSION_SHORT-php-pdo_odbc

RUN cp /etc/opt/remi/php$PHP_VERSION_SHORT/php.d/20-odbc.ini /etc/php.d/20-odbc.ini \
&& cp /etc/opt/remi/php$PHP_VERSION_SHORT/php.d/30-pdo_odbc.ini /etc/php.d/30-pdo_odbc.ini \
    && cp /opt/remi/php$PHP_VERSION_SHORT/root/usr/lib64/php/modules/odbc.so /usr/lib64/php/modules/odbc.so \
    && cp /opt/remi/php$PHP_VERSION_SHORT/root/usr/lib64/php/modules/pdo_odbc.so /usr/lib64/php/modules/pdo_odbc.so

RUN yum install -y python3 python3-pip
RUN pip3 install Flask


#
### Download and extract Apache
#RUN   curl -SL  https://archive.apache.org/dist/httpd/httpd-$APACHE_VERSION.tar.gz  -o /$FOLDERNAME/httpd-$APACHE_VERSION.tar.gz  \
#  &&  tar -zxvf /$FOLDERNAME/httpd-$APACHE_VERSION.tar.gz -C /$FOLDERNAME
#
#
# RUN  cd /$FOLDERNAME/httpd-$APACHE_VERSION  \
# &&   ./configure  \
#    --prefix=/etc/httpd  \
##    --enable-mods-shared=all \
##    --enable-ssl \
#    --enable-so \
#    --with-ssl=/usr/local/ssl \
#    --enable-proxy \
##    --enable-proxy-http \
##    --enable-proxy-balancer \
##    --enable-proxy-ajp  \
##    --enable-cache  \
##    --enable-mem-cache  \
##    --enable-disk-cache  \
##    --enable-headers  \
##    --enable-deflate  \
#    --enable-expires  \
#    --enable-rewrite  \
##    --with-zlib \
#	--with-php \
#    --enable-php \
#  &&  make  \
#  &&  make install
#
### Download and extract PHP source code
RUN curl -SL https://www.php.net/distributions/php-$PHP_VERSION.tar.gz -o /$FOLDERNAME/php-$PHP_VERSION.tar.gz && \
    tar -xzf /$FOLDERNAME/php-$PHP_VERSION.tar.gz -C /$FOLDERNAME
#
#ARG FOLDERNAME=installtemp \
#    PHP_VERSION=8.1.16
#
#RUN curl -SL https://www.php.net/distributions/php-$PHP_VERSION.tar.gz -o /$FOLDERNAME/php-$PHP_VERSION.tar.gz && \
#    tar -xzf /$FOLDERNAME/php-$PHP_VERSION.tar.gz -C /$FOLDERNAME
#
#ARG FOLDERNAME=installtemp \
#    PHP_VERSION=8.1.15
#
#RUN curl -SL https://www.php.net/distributions/php-$PHP_VERSION.tar.gz -o /$FOLDERNAME/php-$PHP_VERSION.tar.gz && \
#    tar -xzf /$FOLDERNAME/php-$PHP_VERSION.tar.gz -C /$FOLDERNAME
#ARG FOLDERNAME=installtemp \
#    PHP_VERSION=8.1.14
#
#
#RUN curl -SL https://www.php.net/distributions/php-$PHP_VERSION.tar.gz -o /$FOLDERNAME/php-$PHP_VERSION.tar.gz && \
#    tar -xzf /$FOLDERNAME/php-$PHP_VERSION.tar.gz -C /$FOLDERNAME
#
#ARG FOLDERNAME=installtemp \
#    PHP_VERSION=8.1.17

#
#RUN mkdir -p /etc/php.d
#ENV PHP_INI_SCAN_DIR=/etc/php.d/
#RUN echo 'export PHP_INI_SCAN_DIR=/etc/php.d/'
##
#RUN cd /$FOLDERNAME/php-$PHP_VERSION && \
#    ./configure \
#        --with-config-file-path=/etc \
#        --with-apxs2=/etc/httpd/bin/apxs \
##        --with-config-file-scan-dir=/etc/php.d \
###        --enable-fpm \
###        --with-fpm-user=apache \
###        --with-fpm-group=apache \
#        --with-libdir=/lib64/php \
###        --with-openssl \
###        --with-curl \
###        --with-mysqli \
###        --with-pdo-mysql \
###        --with-ldap \
###        --with-libxml=/usr/include/libxml2/libxml \
###        --with-gd \
###        --with-jpeg \
###        --with-png \
###        --with-tidy \
###        --with-xsl \
###        --with-pdo-odbc=unixODBC,/usr/ \
###        --with-freetype-dir=/usr \
###        --with-odbc \
###         --with-redis \
###        --enable-bcmath \
###        --enable-calendar \
###        --enable-exif \
###        --enable-ftp \
###        --enable-gd-jis-conv \
###        --enable-mbstring \
###        --enable-shmop \
###        --enable-soap \
###        --enable-sockets \
###        --enable-wddx \
###	    --with-pear  \
###        --enable-debug \
###        --enable-opcache \
###        --enable-maintainer-zts  \
#   && make \
#   && make install

##db2
RUN mkdir -p /$FOLDERNAME/opt/ibm
COPY docker/config/drivers/linuxx64_odbc_cli.tar.gz $FOLDERNAME/opt/ibm/
COPY docker/config/drivers/ibm_data_server_driver_package_linuxx64_v11.5.tar.gz /$FOLDERNAME/opt/ibm/
WORKDIR /$FOLDERNAME/opt/ibm
RUN tar xzf ibm_data_server_driver_package_linuxx64_v11.5.tar.gz -C /$FOLDERNAME/opt/ibm
WORKDIR /$FOLDERNAME/opt/ibm/dsdriver

RUN chmod 755 installDSDriver
RUN ksh installDSDriver
RUN export IBM_DB_HOME=/$FOLDERNAME/opt/ibm/dsdriver && \
    env IBM_DB_HOME=/$FOLDERNAME/opt/ibm/dsdriver && \
    pecl install ibm_db2 && \
    echo "extension=ibm_db2.so" >> /etc/php.d/ibm_db2.ini




# ORACLE oci
RUN mkdir /opt/oracle \
    && cd /opt/oracle

ADD https://download.oracle.com/otn_software/linux/instantclient/199000/instantclient-basic-linux.x64-19.9.0.0.0dbru.zip /opt/oracle
ADD https://download.oracle.com/otn_software/linux/instantclient/199000/instantclient-sdk-linux.x64-19.9.0.0.0dbru.zip /opt/oracle

# Install Oracle Instantclient
RUN  unzip /opt/oracle/instantclient-basic-linux.x64-19.9.0.0.0dbru.zip -d /opt/oracle \
    && unzip /opt/oracle/instantclient-sdk-linux.x64-19.9.0.0.0dbru.zip -d /opt/oracle \
    && ln -s /opt/oracle/instantclient_19_9/libclntshcore.so.19.9 /opt/oracle/instantclient_19_9/libclntshcore.so \
    && rm -rf /opt/oracle/*.zip

ENV LD_LIBRARY_PATH  /opt/oracle/instantclient_19_9:${LD_LIBRARY_PATH}

RUN yum install -y yum install systemtap-sdt-devel libaio \
	&& export PHP_DTRACE=yes \
	&& wget https://www.php.net/distributions/php-$PHP_VERSION.tar.gz

	RUN  tar xvzf php-$PHP_VERSION.tar.gz \
	&& cd php-$PHP_VERSION/ext/pdo_oci \
	&& phpize \
	&& ./configure --with-pdo-oci=instantclient,/opt/oracle/instantclient_19_9/ \
	&& make && make install

RUN  mkdir -p /opt/ibm/dsdriver/ \
	&& cd /opt/ibm/dsdriver/ \
	&&  pear download pecl/oci8-3.0.1 \
	&& tar xvzf oci8-3.0.1.tgz \
	&& cd oci8-3.0.1 \
	&& export PHP_DTRACE=yes \
	&& phpize \
	&& ./configure --with-oci8=instantclient,/opt/oracle/instantclient_19_9/ \
	&& make && make install

COPY ./docker/config/php/oracle/30-pdo_oci.ini /etc/php.d/30-pdo_oci.ini
COPY ./docker/config/php/oracle/20-oci8.ini /etc/php.d/20-oci8.ini


#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#sql server
RUN yum install -y --enablerepo=remi-php80  unixODBC-devel
RUN pecl install sqlsrv pdo_sqlsrv

RUN curl https://packages.microsoft.com/config/rhel/7/prod.repo > /etc/yum.repos.d/mssql-release.repo
RUN ACCEPT_EULA=Y yum install -y msodbcsql17
RUN ACCEPT_EULA=Y yum install -y mssql-tools
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
RUN source ~/.bashrc

RUN echo extension=pdo_sqlsrv.so >> `php --ini | grep "Scan for additional .ini files" | sed -e "s|.*:\s*||"`/30-pdo_sqlsrv.ini
RUN echo extension=sqlsrv.so >> `php --ini | grep "Scan for additional .ini files" | sed -e "s|.*:\s*||"`/20-sqlsrv.ini

RUN yum install -y  unixODBC unixODBC-devel

ENV CFLAGS="-std=c99"
RUN  yum install -y libtool-ltdl-devel

RUN cd  php-$PHP_VERSION/ext/odbc \
	&& phpize \
    && sed -ri 's@^ *test +"\$PHP_.*" *= *"no" *&& *PHP_.*=yes *$@#&@g' configure \
    && ./configure --with-unixODBC=shared,/usr \
	&& make && make install

#RUN cd  php-$PHP_VERSION/ext/odbc \
#	&& phpize \
#    && sed -ri 's@^ *test +"\$PHP_.*" *= *"no" *&& *PHP_.*=yes *$@#&@g' configure \
#	&& ./configure --with-pdo-odbc=ibm-db2  \
#	&& make && make install

#RUN cd  php-$PHP_VERSION/ext/odbc \
#	&& phpize \
#	&& ./configure --with-pdo-odbc=iodbc \
#	&& make && make install

RUN cd  php-$PHP_VERSION/ext/odbc \
&&  echo '# https://github.com/docker-library/php/issues/103#issuecomment-271413933' > temp.m4 \
&& echo 'AC_DEFUN([PHP_ALWAYS_SHARED],[])dnl' >> temp.m4 \
&& echo >> temp.m4 \
&& cat config.m4 >> temp.m4 \
&& mv temp.m4 config.m4  \
	&& phpize \
	&& ./configure --with-pdo-odbc=unixODBC,/usr \
	&& make && make install


#insatll nvm for node for any version
WORKDIR $FOLDERNAME
RUN  curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash

RUN yum clean all \
&& yum install -y supervisor beanstalkd iproute xclip zsh net-tools bash-completion

#added systemctl alternative
RUN wget https://raw.githubusercontent.com/gdraheim/docker-systemctl-replacement/master/files/docker/systemctl.py -O /usr/local/bin/systemctl
RUN chmod 755 /usr/local/bin/systemctl

RUN mkdir -p /var/log/xdebug/
RUN mkdir -p /var/log/xdebug/trace

RUN touch /var/log/xdebug/xdebug.log
RUN /bin/bash -c "mkdir -p /var/log/php"
RUN touch /var/log/php/mono.log
RUN touch /var/log/php/error.log
RUN chmod -R +rwX  /var/log/
RUN chown -R apache:apache /var/log/
RUN chown -R apache:apache /var/www/html

COPY docker/config/php/php-custom-dev.ini /etc/php.ini
COPY docker/config/php/php.ini /$FOLDERNAME/php-additional.ini
COPY docker/config/alias.txt /$FOLDERNAME/aliases

RUN cat /$FOLDERNAME/aliases >> /root/.bashrc
RUN cat /$FOLDERNAME/php-additional.ini >> /etc/php.ini


# Update Apache Configuration
ENV HTTPD_MAIN_CONF_PATH=/etc/httpd/conf \
	HTTPD_DATA_ORIG_PATH=/var/www \
	HTTPD_MAIN_CONF_D_PATH=/etc/httpd/conf.d \
	APP_DATA=${APP_ROOT}/src  \
	HTTPD_VAR_PATH=/var \
	APACHE_LOG_DIR=/var/log/httpd \
	SLIM_MODE=testing \
    	CI_ENV=testing \
    	SOME_KEY=someValue

RUN mkdir -p /etc/httpd/sites-enabled
RUN mkdir -p /etc/httpd/sites-available

# Add a simple Python script that returns "Hello, World!"
RUN #mkdir /var/www/cgi-bin
RUN chown -R apache:apache /var/www/cgi-bin
RUN chmod -R 777 /var/www/cgi-bin

RUN chown -R apache:apache /var/www/html

RUN  cp /etc/httpd/conf/httpd.conf /$FOLDERNAME/httpdFROMDOCKER.conf
COPY  docker/config/httpd/httpd.conf /etc/httpd/conf/httpd.conf
COPY docker/config/httpd/apache.conf /etc/httpd/sites-enabled/000-default.conf
COPY docker/config/httpd/apache.conf /etc/httpd/sites-available/000-default.conf

COPY docker/config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/config/start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container

#ENV PHP_INI_SCAN_DIR=/usr/local/etc/php/conf.d

RUN mkdir -p /var/www/html/storage/logs/
RUN chmod -R +rwX  /var/www/html/storage/logs/
RUN chown -R apache:apache /var/www/html/storage/logs/
RUN chmod -R 777 /var/www/html/storage/logs/

#rotate log file
COPY docker/config/php/php-error-log /etc/logrotate.d/php-error-log
COPY docker/config/php/toggle-xdebug.sh /var/www/html/docker/config/php/toggle-xdebug.sh

RUN chmod +x /var/www/html/docker/config/php/toggle-xdebug.sh



RUN yum install -y crontabs lsof tree
RUN yum -y update &&  yum install -y php$PHP_VERSION_SHORT-php-pecl-imagick
RUN yum install logrotate -y
RUN cp  /opt/remi/php$PHP_VERSION_SHORT/root/usr/lib64/php/modules/imagick.so /usr/lib64/php/modules/

# Add your cron job to run logrotate every 30 minutes
RUN echo "*/30 * * * * /usr/sbin/logrotate -f /etc/logrotate.conf" > /etc/crontab


#RUN export HISTTIMEFORMAT="%F %T "
RUN echo 'export HISTTIMEFORMAT="%F %T "' >> /root/.bashrc


WORKDIR "/var/www/html"


CMD ["/bin/bash","start-container"]
