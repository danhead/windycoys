#!/usr/bin/env sh

# Test environment variables are set
[ -z "$SSH_IP" ] && { echo >&2 "Error: SSH_IP is missing. Aborting."; exit 1; }
[ -z "$SSH_USER" ] && { echo >&2 "Error: SSH_USER is missing. Aborting."; exit 1; }

# Deploy theme
ssh $SSH_USER@$SSH_IP rm -r ~/windycoys/dist/*
