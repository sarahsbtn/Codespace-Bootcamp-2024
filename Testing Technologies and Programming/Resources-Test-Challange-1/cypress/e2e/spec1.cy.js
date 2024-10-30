describe('Rock Paper Scissors Game', () => {
    beforeEach(() => {
        cy.visit('index.html');
    });

    it('should display game title', () => {
        cy.contains("Let's play Rock, Paper, Scissors!").should('be.visible');
    });

    it('should display the rules', () => {
        cy.contains('Rules').should('be.visible');
    });

    it('should display player and computer options', () => {
        cy.get('.choiceBtn').should('have.length', 3);
        cy.contains('ROCK').should('be.visible');
        cy.contains('PAPER').should('be.visible');
        cy.contains('SCISSORS').should('be.visible');
    });

    it('should have empty result text on page load', () => {
        cy.get('#resultText').should('have.text', '');
    });

    it('should update player text when ROCK is clicked', () => {
        cy.contains('ROCK').click();
        cy.get('#playerText').should('contain.text', 'Player: ROCK');
    });

    it('should update player text when PAPER is clicked', () => {
        cy.contains('PAPER').click();
        cy.get('#playerText').should('contain.text', 'Player: PAPER');
    });

    it('should update player text when SCISSORS is clicked', () => {
        cy.contains('SCISSORS').click();
        cy.get('#playerText').should('contain.text', 'Player: SCISSORS');
    });

    it('should display player choice when button is clicked', () => {
        cy.contains('ROCK').click();
        cy.get('#playerText').should('contain.text', 'Player: ROCK');
    });

    it('should display computer choice when button is clicked', () => {
        cy.contains('ROCK').click();
        cy.get('#computerText').should('not.be.empty');
    });

    it('should display the result after a player chooses ROCK', () => {
        cy.contains('ROCK').click();
        cy.get('#resultText').should('not.be.empty');
    });

    it('should display the result after a player chooses PAPER', () => {
        cy.contains('PAPER').click();
        cy.get('#resultText').should('not.be.empty');
    });

    it('should display the result after a player chooses SCISSORS', () => {
        cy.contains('SCISSORS').click();
        cy.get('#resultText').should('not.be.empty');
    });



});
