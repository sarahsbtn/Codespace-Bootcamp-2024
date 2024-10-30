describe("Test 3 - Shopping Cart", () => {
    beforeEach(() => {
        cy.visit("http://127.0.0.1:5500/");
        cy.get('[data-cy="page-title"]').should("exist");
        cy.get('[data-cy="shopping-container"]').should("exist");
        cy.get('[data-cy="input-box"').as("inputBox");
        cy.get('[data-cy="add-to-list"').as("addItem");
        cy.get('[data-cy="clear-list"').as("clearAll");
    });

    it("does not add items if input is empty", () => {
        cy.get("@addItem").click();
        cy.get(".items").should("be.empty");
    });

    it("does not add items if input is empty when using the enter key", () => {
        cy.get("@inputBox").type("{enter}");
        cy.get(".items").should("be.empty");
    });

    it("allows adding items with the enter key", () => {
        cy.get("@inputBox").type("coffee{enter}");
        cy.get(".items").should("contain", "coffee");
        cy.get("@inputBox").type("milk{enter}");
        cy.get(".items").should("contain", "milk");
        cy.get("@inputBox").type("chocolate{enter}");
        cy.get(".items").should("contain", "chocolate");
    });



})