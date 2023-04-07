describe('Registration', () => {
    it('Register a new user', () =>{
        cy.visit('/register');

        cy.get('#firstname').type('admin');
        cy.get('#lastname').type('admin');
        cy.get('#email').type('admin@yahoo.com');
        cy.get('#password').type('admin');
        cy.get('.btn-dark').click();

        cy.assertRedirect('/');

    })
});
