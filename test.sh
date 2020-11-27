#!/bin/bash

./vendor/bin/phpcs src/
./vendor/bin/phpcs tests/
./vendor/bin/phpunit tests