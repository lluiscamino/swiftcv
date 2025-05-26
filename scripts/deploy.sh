COMMIT_TAG=$(git rev-parse HEAD)

cd ..
git checkout "$COMMIT_TAG"
eb use SwiftCV-env-1
eb deploy SwiftCV-env-1 --label="$COMMIT_TAG"
git checkout main
