#!/bin/bash
BASE_DIR=$(pwd)
TESTS_DIR="$BASE_DIR/tests"

mkdir $BASE_DIR/tests/Unit/Domains

for d in ./app/Domains/* ; do
    DOMAIN=${d##*/}
    echo "moving $d/Tests --> $TESTS_DIR/Unit/Domains/$DOMAIN"
    mv "$d/Tests" $TESTS_DIR/Unit/Domains/$DOMAIN
done

mkdir $BASE_DIR/tests/Unit/Services $BASE_DIR/tests/Feature/Services

for s in ./app/Services/* ; do
    SERVICE=${s##*/}
    echo "moving $s/Tests/Features --> $TESTS_DIR/Feature/Services/$SERVICE"
    mv "$s/Tests/Features" $TESTS_DIR/Feature/Services/$SERVICE

    echo "moving $s/Tests/Operations --> $TESTS_DIR/Unit/Services/$SERVICE/Operations"
    mv "$s/Tests/Operations" $TESTS_DIR/Unit/Services/$SERVICE/Operations
done
