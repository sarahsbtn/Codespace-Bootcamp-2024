describe('MK Time - Homepage Tests', () => {
    beforeEach(() => {
        cy.visit('http://localhost/Portfolio%20Project%20-%20MK%20Time/index.php');
    });

    it('displays the carousel with images', () => {
        cy.get('#carouselExampleFade').should('be.visible');
        cy.get('.carousel-item').should('have.length', 4);
        cy.get('.carousel-item.active').should('exist');
    });

    it('contains the "OUR COLLECTIONS" button', () => {
        cy.contains('OUR COLLECTIONS').should('be.visible');
    });

    it('displays the welcome section', () => {
        cy.get('#welcome h3').contains('WELCOME TO MK TIME').should('exist');
        cy.get('#welcome p').should('have.length', 3);
    });

    it('loads bestsellers cards', () => {
        cy.get('#ourbestsellers').within(() => {
            cy.get('.card').should('have.length.greaterThan', 0);
            cy.get('.card-title').first().should('exist');
        });
    });

    it('displays all bestseller cards with images', () => {
        cy.get('#ourbestsellers').within(() => {
            cy.get('.card').each(($card) => {
                cy.wrap($card).find('img').should('exist');
            });
        });
    });

    it('navigates to the Ladies Collection page', () => {
        cy.get('#ourcollections').contains('FOR HER').click();
        cy.url().should('include', 'ladies-collection.php');
    });

    it('navigates to the Mens Collection page', () => {
        cy.get('#ourcollections').contains('FOR HIM').click();
        cy.url().should('include', 'mens-collection.php');
    });

});