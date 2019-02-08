FROM alpine

EXPOSE 80

RUN apk add apache2
RUN apk add php7-apache2
RUN apk add php-session
RUN apk add php-pdo_mysql

ADD httpd.conf /etc/apache2/httpd.conf
RUN mkdir /run/apache2
RUN rm /var/www/localhost/htdocs/index.html

COPY ./pdo /var/www/localhost/htdocs/pdo
RUN ln -sf /dev/stdout /var/log/apache2/access.log
RUN ln -sf /dev/stderr /var/log/apache2/error.log

CMD httpd -DFOREGROUND
#ENTRYPOINT httpd && /bin/sh
#tailf /var/log/apache2/error.log

