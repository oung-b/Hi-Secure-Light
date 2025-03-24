$eventIDs = @(7, 8, 9, 21, 23, 24, 25, 41, 104, 200, 201, 204, 1074, 6006, 6008, 4624, 4625, 4634, 8202);
$timeLimit = (Get-Date).AddMinutes(-1);
$csvPath = "C:\Temp\FilteredSystemEvents.csv"
Get-EventLog -LogName System | Where-Object { $eventIDs -contains $_.EventID -and $_.TimeGenerated -gt $timeLimit } | Select-Object TimeGenerated, EntryType, Source, EventID, Message | Export-Csv -Path $csvPath -NoTypeInformation -Encoding UTF8
