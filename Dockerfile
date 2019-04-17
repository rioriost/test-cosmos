FROM rioriost/php-cosmos-core

WORKDIR /usr/local/bin

COPY composer.json ./

RUN composer install --no-plugins --no-scripts

COPY --chown=root:staff test-cosmos ./
RUN chmod 755 ./test-cosmos

ENTRYPOINT ["test-cosmos"]
