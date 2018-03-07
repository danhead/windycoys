#!/usr/bin/env sh

# Build and copy theme files
npm run build
cp -vfr theme windycoys

# Purge Cloudflair cache
if [[ -z "${CLOUDFLARE_API_KEY}" ]] || [[ -z "${CLOUDFLARE_EMAIL}" ]] || [[ -z "${CLOUDFLARE_IDENTIFIER}" ]]; then
  echo "Error: Cloudflare environment variables missing"
  exit 1
fi

curl -X DELETE \
  -H "Content-Type: application/json" \
  -H "X-Auth-Key: $CLOUDFLARE_API_KEY" \
  -H "X-Auth-Email: $CLOUDFLARE_EMAIL" \
  --data '{"purge_everything":true}' \
  "https://api.cloudflare.com/client/v4/zones/$CLOUDFLARE_IDENTIFIER/purge_cache"

exec tail -f /dev/null
