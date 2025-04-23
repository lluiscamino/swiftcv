COMMIT_TAG=$(git rev-parse HEAD)

cd ..
git checkout "$COMMIT_TAG"
eb use SwiftCV-env
eb deploy SwiftCV-env --label="$COMMIT_TAG"
git checkout main
