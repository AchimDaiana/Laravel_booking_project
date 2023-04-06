describe('Authentication', () =>{
    it('provides feedback dor invalid login credentials', () => {
        //cy.refreshDatabase();

        cy.visit('/login');

        cy.get('#email').type('daiana@example.com');
        cy.get('#password').type('password');
        cy.contains('.btn-dark','Log In').click();

        cy.contains('Your provided credentials are incorrect!');
    });
});
