<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=#, inital-scale=1.0">
        <title>Web Technologies - Challenge 1 -PHP Scripts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
    <div class="container">
        <img src="csLogo.png" style="float: left;">
        <img src="ecLogo.png" style="float: right; margin-top: 2%;">
        <br>
        <h1 style="text-align: center"><b>Codespace Bootcamp</b></h1>
        <h6 style="text-align: center">Sarah Beaton - EC1937236</h6>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-8">
            <h1 style="padding-left: 10px">Web Technologies</h1>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <br>
    <h2>Challenge 1 - PHP</h2>
    <p id="answers">In the following challenges, you will improve your scripting skills by writing solutions for the tasks.</p>
    <br>
    <h3>Challenge 1-1</h3>
    <!-- First, create two variables called $width and $height, and assign them the respective values of 10 and 5.
    Next, create a third variable called $area, and assign it the value of $width multiplied by $height.
    Finally, print out a string that includes the value of $width, $height, and $area in a sentence. -->
    <div id="answers">
        <pre>   
            <code>
                $width = 10;
                $height = 5;
                $area = $width * $height;
                
                echo "The rectangle has a width of $width meters, a height of $height meters and an area of $area square meters.";
            
            </code>
        </pre>
        <p>Output:</p>
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
    dividing them. The program should also concatenate the two numbers into a string. -->
    <div id="answers">
        <pre>
            <code>
                $num1 = 10;
                $num2 = 5;

                //Addition
                $addit = $num1 + $num2;
                echo "Addition of $num1 and $num2 is $addit.&lt;br>";

                //Subtraction
                $subtr = $num1 - $num2;
                echo "Subraction of $num1 and $num2 is $subtr.&lt;br>";

                //Multiplication
                $multi = $num1 * $num2;
                echo "Multiplication of $num1 and $num2 is $multi.&lt;br>";

                //Division 
                $divis = $num1 / $num2;
                echo "Division of $num1 and $num2 is $divis.&lt;br>";

                //Concatenate
                $string = $num1 . $num2;
                
                echo "Concatenation of $num1 and $num2 is $string.";
            </code>
        </pre>
        <p>Output:</p>
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
        Output:
        Welcome to the Age Calculator!
        Your age: 25
        You have been alive for:
        9125 days
        219000 hours
        13140000 minutes -->
    <div id="answers">
        <pre>
            <code>
                $age = 28;
                $days = $age * 365;
                $hours = $age * 8760;
                $minutes = $age * 525600;

                echo "Welcome to the Age Calculator!&lt;br>&lt;br>
                Your age: 28&lt;br>&lt;br>
                You have been alive for:&lt;br>
                $days days&lt;br>
                $hours hours&lt;br>
                $minutes minutes";
            </code>
        </pre>
        <p>Output:</p>
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
    Sunday -->
    <div id="answers">
        <pre>
            <code>
                $daysOfTheWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                foreach ($daysOfTheWeek as $day) {
                    &nbsp;echo "&lt;li>$day&lt;/li>";
                }
            </code>
        </pre>
        <p>Output:</p>
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
    <!-- Associative Arrays 
        Create and initialise an array variable using a suitable variable name to display the following values for climate in Edinburgh:
        The “hottest” months in Edinburgh are normally July and August. During summer, the average low temperatures are 52°F (11°C) and average highs are 66°F (19°C)
        The coldest months of the year are January and February, with average lows of 33.8°F (1°C) and highs that rarely exceed 44.6°F (7°C).
        Output:
        Average Temperature in Edinburgh
        Month				High			Low
        July-Aug			19 ℃			11 ℃
        Jan-Feb				7 ℃	       		1 ℃ -->
    <div id="answers">
        <pre>
            <code>
                $julyAugust = array("low" => "11°C", "high" => "19°C");
                $januaryFebruary = array("low" => "1°C", "high" => "7°C");

                echo "&lt;h5>Average Temperatures in Edinburgh&lt;/h5>
                &lt;table>
                    &lt;tr>
                        &lt;th>Months&lt;/th>
                        &lt;th>Low&lt;/th>
                        &lt;th>High&lt;/th>
                    &lt;/tr>
                    &lt;tr>
                        &lt;td>July - August&lt;/td>
                        &lt;td>{$julyAugust["low"]}&lt;/td>
                        &lt;td>{$julyAugust["high"]}&lt;/td>
                    &lt;/tr>
                    &lt;tr>
                        &lt;td>January - February&lt;/td>
                        &lt;td>{$januaryFebruary["low"]}&lt;/td>
                        &lt;td>{$januaryFebruary["high"]}&lt;/td>
                    &lt;/tr>
                &lt;/table>"
            </code>
        </pre>
        <p>Output:</p>
        <?php 
            $julyAugust = array("low" => "11°C", "high" => "19°C");
            $januaryFebruary = array("low" => "1°C", "high" => "7°C");

            echo "<h5>Average Temperatures in Edinburgh</h5>
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
    4.  Print to screen Harry's Maths results. -->
    <div id="answers">
        <pre>
            <code>
            $aarron = array("physics" => 74, "english" => 69, "maths" => 70);
            $jamie = array("physics" => 64, "english" => 79, "maths" => 69);
            $harry = array("physics" => 55, "english" => 52, "maths" => 57);

            echo "&lt;h5>Student Results&lt;/h5>
            &lt;table>
                &lt;tr>
                    &lt;td>&lt;/td>
                    &lt;th>Physics&lt;/th>
                    &lt;th>English&lt;/th>
                    &lt;th>Maths&lt;/th>
                &lt;/tr>
                &lt;tr>
                    &lt;th>Aarron&lt;/th>
                    &lt;td>{$aarron["physics"]}%&lt;/td>
                    &lt;td>{$aarron["english"]}%&lt;/td>
                    &lt;td>{$aarron["maths"]}%&lt;/td>
                &lt;/tr>
                &lt;tr>
                    &lt;th>Jamie&lt;/th>
                    &lt;td>{$jamie["physics"]}%&lt;/td>
                    &lt;td>{$jamie["english"]}%&lt;/td>
                    &lt;td>{$jamie["maths"]}%&lt;/td>
                &lt;/tr>
                &lt;tr>
                    &lt;th>Harry&lt;/th>
                    &lt;td>{$harry["physics"]}%&lt;/td>
                    &lt;td>{$harry["english"]}%&lt;/td>
                    &lt;td>{$harry["maths"]}%&lt;/td>
                &lt;/tr>
            &lt;/table>
            &lt;br>
            Physics results for Aarron: {$aarron["physics"]}%&lt;br>
            English results for Jamie: {$jamie["english"]}%&lt;br>
            Maths results for Harry: {$harry["maths"]}%"
            </code>
        </pre>
        <p>Output:</p>
        <?php 
            $aarron = array("physics" => 74, "english" => 69, "maths" => 70);
            $jamie = array("physics" => 64, "english" => 79, "maths" => 69);
            $harry = array("physics" => 55, "english" => 52, "maths" => 57);

            echo "<h5>Student Results</h5>
            <table>
                <tr>
                    <td></td>
                    <th>Physics</th>
                    <th>English</th>
                    <th>Maths</th>
                </tr>
                <tr>
                    <th>Aarron</th>
                    <td>{$aarron["physics"]}%</td>
                    <td>{$aarron["english"]}%</td>
                    <td>{$aarron["maths"]}%</td>
                </tr>
                <tr>
                    <th>Jamie</th>
                    <td>{$jamie["physics"]}%</td>
                    <td>{$jamie["english"]}%</td>
                    <td>{$jamie["maths"]}%</td>
                </tr>
                <tr>
                    <th>Harry</th>
                    <td>{$harry["physics"]}%</td>
                    <td>{$harry["english"]}%</td>
                    <td>{$harry["maths"]}%</td>
                </tr>
            </table>
            <br>
            Physics results for Aarron: {$aarron["physics"]}%<br>
            English results for Jamie: {$jamie["english"]}%<br>
            Maths results for Harry: {$harry["maths"]}%"
        ?>
    </div>
    <br>
    <br>
</body>
</html>