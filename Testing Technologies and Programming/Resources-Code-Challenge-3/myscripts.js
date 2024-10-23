// Testing the connection is made between files
console.log("is this linked");

// Define a class named Calculator
class Calculator {
  // Constructor for Calculator class
  constructor() {
    // Initialise Attributes
    this._oldNumber = 0;
  }

  // Setters
  set oldNumber(oldNumber) {
    // Set the old number from the screen
    this._oldNumber = oldNumber;
  }

  // Getters
  get oldNumber() {
    // Get the old number from the screen
    return this._oldNumber;
  }

  // Methods
  addingOperator(newNumber) {
    // Adding operation
    return parseFloat(this._oldNumber) + parseFloat(newNumber); // parseFloat() Convert string to float number
  }

  subtractingOperator(newNumber) {
    // Subtracting negative numbers
    return parseFloat(this._oldNumber) - parseFloat(newNumber);
  }

  multiplyingOperator(newNumber) {
    // Multiplying operation
    return parseFloat(this._oldNumber) * parseFloat(newNumber);
  }

  dividingOperator(newNumber) {
    // Dividing operation
    return parseFloat(this._oldNumber) / parseFloat(newNumber);
  }

  percentageOperator(newNumber) {
    // Percentage operation
    return (parseFloat(this._oldNumber) / 100) * parseFloat(newNumber);
  }
}

// Query Selectors

// Grab all the elements with the classname "number-button"
const numberButtons = document.querySelectorAll(".number-button");

// Grab all the elements with the classname "operator"
const operatorButtons = document.querySelectorAll(".operator");

// Attach element to the display screen element on the HTML document
const display = document.getElementById("total");

// Grab the equal button
const equalButton = document.getElementById("equal-button");

// Grab the clear button
const clearButton = document.getElementById("clear-button");

// Grab button for the spinning calculator
const spinnerButton = document.getElementById("chaos");

// Grab the calculator container
const calculatorContainer = document.getElementById("calculator-container");

// Sets base value for the display scren to be later changed on button clicked
let currentNumber = null;

// Create an Calculator instance
const calc = new Calculator();

// Set the axuiliar operator to empty " "
let auxOperator = "";

// Set the auxiliar screen. If it is false, initial the calculator, otherwise it comes from operator
let auxScreen = false;

// Looping through all elements and adding event listener and returing the inner value
numberButtons.forEach((number) => {
  number.addEventListener("click", () => {
    if (auxScreen == true) {
      // Behaviour when it comes from operator
      currentNumber = number.textContent;
      total.textContent = currentNumber; // Show the current number to the calculator screen
      auxScreen = false; // Init the aux screen to false
    } else {
      // Initial behaviour
      currentNumber = number.textContent;
      total.textContent += currentNumber;
    }
  });
});

spinnerButton.addEventListener("click", () => {
  calculatorContainer.classList.toggle("spinner");
});

// Listens for any Numeric input from the keyboard and displays it to the total screen
document.addEventListener("keydown", (e) => {
  if (!isNaN(e.key)) {
    if (auxScreen == true) {
      // Behaviour when it comes from operator
      currentNumber = e.key;
      total.textContent = currentNumber; // Show the current number to the calculator screen
      auxScreen = false; // Init the aux screen to false
    } else {
      // Initial behaviour
      currentNumber = e.key;
      total.textContent += currentNumber;
    }
  }
});

// Listens for operator inputs from the keyboard
document.addEventListener("keydown", (e) => {
  switch (e.key) {
    case "+":
      auxScreen = true;
      callOperation(); // Call function Operation
      auxOperator = "+";
      calc.oldNumber = total.textContent;
      break;
    case "-":
      auxScreen = true;
      callOperation(); // Call function Operation
      auxOperator = "-";
      calc.oldNumber = total.textContent;
      break;
    case "/":
      console.log("divide");
      auxScreen = true;
      callOperation(); // Call function Operation
      auxOperator = "/";
      calc.oldNumber = total.textContent;
      break;
    case "*":
      auxScreen = true;
      callOperation(); // Call function Operation
      auxOperator = "*";
      calc.oldNumber = total.textContent;
      break;
    case "Enter":
      console.log("Enter");
      handleEqual();
      break;
    case "Delete":
      clear();
      break;
    case "Backspace":
      total.textContent = total.textContent.slice(0, -1);
  }
});

// Looping through all elements and adding event listener and returing the inner value
operatorButtons.forEach((operator) => {
  operator.addEventListener("click", () => {
    console.log(operator.textContent); // Console operator

    // Assign auxOperator a value to know which operation the user has selected
    switch (operator.textContent) {
      case "+": // Adding
        callOperation(); // Call function Operation
        auxOperator = "+";
        calc.oldNumber = total.textContent; // Set the current number on the screen to the old number in the calculator
        break;
      case "-": // Subtracting
        callOperation(); // Call function Operation
        auxOperator = "-";
        calc.oldNumber = total.textContent; // Set the current number on the screen to the old number in the calculator
        break;
      case "×": // Multiplying
        callOperation(); // Call function Operation
        auxOperator = "×";
        calc.oldNumber = total.textContent; // Set the current number on the screen to the old number in the calculator
        break;
      case "÷": // Dividing
        callOperation(); // Call function Operation
        auxOperator = "÷";
        calc.oldNumber = total.textContent; // Set the current number on the screen to the old number in the calculator
        break;
      case "%": // Percentage
        callOperation(); // Call function Operation
        auxOperator = "%";
        calc.oldNumber = total.textContent; // Set the current number on the screen to the old number in the calculator
        break;
      case "+/-": // Positive negative
        convertPositiveNegative();
        break;
      default: //Empty
        auxOperator = "";
    }
    auxScreen = true; // Put true because comes from operator
  });
});

// Equal button
equalButton.addEventListener("click", () => {
  console.log("click");
  handleEqual();
});

// Clear Button
clearButton.addEventListener("click", () => {
  clear();
});

// Added function so it can be used it both the button on calc and keyboard del button
function clear() {
  currentNumber = null; // Erase the current number to 0
  auxScreen = false;
  calc.oldNumber = 0; // Set the old number in the calculator to 0, Erase old number
  total.textContent = currentNumber; // Show the current number equal 0 to the calculator screen
}

// Function - Do the operation depending the auxOperation
function callOperation() {
  if (auxOperator == "+") {
    // Adding operation
    currentNumber = calc.addingOperator(total.textContent); // Adding operation
    total.textContent = currentNumber;
  } else if (auxOperator == "-") {
    // Subtracting operation
    currentNumber = calc.subtractingOperator(total.textContent); // Subtracting operation
    total.textContent = currentNumber;
  } else if (auxOperator == "×" || auxOperator == "*") {
    // Multiplying operation
    currentNumber = calc.multiplyingOperator(total.textContent); // Subtracting operation
    total.textContent = currentNumber;
  } else if (auxOperator == "÷" || auxOperator == "/") {
    // Dividing operation
    currentNumber = calc.dividingOperator(total.textContent); // Dividing operation
    total.textContent = currentNumber;
  } else if (auxOperator == "%") {
    // Percentage operation
    currentNumber = calc.percentageOperator(total.textContent); // Percentage operation
    total.textContent = currentNumber;
  }
}

// Function for +/- operation
convertPositiveNegative = () => {
  const currentValue = parseFloat(total.textContent);
  const newValue = currentValue * -1;
  total.textContent = newValue.toString();
};

// Handles the equal input
function handleEqual() {
  callOperation(); // Call function Operation
  auxScreen = false;
  auxOperator = "";
}
