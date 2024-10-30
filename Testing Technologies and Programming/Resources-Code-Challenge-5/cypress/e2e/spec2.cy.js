describe("Test 2 - Shopping Cart", () => {
    beforeEach(() => {
        cy.visit("http://127.0.0.1:5500/");
        cy.get('[data-cy="page-title"]').should("exist");
        cy.get('[data-cy="shopping-container"]').should("exist");
        cy.get('[data-cy="input-box"').as("inputBox");
        cy.get('[data-cy="add-to-list"').as("addItem");
        cy.get('[data-cy="clear-list"').as("clearAll");
    });
  
    it("inputs items", () => {
        cy.get("@inputBox").type("carrots");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("cheese");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("tomatoes");
        cy.get("@addItem").click();
        cy.get(".items")
        .should("contain", "carrots")
        .and("contain", "cheese")
        .and("contain", "tomatoes");
    });
  
    it("Cross out and not cross out an item from the list", () => {
        cy.get("@inputBox").type("grapes");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("pears");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("lemons");
        cy.get("@addItem").click();
        cy.get(".items")
            .should("contain", "grapes")
            .and("contain", "pears")
            .and("contain", "lemons");
        cy.get("#c_pears").click();
        cy.get("#h4_pears").should("include.text", "pears")
            .and('have.css','text-decoration')
            .should('include','line-through');
        cy.get("#c_pears").click();
        cy.get("#h4_pears").should("include.text", "pears")
            .and('have.css','text-decoration')
            .should('include','none');
    });
  
    it("Edit an item from the list", () => {
        cy.get("@inputBox").type("carrots");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("cheese");
        cy.get("@addItem").click();
        cy.get("@inputBox").type("tomatoes");
        cy.get("@addItem").click();
        cy.get(".items")
        .should("contain", "carrots")
        .and("contain", "cheese")
        .and("contain", "tomatoes");

        // Check the prompt and edit the item
        let stub;
        cy.window().then(win =>{
            stub = cy.stub(win, 'prompt').returns('coffee')
        });
        cy.get("#e_cheese").click();
        cy.wrap(stub).should(() => {
            expect(stub).to.have.been.calledWith('Edit your item:') // The message display
        });

        cy.get(".items")
        .should("contain", "carrots")
        .and("contain", "coffee")
        .and("contain", "tomatoes");
    });
  });
  