describe('Authentication', () =>{
    it('provides feedback for invalid login credentials', () => {
        //cy.refreshDatabase(); // this will delete all data

        cy.visit('/login');

        cy.get('input[name=email]').type('daiana@example.com');
        cy.get('input[name=password]').type('daiana');
        //cy.get('button[type=submit,value=Log In]').click();
        cy.contains('.btn-dark','Log In').click();

        cy.contains('Your provided credentials are incorrect!');
    });
});
