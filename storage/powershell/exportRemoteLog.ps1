$timeLimit = (Get-Date).AddMinutes(-1);
$csvPath = "C:\Temp\RDPLogs.csv"
Get-WinEvent -LogName "Microsoft-Windows-TerminalServices-LocalSessionManager/Operational" | Where-Object { $_.TimeGenerated -gt $timeLimit } | Select-Object TimeCreated, Id, Message | Export-Csv -Path $csvPath -NoTypeInformation -Encoding UTF8
