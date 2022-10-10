rem Fix Node.js version
set node=14.17.3
rem Try volta
WHERE /Q volta
IF  %ERRORLEVEL% == 0 (
  volta install node@%node%
) ELSE (
  rem Try nvm
  WHERE /Q nvm
  IF  %ERRORLEVEL% == 0 (
    nvm install %node%
    nvm use %node%
    nvm list
  )
)

rem Go to current directory
cd /d %~dp0
rem Run npm
start npm ci

rem old Node.js
rem 12.22.3
