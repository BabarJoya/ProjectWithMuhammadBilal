Function uLoad()
Dim x As Integer
Dim objHTTP As Object
Dim URL As String
Set objHTTP = CreateObject("WinHttp.WinHttpRequest.5.1")

For x = 2 To 2000
If Range("PreBoard2019!A" & x).Value = "Subject" Then
sSub1 = Range("PreBoard2019!C" & x).Value ' A1
sSub2 = Range("PreBoard2019!D" & x).Value ' A2
sSub3 = Range("PreBoard2019!E" & x).Value ' A3
sSub4 = Range("PreBoard2019!F" & x).Value ' A4
sSub5 = Range("PreBoard2019!G" & x).Value ' A5
sSub6 = Range("PreBoard2019!H" & x).Value ' A6
sSub7 = Range("PreBoard2019!I" & x).Value ' A7
End If

If Range("PreBoard2019!A" & x).Value = "Total:" Then
tSub1 = Range("PreBoard2019!C" & x).Value ' A8
tSub2 = Range("PreBoard2019!D" & x).Value ' A9
tSub3 = Range("PreBoard2019!E" & x).Value ' A10
tSub4 = Range("PreBoard2019!F" & x).Value ' A11
tSub5 = Range("PreBoard2019!G" & x).Value ' A12
tSub6 = Range("PreBoard2019!H" & x).Value ' A13
tSub7 = Range("PreBoard2019!I" & x).Value ' A14
If Trim(tSub1) = "" Then tSub1 = 0
If Trim(tSub2) = "" Then tSub2 = 0
If Trim(tSub3) = "" Then tSub3 = 0
If Trim(tSub4) = "" Then tSub4 = 0
If Trim(tSub5) = "" Then tSub5 = 0
If Trim(tSub6) = "" Then tSub6 = 0
If Trim(tSub7) = "" Then tSub7 = 0

End If


If Left(Range("PreBoard2019!A" & x).Value, 2) = "17" Or Left(Range("PreBoard2019!A" & x).Value, 2) = "18" Then
oName = Range("PreBoard2019!B" & x).Value ' A15
oSub1 = Range("PreBoard2019!C" & x).Value ' A16
oSub2 = Range("PreBoard2019!D" & x).Value ' A17
oSub3 = Range("PreBoard2019!E" & x).Value ' A18
oSub4 = Range("PreBoard2019!F" & x).Value ' A19
oSub5 = Range("PreBoard2019!G" & x).Value ' A20
oSub6 = Range("PreBoard2019!H" & x).Value ' A21
oSub7 = Range("PreBoard2019!I" & x).Value ' A22
oAttendance = Range("PreBoard2019!L" & x).Value ' A23
oAdmission = Range("PreBoard2019!M" & x).Value ' A24
oRoll = Replace(Range("PreBoard2019!A" & x).Value, "-", "") ' A25

If Trim(oSub1) = "" Then oSub1 = 0
If Trim(oSub2) = "" Then oSub2 = 0
If Trim(oSub3) = "" Then oSub3 = 0
If Trim(oSub4) = "" Then oSub4 = 0
If Trim(oSub5) = "" Then oSub5 = 0
If Trim(oSub6) = "" Then oSub6 = 0
If Trim(oSub7) = "" Then oSub7 = 0


'st = "http://localhost/GKRSCollege.edu.pk/"
st = "http://GKRSCollege.edu.pk/"
URL = st & "ul.php?A1=" & sSub1 & "&A2=" & sSub2 & "&A3=" & sSub3 & "&A4=" & sSub4 & "&A5=" & sSub5 & "&A6=" & sSub6 & "&A7=" & sSub7 & _
                                  "&A8=" & tSub1 & "&A9=" & tSub2 & "&A10=" & tSub3 & "&A11=" & tSub4 & "&A12=" & tSub5 & "&A13=" & tSub6 & "&A14=" & tSub7 & _
                                  "&A15=" & oName & "&A16=" & oSub1 & "&A17=" & oSub2 & "&A18=" & oSub3 & "&A19=" & oSub4 & "&A20=" & oSub5 & "&A21=" & oSub6 & _
                                  "&A22=" & oSub7 & "&A23=" & oAttendance & "&A24=" & oAdmission & "&A25=" & oRoll

'MsgBox URL
    objHTTP.Open "GET", URL, False
    objHTTP.setRequestHeader "User-Agent", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)"
    objHTTP.setRequestHeader "Content-type", "application/x-www-form-urlencoded"
    objHTTP.send ("keyword=php")
    If InStr(objHTTP.responseText, "SENT") <> 0 Then
    Range("PreBoard2019!O" & x).Value = "UPLOADED"              ' We did it
    Else
    Range("PreBoard2019!O" & x).Value = objHTTP.responseText         ' We had error
    'MsgBox objHTTP.responseText
    End If



Range("PreBoard2019!O1").Value = x
DoEvents

End If





Next x

End Function
