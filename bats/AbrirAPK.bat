@echo off
set /p nome=Informe o nome do app: 
echo O nome escolhido foi '%nome%'.
start /max  C:\xampp\htdocs\repositorio\big-mais-supermercados\%nome%\app\platforms\android\app\build\outputs\apk\debug
pause