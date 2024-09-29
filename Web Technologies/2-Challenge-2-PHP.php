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
    <h2>Challenge 2 - PHP TEST</h2>
    <p id="answers">In the following challenges, you will improve your scripting skills by writing solutions for the tasks.</p>
    <br>
    <h3>PHP Function</h3>
    <!-- Create a PHP function that takes in a string as an argument and returns the string with all vowels replaced with the character "x".
        1. Define a PHP function replaceVowelsWithX that takes in a string argument $str.
        2. Define an array $vowels that contains all the vowels in both lowercase and uppercase.
        3. Use the str_replace function to replace all occurrences of the vowels in $str with the character "x".
        4. Return the modified string as the output of the function.
        5.  Then use the echo statement to output the modified string to the screen. -->
    <div id="answers">
        <pre>   
            <code>
            &lt;form action="&lt;?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">  
                &lt;div class="row">  
                    &lt;div class="col-sm-6">Enter word: &lt;input style="width: 10em" type="text" name="yourWord" required>&lt;/div> 
                &lt;/div>
                &lt;button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit&lt;/button>  
            &lt;/form>  
                
            &lt;?php  
                if ($_SERVER["REQUEST_METHOD"] == "GET") {   
                    if (isset($_GET["yourWord"])) {   
                        $yourWord = $_GET["yourWord"];  
                
                        function replaceVowelsWithX($str) {  
                        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");  
                        return str_replace($vowels, "X", $str);  
                        }  
                
                        $newword = replaceVowelsWithX($yourWord);  
                        echo "&lt;p>The answer is: &lt;b>$newword&lt;/b>";  
                    }  
                }  
            ?>
            </code>
        </pre>
        <p>Output:</p>
        <div id="box">
            <h5>Replace Vowels with X</h5>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">  
                <div class="row">  
                    <div class="col-sm-6">Enter word: <input style="width: 10em" type="text" name="yourWord" required></div> 
                </div>
                <button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit</button>  
            </form>  
                
            <?php  
                if ($_SERVER["REQUEST_METHOD"] == "GET") {   
                    if (isset($_GET["yourWord"])) {   
                        $yourWord = $_GET["yourWord"];  
                
                        function replaceVowelsWithX($str) {  
                        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");  
                        return str_replace($vowels, "X", $str);  
                        }  
                
                        $newword = replaceVowelsWithX($yourWord);  
                        echo "<p>The answer is: <b>$newword</b>";  
                    }  
                }  
            ?>
        </div>
    </div>
    <br>
    <br>
    <h3>Calculator</h3>
    <!-- Create a simple calculator program that takes two numbers as input and performs basic arithmetic operations on them using PHP operators. The program should display the results of each operation.
        Requirements 
        The program should display a form that allows the user to enter two numbers and select an operation (+, -, *, or /).
        The program should use PHP operators to perform the selected operation on the two numbers.
        The program should display the result of the operation in a user-friendly format. -->
    <div id="answers">
        <pre>
            <code>
            &lt;form action="&lt;?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">
                &lt;div class="row">
                    &lt;div class="col-sm-4">First number: &lt;input style="width: 4em" type="number" name="num1" required>&lt;/div>
                    &lt;div class="col-sm-4">Second number: &lt;input style="width: 4em" type="number" name="num2" required>&lt;/div>
                &lt;/div>
                &lt;br>
                &lt;div class="row">
                    &lt;div class="col-sm-2" align="center">&lt;button type="submit" class="btn btn-secondary btn-lg" name="addit">+&lt;/button>&lt;/div>
                    &lt;div class="col-sm-2" align="center">&lt;button type="submit" class="btn btn-secondary btn-lg" name="subtr">-&lt;/button>&lt;/div>
                    &lt;div class="col-sm-2" align="center">&lt;button type="submit" class="btn btn-secondary btn-lg" name="multi">&times;&lt;/button>&lt;/div>
                    &lt;div class="col-sm-2" align="center">&lt;button type="submit" class="btn btn-secondary btn-lg" name="divis">&divide;&lt;/button>&lt;/div>
                &lt;/div>
            &lt;/form>
            &lt;br>
            
            &lt;?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {  
                    if (isset($_GET["num1"]) && isset($_GET["num2"])) {  
                    $num1 = $_GET["num1"];  
                    $num2 = $_GET["num2"];  
                    $result = 0;

                    //Addition
                    if (isset($_GET["addit"])) {  
                        $result = $num1 + $num2;
                        
                    //Subtraction    
                    } elseif (isset($_GET["subtr"])) {  
                        $result = $num1 - $num2;
                        
                    //Multiplication
                    } elseif (isset($_GET["multi"])) {  
                        $result = $num1 * $num2; 
                        
                    //Division
                    } elseif (isset($_GET["divis"])) {  
                        if ($num2 != 0) {  
                            $result = $num1 / $num2;  
                        } 
                    }

                    echo "&lt;p>The answer is: &lt;b>$result&lt;/b>&lt;/p>";
                }
            }
            ?>
            </code>
        </pre>
        <p>Output:</p>
        <div id="box">
            <h5>Basic Calculator</h5>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">
                <div class="row">
                    <div class="col-sm-4">First number: <input style="width: 4em" type="number" name="num1" required></div>
                    <div class="col-sm-4">Second number: <input style="width: 4em" type="number" name="num2" required></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2" align="center"><button type="submit" class="btn btn-secondary btn-lg" name="addit">+</button></div>
                    <div class="col-sm-2" align="center"><button type="submit" class="btn btn-secondary btn-lg" name="subtr">-</button></div>
                    <div class="col-sm-2" align="center"><button type="submit" class="btn btn-secondary btn-lg" name="multi">&times;</button></div>
                    <div class="col-sm-2" align="center"><button type="submit" class="btn btn-secondary btn-lg" name="divis">&divide;</button></div>
                </div>
            </form>
            <br>
            
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {  
                    if (isset($_GET["num1"]) && isset($_GET["num2"])) {  
                    $num1 = $_GET["num1"];  
                    $num2 = $_GET["num2"];  
                    $result = 0;

                    //Addition
                    if (isset($_GET["addit"])) {  
                        $result = $num1 + $num2;
                        
                    //Subtraction    
                    } elseif (isset($_GET["subtr"])) {  
                        $result = $num1 - $num2;
                        
                    //Multiplication
                    } elseif (isset($_GET["multi"])) {  
                        $result = $num1 * $num2; 
                        
                    //Division
                    } elseif (isset($_GET["divis"])) {  
                        if ($num2 != 0) {  
                            $result = $num1 / $num2;  
                        } 
                    }

                    echo "<p>The answer is: <b>$result</b></p>";
                }
            }
            ?>
        </div>
    </div>
    <br>
    <br>
    <h3>for Loop</h3>
    <!-- Write a PHP program that displays the multiplication table of a given number using a for loop.
        The program should accept a single input from the user, which is the number whose multiplication table should be displayed. 
        The output should display the multiplication table from 1 to 10.
        For example, if the user enters the number 5, the output should be:
        Multiplication table of 5:
        5 x 1 = 5
        5 x 2 = 10
        5 x 3 = 15
        5 x 4 = 20
        5 x 5 = 25
        5 x 6 = 30
        5 x 7 = 35
        5 x 8 = 40
        5 x 9 = 45
        5 x 10 = 50 -->
    <div id="answers">
        <pre>
            <code>
            &lt;form action="&lt;?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">   
                &lt;div class="row">   
                    &lt;div class="col-sm-6">Enter number: &lt;input style="width: 4em" type="number" name="yourNumber" required>&lt;/div>  
                &lt;/div>  
                &lt;button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit&lt;/button>   
            &lt;/form>  
                
            &lt;?php  
                if ($_SERVER["REQUEST_METHOD"] == "GET") {    
                    if (isset($_GET["yourNumber"])) {    
                        $number = $_GET["yourNumber"];   
                
                        echo "Multiplication table of &lt;b>$number:&lt;/b>&lt;br>";  
                
                        for ($i = 1; $i &lt;= 10; $i++) {   
                        echo "&lt;b>$number x $i = " . $number * $i . "&lt;/b>&lt;br>";   
                        }   
                    }   
                }   
            ?>
            </code>
        </pre>
        <p>Output:</p>
        <div id="box">
            <h5>Multiplication Table</h5>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">   
                <div class="row">   
                    <div class="col-sm-6">Enter number: <input style="width: 4em" type="number" name="yourNumber" required></div>  
                </div>  
                <button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit</button>   
            </form>  
                
            <?php  
                if ($_SERVER["REQUEST_METHOD"] == "GET") {    
                    if (isset($_GET["yourNumber"])) {    
                        $number = $_GET["yourNumber"];   
                
                        echo "Multiplication table of <b>$number:</b><br>";  
                
                        for ($i = 1; $i <= 10; $i++) {   
                        echo "<b>$number x $i = " . $number * $i . "</b><br>";   
                        }   
                    }   
                }   
            ?>
        </div>
    </div>
    <br>
    <br>
    <h3>else Statements</h3>
    <!-- In this challenge, create a variable $age is set the value. 
        Next create a script that checks the value of $age and displays a message based on the age group it falls into:
        -  If the value of $age is less than 13, it displays "You are a child."
        -  If the value of $age is between 13 and 17, it displays "You are a teenager."
        -  If the value of $age is between 18 and 64, it displays "You are an adult."
        -  If none of the above conditions are met, it displays "You are a senior citizen." -->
    <div id="answers">
        <pre>
            <code>
            &lt;form  action=" &lt;?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">   
                 &lt;div class="row">   
                     &lt;div class="col-sm-6">Enter your age:  &lt;input style="width: 4em" type="number" name="yourAge" required> &lt;/div>  
                 &lt;/div>  
                 &lt;button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit &lt;/button>   
             &lt;/form> 
             &lt;?php 
                if ($_SERVER["REQUEST_METHOD"] == "GET") {    
                    if (isset($_GET["yourAge"])) {    
                        $age = $_GET["yourAge"];

                        if ($age  &lt; 13) {
                            echo " &lt;b>You are a child. &lt;/b>";
                        } elseif ($age  &lt; 18) {
                            echo " &lt;b>You are a teenager. &lt;/b>";
                        } elseif ($age  &lt; 64) {
                            echo " &lt;b>You are an adult. &lt;/b>";
                        } else {
                            echo " &lt;b>You are a senior citizen. &lt;/b>";
                        }
                    }
                }
            ?>
            </code>
        </pre>
        <p>Output:</p>
            <div id="box">
            <h5>Your Age Group</h5>
            <form  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" target="_self">   
                <div class="row">   
                    <div class="col-sm-6">Enter your age: <input style="width: 4em" type="number" name="yourAge" required></div>  
                </div>  
                <button type="submit" class="btn btn-secondary" style="margin: 10px" name="submit">Submit</button>   
            </form> 
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "GET") {    
                    if (isset($_GET["yourAge"])) {    
                        $age = $_GET["yourAge"];

                        if ($age < 13) {
                            echo "<b>You are a child.</b>";
                        } elseif ($age < 18) {
                            echo "<b>You are a teenager.</b>";
                        } elseif ($age < 64) {
                            echo "<b>You are an adult.</b>";
                        } else {
                            echo "<b>You are a senior citizen.</b>";
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>