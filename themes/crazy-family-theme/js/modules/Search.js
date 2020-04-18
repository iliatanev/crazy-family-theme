import $ from 'jquery';

class Search {
    // 1. Describe and create/initiate our object
    constructor() {
        this.openBtn = $( ".js-search-trigger" ),
        this.closeBtn = $( ".search-overlay__close" ),
        this.searchOverlay = $( ".search-overlay" ),
        this.events()
    }

    // 2. Events
    events() {
        this.openBtn.on( 'click', this.openOverlay.bind( this ) );
        this.closeBtn.on( 'click', this.closeOverlay.bind( this ) );
    }

    // 3. Methods ( functions, actions )
    openOverlay() {
        this.searchOverlay.addClass( 'search-overlay--active' );
    }

    closeOverlay() {
        this.searchOverlay.removeClass( 'search-overlay--active' );
    }
}

export default Search;