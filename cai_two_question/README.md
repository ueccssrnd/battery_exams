CAI/ITS/I-CAI
=============

Create a system that contains the following modules: 
1. A module that will accept, edit, and search, and delete in the database 
the following items:
    * Question Id (Auto-Generated Number)
    * Question
    * Answer
    * Subject (Computer, English, Math)
    * Difficulty (Easy, Average, Difficult)
    * Point (Easy = 2, Average = 3, Difficult = 5)

*The database must consist of at least 50 items. The point should be 
auto-generated depending on the corresponding difficulty and cannot be edited 
nor added by the user. The Question Id should be auto-generated and cannot be 
edited nor added by the user.*

2. A module that accepts the name of the Examinee, Subject, and No. of Items.  
The No. of items should either be (5, 10, 15, and 20). The questions should be 
random. The pointing system is as follows: The point value is 1 if the answer is
 correct and increases by 1 on the succeeding correct answers. After 3 correct 
answers, the point value becomes 0. After 3 consecutive correct answers, the 
Tentative Score is the sum of the Tentative score and the Total Score and the 
point value becomes 0. The point value is -1 if the answer is incorrect and 
decreases by 1 on the succeeding incorrect answers. After 3 incorrect answers, 
the tentative score is 0 and the point value becomes 0. The tentative score is 
the product of Point and Point Value. The total score is total score plus 
tentative score. After the exam, the system must output the Name of the examinee
 and the total score.




SAMPLE DATA

Examinee Name: Raine KD Afan
Subject: English
No. of Items: 10

Question No.	Difficulty	Response	Point Value	Tent Score	Total Score
1	Easy	Correct	1	2	2
2	Difficult	Correct	2	6	8
3	Difficult	Correct	3	17	25
4	Easy	Correct	1	2	27
5	Easy	Incorrect	-1	-2	25
6	Easy	Correct	2	2	29
7	Average	Incorrect	-2	-6	23
8	Easy	Incorrect	-3	-6	17
9	Average	Incorrect	-1	-3	14
10	Difficult	Correct	3	9	23

Output:
Congratulations Raine KD Afan! You got a score of: 23!
