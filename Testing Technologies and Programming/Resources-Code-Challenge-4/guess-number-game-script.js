// Generate a random number between 1 and 10
let randomNumber = Math.floor(Math.random() * 10) + 1;

// Set maximum number of attempts allowed for each game session
let attempts = 0;
const maxAttempts = 3;

// Select and assign elements from DOM
const submitButton = document.querySelector('button');
const playerGuessInput = document.getElementById('playerGuess');
let resultText = document.getElementById('resultText');

// Add event listener to submit button
submitButton.addEventListener('click', () => {

    // Take player's input and convert from string to integer using parseInt
    const playerGuess = parseInt(playerGuessInput.value);

    // Check that the number is between 1 and 10, if not return prompt for valid range, otherwise continue
    if (playerGuess < 1 || playerGuess > 10) {
        resultText.textContent = "Please enter a number between 1 and 10";
        return;
    }

    // Increment the number of attempts 
    attempts++;


    // Check if the player's guess is correct
    if (playerGuess === randomNumber) {
        resultText.textContent = "Congratulations, " + randomNumber + " is right!";

        // Reset the game for new round, taking the number of attempts back to 0
        resetGame();

        // If the player has reached the maximum number of attempts (3)
    } else if (attempts >= maxAttempts) {
        resultText.textContent = "Sorry, you've used all attempts! The number was " + randomNumber;
        resetGame();


        // Use elseif statement to hint to the player if the number is higher or lower
    } else {

        // If the randomNumber is more than the playerGuess...
        if (playerGuess < randomNumber) {
            resultText.textContent = "Higher! Try again";

            // Else the randomNumber must be lower than the playerGuess
        } else {
            resultText.textContent = "Lower! Try again";
        }
    }
});

// Function to reset the game state
function resetGame() {

    // Generate a new random number
    randomNumber = Math.floor(Math.random() * 10) + 1; 

    // Reset the number of attempt back to 0
    attempts = 0; 

    // Clear the playerGuessInput 
    playerGuessInput.value = ''; 
}
