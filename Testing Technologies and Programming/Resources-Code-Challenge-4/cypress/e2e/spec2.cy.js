it('should display error for out of range input', () => {
    cy.visit('guess-number-game-home.html');
    cy.get('#playerGuess').type(15);
    cy.get('button').click();
    cy.get('#gameText').should('contain', "Please enter a number between 1 and 10");
});

