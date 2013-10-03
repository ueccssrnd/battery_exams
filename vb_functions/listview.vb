'Fill listview
Public Sub fillListView(Dim lst As ListView, Dim dt as DataTable)

    'Clear both Items and Columns to refresh the ListView
    lst.Items.Clear()
    lst.Columns.Clear()
    
    'Add DataTable columns to the ListView's columns
    For index as Integer = 0 to dt.Columns.Count - 1
        lst.Columns.Add(dt.Columns(index).ToString)
    Next

    'Add each DataTable row to the ListView, run For loop for each row
    For row As Integer = 0 to dt.Rows.Count - 1
        
        'Create a ListViewItem, and add it to the ListView itself
        Dim lsv as ListViewItem = lst.Items.Add(dt.Rows(row)(0).ToString)

        'Add each of the columns (Description, Price, etc...) to the ListViewItem
        For column As Integer = 1 to dt.Columns.Count - 1
            lsv.SubItems.Add(dt.Rows(row)(column).ToString)
        Next

    Next

    'Resize the columns
    For index As Integer = 0 to dt.Columns.Count - 1
        lst.AutoResizeColumns(index, Headersomethingsomething)
    Next
End Sub