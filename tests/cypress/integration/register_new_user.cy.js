describe('Registration', () => {
    it('Register a new user', () =>{
        cy.visit('/register');

        cy.get('#firstname').type('mihai');
        cy.get('#lastname').type('mihai');
        cy.get('#email').type('mihai@yahoo.com');
        cy.get('#password').type('mihai');
        cy.get('.btn-dark').click();

        cy.assertRedirect('/');

    })
});
