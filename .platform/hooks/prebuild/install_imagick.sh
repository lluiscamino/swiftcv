#!/bin/sh

# Some packages like spatie/laravel-medialibrary needs Imagick installed.
# Uncomment the following lines to install Imagick on each deploy.

set +e

sudo yum clean metadata

sudo yum install -y ImageMagick ImageMagick-devel

if ! sudo pecl list | grep imagick >/dev/null 2>&1;
then
  printf '\n' | sudo pecl install imagick-3.8.0RC2
fi