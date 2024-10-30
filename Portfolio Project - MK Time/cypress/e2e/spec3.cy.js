describe("Test Cart and Checkout - adding item to cart, updating quantity and checkout ", () => {
    beforeEach(() => {
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/login.php");
        cy.get('input[name="email"]').type('sarah@email.com');
        cy.get('input[name="pass"]').type('12345');
        cy.get('button[value="login"]').click();
        cy.get("h2").should("contain", "Dashboard");
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/cart.php");
    });

    it("should add an item from the Ladies Collection to the cart", () => {
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/ladies-collection.php");
        cy.get('.btn-light').first().click(); 
        cy.get('#notification').should('contain', 'has been added to your cart');
        cy.get('#cart').click();
        cy.get('table').should('exist'); 
        cy.get('th').should('contain', 'Item', 'Quantity', 'Price', 'Subtotal'); 
    });

    it("should add an item from the Mens Collection to the cart", () => {
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/mens-collection.php");
        cy.get('.btn-light').first().click(); 
        cy.get('#notification').should('contain', 'has been added to your cart');
        cy.get('#cart').click();
        cy.get('table').should('exist'); 
        cy.get('th').should('contain', 'Item', 'Quantity', 'Price', 'Subtotal'); 
    });

    it("should update the quantity of the item when the user changes the form", () => {
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/ladies-collection.php");
        cy.get('.btn-light').first().click(); 
        cy.get('#cart').click(); 
        cy.get('input[type="text"]').first().clear().type(3);
        cy.contains('button', 'UPDATE').click();
        cy.get('input[type="text"]').first().should('have.value', '3'); 
        cy.get('td').contains('Subtotal').should('not.be.empty'); 
    });

    it('should proceed to checkout', () => {
        cy.visit("http://localhost/Portfolio%20Project%20-%20MK%20Time/ladies-collection.php");
        cy.get('.btn-light').first().click(); 
        cy.get('#cart').click();
        cy.contains('CHECKOUT').click();
        cy.url().should('include', '/checkout.php');
        cy.contains('THANKS FOR YOUR ORDER!').should('exist'); 
    });

});

