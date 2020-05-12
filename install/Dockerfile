FROM ubuntu:20.04


ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y wget curl nginx git php-fpm php-cli php-curl php-mysql php-pgsql php-mbstring


COPY ./conf/default /etc/nginx/sites-available/default
COPY ./conf/www.conf /etc/php/7.4/fpm/pool.d/www.conf
COPY ./conf/connect.ini /etc/connect.ini

EXPOSE 80
CMD service php7.4-fpm start && nginx && tail -f /var/log/nginx/error.log

