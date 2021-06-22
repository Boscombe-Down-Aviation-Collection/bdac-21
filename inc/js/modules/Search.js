import $ from "jquery"

class Search {
  // 1 Describe and initiate our object
  constructor() {
    this.openButton = $(".navbar-search")
    this.closeButton = $(".search-overlay-close")
    this.searchOverlay = $(".search-overlay")
    this.searchField = $("#search-term")
    this.searchResults = $(".search-overlay-results")

    this.events()
    this.isOverlayOpen = false
    this.typingTimer
    this.isSpinnerVisible = false
    this.previousSearch
  }

  // 2 Events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this))
    this.closeButton.on("click", this.closeOverlay.bind(this))
    $(document).on("keyup", this.keyPressDispatcher.bind(this))
    this.searchField.on("keyup", this.typingLogic.bind(this))
  }

  // 3 functions
  openOverlay(e) {
    e.preventDefault()
    this.searchOverlay.addClass("search-overlay-active")
    $("body").addClass("body-no-scroll")
    this.isOverlayOpen = true
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay-active")
    $("body").removeClass("body-no-scroll")
    this.isOverlayOpen = false
  }

  keyPressDispatcher(e) {
    if (e.keyCode === 83 && !this.isOverlayOpen && !$("input, textarea").is(":focus")) {
      this.openOverlay()
    }
    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay()
    }
  }

  typingLogic() {
    if (this.searchField.val() != this.previousSearch) {
      clearTimeout(this.typingTimer)
      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.searchResults.html('<div class="spinner-loader"></div>')
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000)
      } else {
        this.searchResults.html("")
        this.isSpinnerVisible = false
      }
    }
    this.previousSearch = this.searchField.val()
  }

  getResults() {
    this.searchResults.html("Imagine real search results here")
    this.isSpinnerVisible = false
  }
}

export default Search
