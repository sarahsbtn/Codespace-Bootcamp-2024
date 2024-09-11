
<h3>Challenge 1-1</h3>
<!--
This challenge that involves creating a PHP script that utilises variables, strings, and math:
First, create two variables called $width and $height, and assign them the respective values of 10 and 5.
Next, create a third variable called $area, and assign it the value of $width multiplied by $height.
Finally, print out a string that includes the value of $width, $height, and $area in a sentence.
-->
<?php
    $width = 10;
    $height = 5;
    $area = $width * $height;

    echo "The rectangle has a width of $width meters, a height of $height meters and an area of $area square meters.";
?>
<br>
<br>
<br>
<h3>Challenge 1-2</h3>
<!--This challenge that involves creating a PHP script that utilises strings, numbers and math:
Create a PHP program that takes two numbers and outputs the result of adding, subtracting, multiplying, and 
dividing them. The program should also concatenate the two numbers into a string.
-->
<?php
    $num1 = 10;
    $num2 = 5;

    //Addition
    $addit = $num1 + $num2;
    echo "Addition of $num1 and $num2 is $addit.<br>";

    //Subtraction
    $subtr = $num1 - $num2;
    echo "Subraction of $num1 and $num2 is $subtr.<br>";

    //Multiplication
    $multi = $num1 * $num2;
    echo "Multiplication of $num1 and $num2 is $multi.<br>";

    //Division 
    $divis = $num1 / $num2;
    echo "Division of $num1 and $num2 is $divis.<br>";

    //Concatenate
    $string = $num1 . $num2;
    echo "Concatenation of $num1 and $num2 is $string.";
?>
<br>
<br>
<br>
<h3>Challenge 1-3</h3>
<!--Age Calculator
Create a program that uses variables to store the user's age and the number of days, hours, and minutes they have been alive.
-->
<?php
    $age = 25;
    $days = $age * 365;
    $hours = $age * 8760;
    $minutes = $age * 525600;

    echo "Welcome to the Age Calculator!<br>
    Your age: 25<br>
    You have been alive for:<br>
    $days days<br>
    $hours hours<br>
    $minutes minutes";
?>
<br>
<br>
<br>
<h3>Challenge 1-4</h3>
<!--Numeric Arrays
Create and initialise an array variable using a suitable variable name to display the following values:
Monday
Tuesday
Wednesday
Thursday
Friday
Saturday
Sunday
-->
