#!/usr/bin/env bash
# Version helpers for api-client-php CI releases.
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"

normalize_version() {
  local raw="${1:-}"
  raw="$(echo "$raw" | sed -e 's/^[[:space:]]*//' -e 's/[[:space:]]*$//' -e 's/^[vV]//')"
  if [[ -z "$raw" || "$raw" =~ [xX] ]]; then
    echo ""
    return
  fi
  echo "$raw"
}

resolve_build_number() {
  printf '%s' "${GITHUB_RUN_NUMBER:-${CI_PIPELINE_IID:-${CI_JOB_ID:-0}}}"
}

resolve_build_sha() {
  local from_env="${BUILD_SHA:-${GITHUB_SHA:-${CI_COMMIT_SHA:-${GIT_COMMIT:-}}}}"
  from_env="$(echo "$from_env" | sed -e 's/^[[:space:]]*//' -e 's/[[:space:]]*$//' -e 's/^[vV]//')"
  if [[ -n "$from_env" ]]; then
    echo "${from_env:0:7}"
    return
  fi
  git -C "$ROOT" rev-parse --short=7 HEAD 2>/dev/null || echo ""
}

resolve_app_semver() {
  local from_env
  from_env="$(normalize_version "${APP_VERSION:-}")"
  if [[ -n "$from_env" ]]; then
    echo "$from_env"
    return
  fi
  if [[ -f "$ROOT/VERSION" ]]; then
    local from_file
    from_file="$(normalize_version "$(tr -d '\r\n' < "$ROOT/VERSION")")"
    if [[ -n "$from_file" ]]; then
      echo "$from_file"
      return
    fi
  fi
  echo "0.0.0"
}

resolve_app_version() {
  local semver sha
  semver="$(resolve_app_semver)"
  sha="$(resolve_build_sha)"
  if [[ -n "$sha" ]]; then
    echo "${semver} (${sha})"
  else
    echo "$semver"
  fi
}

resolve_release_tag() {
  local semver build
  semver="$(resolve_app_semver)"
  build="$(resolve_build_number)"
  echo "v${semver}-${build}"
}

resolve_release_title() {
  local prefix="${1:-api-client-php}"
  echo "${prefix} $(resolve_app_semver) (build $(resolve_build_number))"
}

case "${1:-}" in
  semver) resolve_app_semver ;;
  version) resolve_app_version ;;
  build) resolve_build_number ;;
  tag) resolve_release_tag ;;
  title) resolve_release_title "${2:-api-client-php}" ;;
  *)
    echo "usage: $0 {semver|version|tag|title [prefix]}" >&2
    exit 1
    ;;
esac
