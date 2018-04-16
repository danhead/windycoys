#!/usr/bin/env bash

# Test rsync is installed and ENV variables are set
hash rsync 2>/dev/null || { echo >&2 "Error: rsync is not installed. Aborting."; exit 1; }
[ -z "$SSH_IP" ] && { echo >&2 "Error: SSH_IP is missing. Aborting."; exit 1; }
[ -z "$SSH_USER" ] && { echo >&2 "Error: SSH_USER is missing. Aborting."; exit 1; }

# Deploy theme with rsync
rsync -e "ssh -o StrictHostKeyChecking=no" -avzuh --progress \
  theme $SSH_USER@$SSH_IP:~/windycoys_theme

#Test curl is installed and Cloudflare ENV variables are set
hash curl 2>/dev/null || { echo >&2 "Error: curl is not installed. Aborting."; exit 1; }
[ -z "$CLOUDFLARE_API_KEY" ] && { echo >&2 "Error: CLOUDFLARE_API_KEY is missing. Aborting."; exit 1; }
[ -z "$CLOUDFLARE_EMAIL" ] && { echo >&2 "Error: CLOUDFLARE_EMAIL is missing. Aborting."; exit 1; }
[ -z "$CLOUDFLARE_IDENTIFIER" ] && { echo >&2 "Error: CLOUDFLARE_IDENTIFIER is missing. Aborting."; exit 1; }

curl -X DELETE \
  -H "Content-Type: application/json" \
  -H "X-Auth-Key: $CLOUDFLARE_API_KEY" \
  -H "X-Auth-Email: $CLOUDFLARE_EMAIL" \
  --data '{"purge_everything":true}' \
  "https://api.cloudflare.com/client/v4/zones/$CLOUDFLARE_IDENTIFIER/purge_cache"


