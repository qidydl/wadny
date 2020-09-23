#!/bin/bash

# Exit on error. Append "|| true" if you expect an error.
set -o errexit
# Exit on error inside any functions or subshells.
set -o errtrace
# Do not allow use of undefined vars. Use ${VAR:-} to use an undefined VAR
set -o nounset

if [ $# -lt 2 ]; then
    echo "Missing required arguments: publish.sh <profile> <bucket>"
    exit 1
fi

# Perform same basic operations as github workflow. AWS credentials must be manually configured ahead of time.
pushd src

bundle install
bundle exec jekyll build
aws s3 sync _site s3://${2}/ --profile ${1} --acl public-read --follow-symlinks --delete

popd