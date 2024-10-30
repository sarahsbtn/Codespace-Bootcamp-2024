// Function to generate a random number between 1 and 10
function generateRandomNumber() {
    return Math.floor(Math.random() * 10) + 1;
}

/* Math.random to generate number between 0 and 1
* that by 10 to adjust range to between 0 and just under 10
Math.floor rounds the random number to nearest whole number
+ 1 to adjust range to between 1 and 10
*/

// Set maximum number of attempts allowed for each game session (3)
let attempts = 0;
const maxAttempts = 3;

// Select and assign elements from DOM
const submitButton = document.querySelector('button');
const playerGuessInput = document.getElementById('playerGuess');
let gameText = document.getElementById('gameText');

// Generate the random number
let randomNumber = generateRandomNumber();

// Add event listener to submit button
submitButton.addEventListener('click', () => {

    // Take player's input and convert from string to integer using parseInt
    const playerGuess = parseInt(playerGuessInput.value);

    // Check that the number is between 1 and 10, if not return prompt for valid range, otherwise continue
    if (playerGuess < 1 || playerGuess > 10) {
        gameText.textContent = "Please enter a number between 1 and 10";
        return;
    }

    // Increment the number of attempts 
    attempts++;


    // Check if the player's guess is correct
    if (playerGuess === randomNumber) {
        gameText.textContent = "Congratulations, " + randomNumber + " is right!";

        // Reset the game for new round, taking the number of attempts back to 0
        resetGame();

        // If the player has reached the maximum number of attempts (3)
    } else if (attempts >= maxAttempts) {
        gameText.textContent = "Sorry, you've used all attempts! The number was " + randomNumber;
        resetGame();


        // Use elseif statement to hint to the player if the number is higher or lower
    } else {

        // If the randomNumber is more than the playerGuess...
        if (playerGuess < randomNumber) {
            gameText.textContent = "Higher! Try again";

            // Else the randomNumber must be lower than the playerGuess
        } else {
            gameText.textContent = "Lower! Try again";
        }
    }
});

// Function to reset the game 
function resetGame() {

    // Generate a new random number
    randomNumber = generateRandomNumber();

    // Reset the number of attempt back to 0
    attempts = 0;

    // Clear the playerGuessInput 
    playerGuessInput.value = '';
}