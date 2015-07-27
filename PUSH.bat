@echo off
git add .
git commit -m "%DATE%"
git remote add origin https://github.com/postoakt/feelr.git
git push origin master