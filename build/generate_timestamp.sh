#!/usr/bin/env bash

# Write deploy timestamp to disk
timestamp=$(date +%s)
echo $timestamp > theme/.timestamp
