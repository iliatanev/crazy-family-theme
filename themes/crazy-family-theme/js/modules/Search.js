import $ from 'jquery';

class Search {
    // 1. Describe and create/initiate our object
    constructor() {
        this.resultsDiv = $('search-overlay__results');
        this.openBtn = $(".js-search-trigger");
        this.closeBtn = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.typingTimer;
    }

    // 2. Events
    events() {
        this.openBtn.on( 'click', this.openOverlay.bind(this) );
        this.closeBtn.on( 'click', this.closeOverlay.bind(this) );
        $(document).on('keyup', this.keyUp.bind('tihs'));
        this.searchField.on("keydown", this.typingLogic.bind(this));
    }

    // 3. Methods ( functions, actions )
    
    typingLogic() {
        clearTimeout(this.typingTimer);
        
        if (!this.isSpinnerVisible) {
            this.resultsDiv.html('<div class="spinner-loader"></div>');
            this.isSpinnerVisible = true;
        }

        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
      }

      getResults() {
        this.resultsDiv.html()
        this.isSpinnerVisible = false;
      }

    keyUp(e) {
        
        if ( e.keyCode === 83 && !this.isOverlayOpen ) {
            this.openOverlay();
        }
        
        if ( e.keyCode === 27 && this.isOverlayOpen ) {
            this.closeOverlay();
        }
    }

    openOverlay( e ) {
        this.searchOverlay.addClass( 'search-overlay--active' );
        $( 'body' ).addClass( 'body-no-scroll' );
        isOverlayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.removeClass( 'search-overlay--active' );
        $( 'body' ).removeClass( 'body-no-scroll' );
        isOverlayOpen = false;
    }
}

export default Search;