describe('Login Test', () => {
    it('should log in with correct credentials and change account dropdown in nav accordingly once logged in', () => {
        cy.visit('http://localhost/CodeSpaceX/Portfolio-Project-MK-Time/login.php');

        // Check that account dropdown displays "Register" and "Login" before login
        cy.get('#account').click();

        cy.get('.dropdown-menu')
            .should('be.visible')
            .and('contain', 'REGISTER')
            .and('contain', 'LOGIN');

        cy.get('input[name="email"]').type('sarah@email.com');
        cy.get('input[name="pass"]').type('12345');
        cy.get('button[value="login"]').click();

        // Verify successful login by checking for the presence of "Dashboard"
        cy.contains('Sarah\'s Dashboard').should('be.visible');

        // Check that account dropdown now displays "My Account" and "Log Out"
        cy.get('#account').click();

        cy.get('.dropdown-menu')
            .should('be.visible')
            .and('contain', 'MY ACCOUNT')
            .and('contain', 'LOGOUT');

        // Ensure "LOGIN" and "REGISTER" are no longer present in the dropdown
        cy.get('.dropdown-menu')
            .should('not.contain', 'LOGIN')
            .and('not.contain', 'REGISTER');
    });
});
