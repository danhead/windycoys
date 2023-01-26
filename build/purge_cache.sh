#!/usr/bin/env bash

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
