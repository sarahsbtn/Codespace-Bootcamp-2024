describe('MK Time - Homepage Tests', () => {
  beforeEach(() => {
    cy.visit('http://localhost/CodeSpaceX/Portfolio-Project-MK-Time/index.php');
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
    cy.get('#welcome p').should('have.length', 3); // Check if there are 3 paragraphs
  });

  it('loads bestsellers cards', () => {
    cy.get('#ourbestsellers').within(() => {
      cy.get('.card').should('have.length.greaterThan', 0); // At least one bestseller card
      cy.get('.card-title').first().should('exist'); // Check the title of the first card
    });
  });

  it('navigates to the collections page', () => {
    cy.get('#ourcollectionslinks').contains('FOR HER').click();
    cy.url().should('include', 'ladies-collection.php');
  });

});