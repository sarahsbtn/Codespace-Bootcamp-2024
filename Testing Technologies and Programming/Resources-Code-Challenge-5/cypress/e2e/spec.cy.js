describe("Test 1 - Shopping Cart", () => {
  beforeEach(() => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get('[data-cy="page-title"]').should("exist");
    cy.get('[data-cy="shopping-container"]').should("exist");
    cy.get('[data-cy="input-box"').as("inputBox");
    cy.get('[data-cy="add-to-list"').as("addItem");
    cy.get('[data-cy="clear-list"').as("clearAll");
  });

  it("inputs items", () => {
    cy.get("@inputBox").type("apples");
    cy.get("@addItem").click();
    cy.get("@inputBox").type("oranges");
    cy.get("@addItem").click();
    cy.get("@inputBox").type("chocolate");
    cy.get("@addItem").click();
    cy.get(".items")
      .should("contain", "apples")
      .and("contain", "oranges")
      .and("contain", "chocolate");
  });

  it("Delete an item from the list", () => {
    cy.get("@inputBox").type("apples");
    cy.get("@addItem").click();
    cy.get(".delete").click();
    cy.get(".items").should("not.include.text", "apples");
  });

  it("Clear all button removes all inputted items", () => {
    cy.get("@inputBox").type("apples");
    cy.get("@addItem").click();
    cy.get("@inputBox").type("oranges");
    cy.get("@addItem").click();
    cy.get("@inputBox").type("chocolate");
    cy.get("@addItem").click();
    cy.get(".items")
      .should("contain", "apples")
      .and("contain", "oranges")
      .and("contain", "chocolate");
    cy.get("@clearAll").click();
    cy.get(".items")
      .should("not.include.text", "apples")
      .and("not.include.text", "oranges")
      .and("not.include.text", "chocolate");
  });
});
