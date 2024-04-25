import Core from './core';

export default class Elstar extends Core {

    constructor () {
        super()
    }
}

$(() => {
   window.Elstar = new Elstar();
});
