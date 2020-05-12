#/bin/bash


TEST=/home/{user}/spravka/test
APP=/home/{user}/spravka/app
WORK=/home/{user}/project/spravka
GIT=/home/{user}/project/spravka/.git
BRANCH=dev


if [[ "$1" != "" ]]; then
BRANCH=$1
fi

echo $BRANCH

if [[ "$BRANCH" == "dev" ]]; then
  git --work-tree=$WORK --git-dir=$GIT checkout dev
  git --work-tree=$WORK --git-dir=$GIT fetch --all
  git --work-tree=$WORK --git-dir=$GIT reset --hard origin/dev
  riot -o $WORK/tags > $WORK/public/js/tags.js
  rsync -avp --exclude=".*/" --exclude="vendor/"  --delete-after -r  $WORK/ $TEST
  composer update -d $TEST
  curl -H "Content-Type: application/json" -X POST -d '{"username": "CI/CD server", "content": "Complete dev"}' https://discordapp.com/api/webhooks/{id}/{guid}
elif [[ "$BRANCH" == "master" ]]; then
  git --work-tree=$WORK --git-dir=$GIT checkout master
  git --work-tree=$WORK --git-dir=$GIT fetch --all
  git --work-tree=$WORK --git-dir=$GIT reset --hard origin/master
  riot -o $WORK/tags > $WORK/public/js/tags.js
  rsync -avp --exclude=".*/" --exclude="vendor/"  --delete-after -r  $WORK/ $APP
  composer update -d $APP
  curl -H "Content-Type: application/json" -X POST -d '{"username": "CI/CD server", "content": "Complete master"}' https://discordapp.com/api/webhooks/{id}/{guid}
fi
