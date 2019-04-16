FROM rioriost/php-cosmos-core

COPY --chown=root:staff test-cosmos.php /usr/local/bin/
RUN chmod 755 /usr/local/bin/test-cosmos.php

ENTRYPOINT ["test-cosmos.php"]
