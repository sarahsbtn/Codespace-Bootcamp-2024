describe('Test Login - Nav Dropdown changes', () => {
    it('should log in with correct credentials and change account dropdown in nav accordingly once logged in', () => {
        cy.visit('http://localhost/Portfolio%20Project%20-%20MK%20Time/login.php');

        cy.get('#account').click();
        cy.get('.dropdown-menu')
            .should('be.visible')
            .and('contain', 'REGISTER')
            .and('contain', 'LOGIN');
        cy.get('input[name="email"]').type('sarah@email.com');
        cy.get('input[name="pass"]').type('12345');
        cy.get('button[value="login"]').click();
        cy.contains('Sarah\'s Dashboard').should('be.visible');
        cy.get('#account').click();
        cy.get('.dropdown-menu')
            .should('be.visible')
            .and('contain', 'MY ACCOUNT')
            .and('contain', 'LOGOUT');
        cy.get('.dropdown-menu')
            .should('not.contain', 'LOGIN')
            .and('not.contain', 'REGISTER');
    });
});
