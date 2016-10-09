@echo off

rem -------------------------------------------------------------
rem  Yii command line bootstrap script for Windows.
rem
rem  @author Qiang Xue <qiang.xue@gmail.com>
rem  @link http://www.yiiframework.com/
rem  @copyright Copyright (c) 2008 Yii Software LLC
rem  @license http://www.yiiframework.com/license/
rem -------------------------------------------------------------

@setlocal

set DRUID_PATH=D:\Ninoska\Documents\Druid\

if "%JAVA_COMMAND%" == "" set JAVA_COMMAND=java.exe

"%JAVA_COMMAND%" -jar "%DRUID_PATH%druid.jar" %*

@endlocal
