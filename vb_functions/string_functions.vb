'A product code is generated by combining the first 3 alphanumeric characters 
'of the product description followed by a 5-digit random number (padded by 
'zeros) and the product’s date of creation (ddMMMyyyy).

'Input: "EQ Dry XL 36s
'Output: EQD-00012-14MAR2010
Public Function GenerateProductCode(Dim productName as String) As String
    Dim result as String = productName.Trim(" ")
    Dim productCode As String = result.SubString(0,3)
    Dim currentDate As String = (Date.Today.Day & Date.Today.Month.ToString("MMM") & Date.Today.Year ).ToString
  
      return productCode & "-" & --->random number<--- "-" & currentDate
End

'Input: ABCDEFGHIJKLMNOP'
'Output: BCDFGHJKLMNP'
Public Function OutputVowels(Dim inputString as String) As String
    
    Dim input As String = inputString
    Dim consonants As String = "bdcfghjklmnpqrstvwxyz"
    Dim inputConsonants = "" 
    For x As Integer = 0 to input.Length - 1
        For y As Integer = 0 to consonants.Length - 1
            If input.SubString(x,1).ToUpper = consonants.SubString(y,1).ToUpper Then
                inputConsonants += input.Substring(x,1)
            End If
        Next
    Next

    return inputConsonants
End Function


'Return "Hello" if Monday, Wednesday, or Friday, return the day name otherwise
'Current Date: Monday; Output: "Hello"
'Current Date: Tuesday, Ouput: "Tuesday"
'Based on SystemDate
Public Function GreetIfMWF() as String
    Select Case Today.DayOfWeek
        Case DayOfWeek.Monday, DayOfWeek.Wednesday, DayOfWeek.Friday
            return "Hello"
        Case Else
            return "Tuesday"
    End Select
End Function 