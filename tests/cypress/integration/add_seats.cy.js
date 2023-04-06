describe('Add Seats', () => {
    it('Add seats to room', () => {
        cy.visit('/seats/create');

        cy.get(':nth-child(1) > .form-group > .form-control').type('B4');

        cy.get(':nth-child(3) > .form-group > .form-control').select('1');

        cy.get('.btn-success').click();

        cy.visit('/rooms/1/seats');
    })
})
