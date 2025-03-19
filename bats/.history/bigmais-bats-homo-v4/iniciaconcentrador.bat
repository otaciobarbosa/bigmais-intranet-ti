:: iniciaconcentrador.bat
:: set LD_LIBRARY_PATH
set LD_LIBRARY_PATH=%ECONECT_HOME%\conc\lib
:: set WORK DIR
cd %ECONECT_HOME%\conc\lib
:: EXECUTAR concentrador.jar
::java -jar concentrador.jar
start javaw -Xmx512m -jar concentrador.jar