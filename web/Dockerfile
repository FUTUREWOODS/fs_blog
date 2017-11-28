FROM nginx:1.13.5-alpine

# ツールをインストール
RUN apk --update add openssl

# ルートディレクトリを作成
RUN mkdir -p /var/www/html

# 自己証明書を発行
RUN openssl genrsa 2048 > server.key \
 && openssl req -new -key server.key -subj "/C=JP/ST=Tokyo/L=Chuo-ku/O=RMP Inc./OU=web/CN=localhost" > server.csr \
 && openssl x509 -in server.csr -days 3650 -req -signkey server.key > server.crt \
 && cp server.crt /etc/nginx/server.crt \
 && cp server.key /etc/nginx/server.key \
 && chmod 755 -R /var/www/html \
 && chmod 400 /etc/nginx/server.key

ARG AGENT_UID=2000
ARG AGENT_GID=2000
RUN groupadd -g ${AGENT_GID} nginx_docker\
&& useradd -d /home/docker -u ${AGENT_UID} -g nginx_docker nginx_docker
&& sed -ie "s/nginx;/nginx_docker;/" /etc/nginx/nginx.conf
