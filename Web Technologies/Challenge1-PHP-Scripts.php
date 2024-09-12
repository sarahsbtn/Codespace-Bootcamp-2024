<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=#, inital-scale=1.0">
        <title>Web Technologies - Challenge 1</title>
        <style>
            body {
                padding: 15px;
                font-family: arial;
            }

            h1, h3 {
                text-decoration: underline;
                border-radius: 18px;
                background-color: #DCDCDC;
                padding: 10px;
                width: 70%;
            }

            #answers, p, h4, table
                {
                    padding-left: 15px;
                }

            table {
                border-spacing: 15px;
                text-align: centre;
            }
        </style>
    </head>
    <body>

    <h1>Challenge 1 - PHP Scripts</h1>
    <p>In the following challenges, you will improve your scripting skills by writing solutions for the tasks.</p>
    <br>
    <h3>Challenge 1-1</h3>
    <!--
    First, create two variables called $width and $height, and assign them the respective values of 10 and 5.
    Next, create a third variable called $area, and assign it the value of $width multiplied by $height.
    Finally, print out a string that includes the value of $width, $height, and $area in a sentence.
    -->
    <div id="answers">
        <?php
            $width = 10;
            $height = 5;
            $area = $width * $height;

            echo "The rectangle has a width of $width meters, a height of $height meters and an area of $area square meters.";
        ?>
    </div>
    <br>
    <br>
    <h3>Challenge 1-2</h3>
    <!--This challenge that involves creating a PHP script that utilises strings, numbers and math:
    Create a PHP program that takes two numbers and outputs the result of adding, subtracting, multiplying, and 
    dividing them. The program should also concatenate the two numbers into a string.
    -->
    <div id="answers">
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
    </div>
    <br>
    <br>
    <h3>Challenge 1-3</h3>
    <!--Age Calculator
    Create a program that uses variables to store the user's age and the number of days, hours, and minutes they have been alive.
    -->
    <div id="answers">
        <?php
            $age = 28;
            $days = $age * 365;
            $hours = $age * 8760;
            $minutes = $age * 525600;

            echo "Welcome to the Age Calculator!<br><br>
            Your age: 28<br><br>
            You have been alive for:<br>
            $days days<br>
            $hours hours<br>
            $minutes minutes";
        ?>
    </div>
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
    <div id="answers">
        <?php 
            $daysOfTheWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            foreach ($daysOfTheWeek as $day) {
               echo "<li>$day</li>";
            }
        ?>
    </div>
    <br>
    <br>
    <h3>Challenge 1-5</h3>
    <!--Create and initialise an array variable using a suitable variable name to display the following 
    values for climate in Edinburgh:
    The “hottest” months in Edinburgh are normally July and August. During summer, the average low temperatures are 52°F (11°C) and 
    average highs are 66°F (19°C). The coldest months of the year are January and February, with average lows of 33.8°F (1°C) and highs 
    that rarely exceed 44.6°F (7°C).-->
    <?php 
        $julyAugust = array("low" => "11°C", "high" => "19°C");
        $januaryFebruary = array("low" => "1°C", "high" => "7°C");

        echo "<h4>Average Temperatures in Edinburgh</h4>
        <table>
            <tr>
                <th>Months</th>
                <th>Low</th>
                <th>High</th>
            </tr>
            <tr>
                <td>July - August</td>
                <td>{$julyAugust["low"]}</td>
                <td>{$julyAugust["high"]}</td>
            </tr>
            <tr>
                <td>January - February</td>
                <td>{$januaryFebruary["low"]}</td>
                <td>{$januaryFebruary["high"]}</td>
            </tr>

        </table>"
            
    ?>


</body>
</html>
