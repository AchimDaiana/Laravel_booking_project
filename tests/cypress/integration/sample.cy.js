<reference types="cypress"/> //

import Chance from 'chance'; // to generate email address/text automatically
const chance = new Chance(); //global variable

    describe('Starter',() =>{
        const email = chance.email(); // the email will be randomly each times the test is run
        const pass = 'ValidPassword23';

        befoareEach(() => {
            cy.visit('http://localhost:8000'); //function to return to home page
        })

        it('has a title', () =>{
            cy.contains('Welcome to CinemaX');
            expect(2).to.equal(2);
        })
    })
