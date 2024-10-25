it('should load the game', () => {
    cy.visit('guess-number-game-home.html');
    cy.get('#playerGuess').should('exist');
    cy.get('button').should('exist').and('contain', 'SUBMIT');
    cy.get('#gameText').should('exist');
});
