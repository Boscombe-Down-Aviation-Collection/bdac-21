import $ from "jquery"

class Search {
  // 1 Describe and initiate our object
  constructor() {
    this.searchBox()
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
    this.searchField.on("keyup", this.checkTyping.bind(this))
  }

  // 3 functions
  openOverlay(e) {
    e.preventDefault()
    this.searchOverlay.addClass("search-overlay-active")
    $("body").addClass("body-no-scroll")
    this.searchField.val("")
    setTimeout(() => this.searchField.focus(), 500)
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

  checkTyping() {
    if (this.searchField.val() != this.previousSearch) {
      clearTimeout(this.typingTimer)
      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.searchResults.html('<div class="spinner-loader"></div>')
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 1000)
      } else {
        this.searchResults.html("")
        this.isSpinnerVisible = false
      }
    }
    this.previousSearch = this.searchField.val()
  }

  getResults() {
    $.when($.getJSON(`${bdacData.root_url}/wp-json/wp/v2/posts?search=${this.searchField.val()}`), $.getJSON(`${bdacData.root_url}/wp-json/wp/v2/pages?search=${this.searchField.val()}`)).then(
      (posts, pages) => {
        let combinedResults = posts[0].concat(pages[0])
        this.searchResults.html(`
                <h3 class="section-title">General Information</h3>
                ${combinedResults.length ? '<ul class="">' : "<p>No matches for that search term</p>"}
                ${combinedResults.map(result => `<li><a href="${result.link}">${result.title.rendered}</a></li>`).join("")}
                ${combinedResults.length ? "</ul>" : ""}
            `)
        this.isSpinnerVisible = false
      },
      () => {
        this.searchResults.html("<p>Unexpected error, please try again</p>")
      }
    )
  }

  searchBox() {
    $("body").append(`
        <div class="search-overlay">
            <div class="search-overlay-top">
                <div class="container d-flex">
                    <i class="fa fa-search search-overlay-icon" aria-hidden="true"></i>
                    <input id="search-term" class="search-overlay-top-term" type="text" placeholder="What are you looking for" autocomplete="off">
                    <i class="fa fa-times search-overlay-close bdac-shadow"></i>
                </div>
            </div>
            <div class="container">
                <div class="search-overlay-results">
                </div>
            </div>
        </div>
      `)
  }
}

export default Search
