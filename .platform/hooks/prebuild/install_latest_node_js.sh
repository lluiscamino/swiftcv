#!/bin/sh

# Install Latest Node

# Some Laravel apps need Node & NPM for the frontend assets.
# This script installs the latest Node 12.x alongside
# with the paired NPM release.

sudo yum install https://rpm.nodesource.com/pub_22.x/nodistro/repo/nodesource-release-nodistro-1.noarch.rpm -y
sudo yum install nodejs -y --setopt=nodesource-nodejs.module_hotfixes=1

# Uncomment this line and edit the Version of NPM
# you want to install instead of the default one.
# npm i -g npm@6.14.4
