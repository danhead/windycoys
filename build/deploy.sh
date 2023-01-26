#!/usr/bin/env sh

# Test environment variables are set
[ -z "$SSH_IP" ] && { echo >&2 "Error: SSH_IP is missing. Aborting."; exit 1; }
[ -z "$SSH_USER" ] && { echo >&2 "Error: SSH_USER is missing. Aborting."; exit 1; }

# Deploy theme
scp ./build/docker-compose.yml $SSH_USER@$SSH_IP:~/windycoys/
scp -r ./dist $SSH_USER@$SSH_IP:~/windycoys/
