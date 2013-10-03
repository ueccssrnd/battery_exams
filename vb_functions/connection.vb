Imports System
Imports System.Data
Imports System.Data.SqlClient

Public Class clsConnection  --->Pero yung "clsConnection" (Name) yan ng Class File<---
    Public Function Execute(Dim command As String) As DataTable
        Dim conn As New SqlConnection("--->Dito mo lagay yung connection string<---")
        Dim myAdapter As New SqlDataAdapter(command, conn)
        Dim dt As New DataTable
        myAdapter.Fill(dt)

        return dts
    End Function
End Class





"To get the Connection String"

1. Click Data in the Menu Bar
2. Add New Data Source
3. Select DataSet/DataTable
4. Add New Connection
5. Select Microsoft SQL Server
6. Fill up the needed info
7. Select Database after the input of username and password
8. Press Test Connection(Must succeed)
9. Then OK
10. Click the '+' Button on the upper left of the box below
11. Copy what's inside
12. Then Click Cancel
13. Paste in the "--->Dito mo lagay yung connection string<---"
14. YEY!