describe("testing the division operation on the page", () => {
    it("passes", () => {
      cy.visit("http://127.0.0.1:5500");
  
      /* --Assert the content on the page-- */
  
      // Check if we have the correct Title
      cy.get("h2").should(
        "contain",
        "Code Challenge 3 - Basic Calculator Application"
      );
  
      // Check if we have all button for the calculator
      cy.get("button#clear-button").should("contain", "C");
      cy.get("button#posneg").should("contain", "+/-");
      cy.get("button#percentage").should("contain", "%");
      cy.get("button#divide").should("contain", "/");
      cy.get("button#seven").should("contain", "7");
      cy.get("button#eight").should("contain", "8");
      cy.get("button#nine").should("contain", "9");
      cy.get("button#multiply").should("contain", "x");
      cy.get("button#four").should("contain", "4");
      cy.get("button#five").should("contain", "5");
      cy.get("button#six").should("contain", "6");
      cy.get("button#minus").should("contain", "-");
      cy.get("button#one").should("contain", "1");
      cy.get("button#two").should("contain", "2");
      cy.get("button#three").should("contain", "3");
      cy.get("button#plus").should("contain", "+");
      cy.get("button#zero").should("contain", "0");
      cy.get("button#point").should("contain", ".");
      cy.get("button#equal-button").should("contain", "=");
  
      /* Test simple percentage operation  17 x 5 = 60 */
  
      cy.get("button#one").contains("1").click();
      cy.get("button#seven").contains("7").click();
      cy.get("button#multiply").contains("x").click();
      cy.get("button#five").contains("5").click();
      cy.get("button#equal-button").contains("=").click();
      cy.get("h3#total").should("contain", "85");
  
      //     /* Reset the calculator */
      cy.get("button#clear-button").contains("C").click();
      cy.get("h3#total").should("contain", "");

      /* Test simple percentage operation  6 x 11 = 60 x34 = 2244 */
  
      cy.get("button#six").contains("6").click();
      cy.get("button#multiply").contains("x").click();
      cy.get("button#one").contains("1").click();
      cy.get("button#one").contains("1").click();
      cy.get("button#equal-button").contains("=").click();
      cy.get("h3#total").should("contain", "66");
      cy.get("button#multiply").contains("x").click();
      cy.get("button#three").contains("3").click();
      cy.get("button#four").contains("4").click();
      cy.get("h3#total").should("contain", "34");
      cy.get("button#equal-button").contains("=").click();
      cy.get("h3#total").should("contain", "2244");
       
      //     /* Reset the calculator */
      cy.get("button#clear-button").contains("C").click();
      cy.get("h3#total").should("contain", "");

    });
  });