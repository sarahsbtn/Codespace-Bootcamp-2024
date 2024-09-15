<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=#, inital-scale=1.0">
        <title>Web Technologies - Challenge 1 - PHP Scripts</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <style> body {
            font-family: "Outfit", sans-serif;
        }
        </style>
    </head>
    <body>
    <div class="container" style="width: 70%;">
        <img src="csLogo.png" style="float: left;">
        <img src="ecLogo.png" style="float: right; margin-top: 3%;">
        <br>
        <h1 style="text-align: center;">Codespace Bootcamp</h1>
    </div>
    <br>
    <h1>Web Technologies</h1>
    <h2>Challenge 1 - PHP Scripts</h2>
    <p>In the following challenges, you will improve your scripting skills by writing solutions for the tasks.</p>
    <br>
    <h3>Challenge 1-1</h3>
    <!-- First, create two variables called $width and $height, and assign them the respective values of 10 and 5.
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
    <!-- This challenge that involves creating a PHP script that utilises strings, numbers and math:
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
    <!-- Age Calculator
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
    <!-- Numeric Arrays
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
    <!-- Create and initialise an array variable using a suitable variable name to display the following 
    values for climate in Edinburgh:
    The “hottest” months in Edinburgh are normally July and August. During summer, the average low temperatures are 52°F (11°C) and 
    average highs are 66°F (19°C). The coldest months of the year are January and February, with average lows of 33.8°F (1°C) and highs 
    that rarely exceed 44.6°F (7°C).-->
    <div id="answers">
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
    </div>
    <br>
    <br>
    <h3>Challenge 1-6</h3>
    <!-- 1. Create and initialise an array variable using a suitable variable name to display the following of student’s results:
    Name                    Physics           English       Maths
    Aarron                    74%               69%          70%
    Jamie                     64%               79%          69%
    Harry                     55%               52%          57%
    2.  Print to screen Aarron's Physics results.
    3.  Print to screen Jamie's English results.
    4.  Print to screen Harry's Maths results.-->
    <div id="answers">
        <?php 
            $aarron = array("physics" => "74%", "english" => "69%", "maths" => "70%");
            $jamie = array("physics" => "64%", "english" => "79%", "maths" => "69%");
            $harry = array("physics" => "55%", "english" => "52%", "maths" => "57%");

            echo "<h4>Student Results</h4>
            <table>
                <tr>
                    <td></td>
                    <th>Physics</th>
                    <th>English</th>
                    <th>Maths</th>
                </tr>
                <tr>
                    <th>Aarron</th>
                    <td>{$aarron["physics"]}</td>
                    <td>{$aarron["english"]}</td>
                    <td>{$aarron["maths"]}</td>
                </tr>
                <tr>
                    <th>Jamie</th>
                    <td>{$jamie["physics"]}</td>
                    <td>{$jamie["english"]}</td>
                    <td>{$jamie["maths"]}</td>
                </tr>
                <tr>
                    <th>Harry</th>
                    <td>{$harry["physics"]}</td>
                    <td>{$harry["english"]}</td>
                    <td>{$harry["maths"]}</td>
                </tr>
            </table>
            <br>
            Physics results for Aarron: {$aarron["physics"]}<br>
            English results for Jamie: {$jamie["english"]}<br>
            Maths results for Harry: {$harry["maths"]}
            "
        ?>
    </div>


</body>
</html>
