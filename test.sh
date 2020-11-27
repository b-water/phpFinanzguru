#!/bin/bash

./vendor/bin/phpstan analyse src tests
./vendor/bin/phpcs src/
./vendor/bin/phpcs tests/
./vendor/bin/phpunit tests