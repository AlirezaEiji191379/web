Set WinScriptHost = CreateObject("WScript.Shell")
WinScriptHost.Run Chr(34) & "G:\xampp\htdocs\web\cronJob\updateExam\autoRunPHP.bat" & Chr(34), 0
Set WinScriptHost = Nothing