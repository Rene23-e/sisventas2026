@echo off
setlocal EnableDelayedExpansion
set /a _Debug=0
::==========================================
:: Get Administrator Rights
set _Args=%*
if "%~1" NEQ "" (
  set _Args=%_Args:"=%
)
fltmc 1>nul 2>nul || (
  cd /d "%~dp0"
  if defined _Args (
    cmd /u /c echo Set UAC = CreateObject^("Shell.Application"^) : UAC.ShellExecute "cmd.exe", "/c cd /d ""%~dp0"" && ""%~dpnx0"" %_Args%", "", "runas", 1 > "%temp%\GetAdmin.vbs"
  ) else (
    cmd /u /c echo Set UAC = CreateObject^("Shell.Application"^) : UAC.ShellExecute "cmd.exe", "/c cd /d ""%~dp0"" && ""%~dpnx0""", "", "runas", 1 > "%temp%\GetAdmin.vbs"
  )
  "%temp%\GetAdmin.vbs"
  del /f /q "%temp%\GetAdmin.vbs" 1>nul 2>nul
  exit /b
)

cd /d "%~dp0"

echo ======================================================================
echo   Rollback - Restaurar Configuracion Previa de WAMP PHP y PATH
echo ======================================================================

set "NONINTERACTIVE=0"
for %%A in (%*) do (
    if /i "%%~A"=="-NonInteractive" set "NONINTERACTIVE=1"
)

:: Execute rollback in PowerShell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File "%~dp0setup_php_wamp.ps1" -Rollback %*

if "%NONINTERACTIVE%"=="1" (
    exit /b %errorlevel%
)

echo.
echo ======================================================================
echo   Rollback finalizado. Presiona cualquier tecla para salir.
echo ======================================================================
pause >nul
endlocal
