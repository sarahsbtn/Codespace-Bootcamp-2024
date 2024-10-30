describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:5500');

    /* --Assert the content on the page-- */

    // Check if we have the correct Title
    cy.get("h2").should("contain", "Code Challenge 3 - Basic Calculator Application");

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

    /* Test simple subtracting operation -> 6+3 = 9 */

    cy.get("button#six").contains("6").click();
    cy.get("h3#total").should("contain", "6");
    cy.get("button#plus").contains("+").click();
    cy.get("button#three").contains("3").click();
    cy.get("h3#total").should("contain", "3");
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "9");

    /* Reset the calculator */
    cy.get("button#clear-button").contains("C").click();
    cy.get("h3#total").should("contain", "");

    /* Test simple subtracting operation -> 10+9 = 19 */

    cy.get("button#one").contains("1").click();
    cy.get("h3#total").should("contain", "1");
    cy.get("button#zero").contains("0").click();
    cy.get("h3#total").should("contain", "10");
    cy.get("button#plus").contains("+").click();
    cy.get("button#nine").contains("9").click();
    cy.get("h3#total").should("contain", "9");
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "19");

    /* Reset the calculator */
    cy.get("button#clear-button").contains("C").click();
    cy.get("h3#total").should("contain", "");

    /* Test simple subtracting operation -> -4+8 = 4 */
    cy.get("button#four").contains("4").click();
    cy.get("h3#total").should("contain", "4");
    cy.get("button#posneg").contains("+/-").click();
    cy.get("h3#total").should("contain", "-4");
    cy.get("button#plus").contains("+").click();
    cy.get("button#eight").contains("8").click();
    cy.get("h3#total").should("contain", "8");
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "4");


    /* Reset the calculator */
    cy.get("button#clear-button").contains("C").click();
    cy.get("h3#total").should("contain", "");

    /* Test simple subtracting operation -> 2+(-7) = -5 */
    cy.get("button#two").contains("2").click();
    cy.get("h3#total").should("contain", "2");
    cy.get("button#plus").contains("+").click();
    cy.get("button#seven").contains("7").click();
    cy.get("h3#total").should("contain", "7");
    cy.get("button#posneg").contains("+/-").click();
    cy.get("h3#total").should("contain", "-7");
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "-5");

    /* Reset the calculator */
    cy.get("button#clear-button").contains("C").click();
    cy.get("h3#total").should("contain", "");

    /* Test simple subtracting operation -> -3+(-7) = -10 */
    cy.get("button#three").contains("3").click();
    cy.get("h3#total").should("contain", "3");
    cy.get("button#posneg").contains("+/-").click();
    cy.get("h3#total").should("contain", "-3");
    cy.get("button#plus").contains("+").click();
    cy.get("button#seven").contains("7").click();
    cy.get("h3#total").should("contain", "7");
    cy.get("button#posneg").contains("+/-").click();
    cy.get("h3#total").should("contain", "-7");
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "-10");

    /* Reset the calculator */
    cy.get("button#clear-button").contains("C").click();
    cy.get("h3#total").should("contain", "");

    /* Test complicated subtracting operation -> 20+4+1=25+2+4+7=38+2=40 */
    cy.get("button#two").contains("2").click();
    cy.get("h3#total").should("contain", "2");
    cy.get("button#zero").contains("0").click();
    cy.get("h3#total").should("contain", "20");
    cy.get("button#plus").contains("+").click();
    cy.get("button#four").contains("4").click();
    cy.get("button#plus").contains("+").click();
    cy.get("h3#total").should("contain", "24");
    cy.get("button#one").contains("1").click();
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "25");
    cy.get("button#plus").contains("+").click();
    cy.get("button#two").contains("2").click();
    cy.get("button#plus").contains("+").click();
    cy.get("h3#total").should("contain", "27");
    cy.get("button#four").contains("4").click();
    cy.get("button#plus").contains("+").click();
    cy.get("h3#total").should("contain", "31");
    cy.get("button#seven").contains("7").click();
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "38");
    cy.get("button#plus").contains("+").click();
    cy.get("button#two").contains("2").click();
    cy.get("button#equal-button").contains("=").click();
    cy.get("h3#total").should("contain", "40");
  })
})