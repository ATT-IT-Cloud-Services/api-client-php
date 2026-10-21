#!/usr/bin/env bash
# Package api-client-php release assets.
set -euo pipefail

ROOT="${1:?usage: prepare-release-assets.sh <project-dir> <output-dir>}"
OUT="${2:?usage: prepare-release-assets.sh <project-dir> <output-dir>}"

VERSION="$(tr -d '\r\n' < "$ROOT/VERSION" | sed -e 's/^[vV]//')"
PREFIX="ignite-api-php-${VERSION}"

mkdir -p "$OUT"

ZIP="$OUT/${PREFIX}.zip"
(
  cd "$ROOT"
  zip -qr "$ZIP" \
    src \
    composer.json \
    phpunit.xml.dist \
    README.md \
    LICENSE.md \
    VERSION \
    I18N_POLICY.md \
    examples
)
echo "[release] source zip: $(basename "$ZIP")"

echo "[release] Upload set:"
find "$OUT" -maxdepth 1 -type f -printf '  %f (%s bytes)\n' | sort
