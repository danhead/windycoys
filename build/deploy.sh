#!/usr/bin/env bash

# Ensure target is defined
[ -z "$1" ] && { echo >&2 "Error: Build target not defined. Aborting."; exit 1; }

# Test rsync is installed and ENV variables are set
hash rsync 2>/dev/null || { echo >&2 "Error: rsync is not installed. Aborting."; exit 1; }
[ -z "$SSH_IP" ] && { echo >&2 "Error: SSH_IP is missing. Aborting."; exit 1; }
[ -z "$SSH_USER" ] && { echo >&2 "Error: SSH_USER is missing. Aborting."; exit 1; }

# Deploy theme
scp ./build/docker-compose.yml $SSH_USER@$SSH_IP:~/windycoys/
scp -r ./dist $SSH_USER@$SSH_IP:~/windycoys/
