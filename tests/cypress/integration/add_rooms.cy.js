describe('Add new rooms', () => {
    it('Add room', () => {
        cy.visit('/rooms/create');

        cy.get(':nth-child(1) > .form-group > .form-control').type('Room3');
        cy.get(':nth-child(2) > .form-group > .form-control').type('The Menu');
        cy.get(':nth-child(3) > .form-group > .form-control').type('Great movie.');
        //const filepath = '/resources/images/themenu.jpg';
        //cy.get('#formFile').attachtFile(filepath, {subjectType: 'input'});
        cy.get('input[type=file]').select('themenu.jpg');

    });
});
