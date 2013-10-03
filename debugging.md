##Bago magsimula ang battery

1. Kailangan mo maka-solve ng at least isang sample problem __by yourself__. 
Solve lang ng solve and try to get it within the 4 hour limit.
__Pag di ka makasolve ng isang problem by yourself, di ka pa handa, kelangan mo 
pa mag-practice :( .__
2. Wag memorize, intindihin mo... iba ang "alam ko na to" sa "memoryado ko 
to", pag binago yung code, dedo. Remember, nagbabago ang bawat battery exam 
every take. Review niyo ang:

* Connection to database, mapa-SQL Server or Access, as in sobrang 
kabisado mo na or nakasulat sa source code, kasi di mo alam baka magtopak yung 
isang database kalagitnaan, at least may backup ka.
* `CREATE DATABASE` and `CREATE TABLE` statement, wag kayong papasok sa room ng 
hindi niyo alam to, isa to sa pinaka-unang kelangan eh. Dapat less than 5 
minutes yung pag-create ng table.
* Add-edit-delete-search-display. Kayang kaya niyo to in less than 1 hour. :)
* String functions (`substring`, `length`, `charAt`, formatting (2 zeroes 
para sa pera)
* Date functions (get current date, format date, subtract date 
(especially sa library), check if ano ang date or ano ang time)
* Random: Paano kumuha ng random number from 1-100, or 1-1000, or kung ano man,
 kung paano mag-pad ng zeroes, etc.
* If may time, advanced SQL statements: `ORDER BY RAND`, `MAX`, `MIN`, `TOP`.

3. I-condition mo yung utak mo na maging yung pinaka-masaya pagpasok ng lab. 
Which means na isuot mo ang favorite mo na shirt, and favorite mo na pants, 
kainin mo ang favorite mo na food, makinig ka sa favorite mo na music, (if 
religious, pray).

##Debugging Tips

__SQL Server, wag Access.__ Bakit? Kasi mas madali mag execute ng SQL statements 
dun, copy paste lang. Sa Access, kailangan mo pang i-edit yung worksheet view.

__Leave message boxes everywhere para makita kung ano value ng variables.__
For example, in computation:

`MsgBox("Product code: " & productCode & "index: " & index)`

At least medyo alam niyo na yung value at each point in time. Inuna namin ito 
kasi ginagawa ito ng lahat ng programmer. Importante na alam mo kung nasaan ka 
lagi and kung gumagana ba yung ginagawa mo or not.

__(.NET) Pwede mo rin gamitin ang Debug-View-Locals para macheck ang value ng 
bawat variable.__

__Minsan kelangan kausapin ang sarili, di bali nang mag-tunog ewan, at least 
pumasa!__ _"Pag ito pumasok sa loop na to, checheck ko kung totoo ito or hindi, 
tapos checheck ko kung totoo tong bagay na to, pag totoo, ganito ang mangyayari, 
pag hindi..."_. Don't assume na working na kaagad yung code until you go through 
EACH LINE para maghanap, "saan ba ako nagkakamali"?

__SQL: If may error yung SQL statement, check the SQL sa SQL Server or sa 
Access.__ As in literal na i-paste mo siya if ayaw gumana. Maglagay ka ng 
textbox sa form mo na `txtTestSQL` para pwede mo i-copy yung 
laman sa loob para i-paste mo sa Access, para makita mo kung saang part 
yung mali sa SQL statement.

__Isa pang technique, pag magde-debug ng SQL statements: yung lahat ng gagawin
mo involving the database, ilagay mo sa loob ng isang try-catch block sa program. Saluhin
dapat nung catch ang isang generic na exception, tapos i-output mo yung message.

Halimabawa, sa C#.NET:
    try
    {
        connection.Open();
        command.CommandText = "Insert into Tbl_Books...";
    } catch (Exception exc)
    {
        MessageBox.Show(e.Message)
    }
    connection.Close();

__Hindi stack trace (o yung mahabang explanation ng error) yung ipapakita sa MessageBox.
Madalas one-liner yung mga errors na sasabihin lang niyan. Mga tipong:

__"Incorrect syntax near Tbl_Books"___

Ganu'n.

__Wag muna humome-run:__

Example, sa insert. If di gumagana yung 
`"INSERT INTO products VALUES ('"& txtBoxPrice.text &"', '" txtBoxQuantity.text,"')"`,

* Try niyo muna, walang variables. `"INSERT INTO products VALUES ('99', '93')..."`
* Then, isang variable. `"INSERT INTO products VALUES ('"& txtBoxPrice.text &"', '93')..."`
* And dagdag ng dagdag, hanggang gumana na according to the question.
* Mas madali mag debug kung medyo may idea na kayo kung saan yung problem.

Re: String manipulation. __Most of the time, pwedeng gawin na gawa ka ng isang
 `for` loop na tumatagos sa isang string.__ Tapos, i-check mo ang bawat 
character kung pasok siya sa condition.

    //Bali ipapadaan mo yung isang variable sa bawat character ng isang string
    for (int i = 0; i < str.length; i++){
        //Check mo if vowel or hindi
        if (str.charAt(i) == 'AEIOU'){
            System.out.print('vowel');
        }else{
            System.out.print('not vowel');
        }
    }

Okay, na-stuck ka na. __Ang gawin mo is: paliitin mo ng paliitin yung problem
 to the point na kaya mong i-explain ang nangyayari per line, or even part nung 
line.__ Uulitin ko ito dahil sobrang importante nito. __Dapat naiintindihan mo 
ang ginagawa ng code mo para ma-fix mo ang bugs sa kanya. Di baling abutin ka 
ng ilang oras sa pag-prapractice, basta maintindihan mo lang kung ano ginagawa 
ng code na sinusulat mo.__ Doon mo lang masasabi na "uy, medyo alam ko na ang 
ginagawa ko". Hopefully by that time, ma-appreciate mo na ang programming. :)

_Sample problem: A product code is generated by combining the first 3 
alphanumeric characters of the product description followed by a 5-digit random 
number (padded by zeros) and the product’s date of creation (MMMddyyyy)._

Kelangan ko:

* Kunin yung input
* Kunin yung 1st 3 na characters na letter or number
* Makapag-generate ng random na number
* Lagyan ng 0 sa harap if maikli yung number
* Kunin yung date ngayon
* Ipagsama-sama lahat nito.

Galingan niyo!
--------------

__Contributors:__

[@daryllxd](http://www.github.com/daryllxd)

[@CoolStoryPro](https://twitter.com/CoolStoryPro)

[@josh](https://www.facebook.com/misskananirafaeljoshua)

[@monica] (https://littlemonicat.wordpress.com)