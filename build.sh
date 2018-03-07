#!/usr/bin/env sh

# Build and copy theme files
npm run build
cp -vfr theme windycoys

# Purge Cloudflair cache
if [[ -z "${CLOUDFLARE_API_KEY}" ]] || [[ -z "${CLOUDFLARE_EMAIL}" ]] || [[ -z "${CLOUDFLARE_IDENTIFIER}" ]]; then
  echo "Error: Cloudflare environment variables missing"
  exit 1
fi

read -r -d '' DATA << EOM
{
  "files": [
    "https://beta.windycoys.com/wp-content/themes/windycoys/style.css",
    "https://beta.windycoys.com/wp-content/themes/windycoys/bundle.js"
  ]
}
EOM

curl -X DELETE \
  -H "Content-Type: application/json" \
  -H "X-Auth-Key: $CLOUDFLARE_API_KEY" \
  -H "X-Auth-Email: $CLOUDFLARE_EMAIL" \
  --data "$DATA" \
  "https://api.cloudflare.com/client/v4/zones/$CLOUDFLARE_IDENTIFIER/purge_cache"
