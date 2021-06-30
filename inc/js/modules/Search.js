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
    $.getJSON(`${bdacData.root_url}/wp-json/bdac/v1/search?term=${this.searchField.val()}`, results => {
      this.searchResults.html(`
                <div class="col-sm-4">
                    <h5 class="intro-section-title text-center">General Information</h5>
                    ${
                      results.generalInfo.length
                        ? `
                              <ul class="">
                                  ${results.generalInfo.map(result => `<li><a href="${result.link}">${result.title}</a> ${result.type === "post" ? `by ${result.author}` : ""}</li>`).join("")}
                              </ul>
                          `
                        : "<p>No posts for that search term</p>"
                    }
                </div>
                <div class="col-sm-4">
                    <h5 class="intro-section-title text-center">Exhibits</h5>
                    ${
                      results.exhibits.length
                        ? `
                                <ul class="">
                                    ${results.exhibits.map(result => `<li><a href="${result.link}">${result.title}</a>`).join("")}
                                </ul>
                            `
                        : `
                            <p>No exhibits for that search term</br>
                                <a class="search-overlay-results-link" href="${bdacData.root_url}/events">View all exhibits <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                            </p>
                        `
                    }
                    <h5 class="intro-section-title text-center">Events</h5>
                    ${
                      results.events.length
                        ? `
                            ${results.events
                              .map(
                                result => `
                                    <div class="bdac-card mb-3"  style="background: url(${result.thumbnail}); background-size: cover; background-position-x: center;">
                                        <div class="bdac-card-content">
                                            <h4 class="bdac-card-content-title mb-3">
                                                <a href="${result.link}" title="Posts by BDAC Admin" rel="author">${result.title}</a>
                                            </h4>
                                            <small class="bdac-card-content-meta">By ${result.presenter} <a href="${result.link}"></a> on ${result.date}</small>
                                            <p class="bdac-card-content-body mt-3">${result.content}</p>
                                            <a href="${result.link}" class="bdac-card-content-link mt-auto">
                                                View Event <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                            `
                              )
                              .join("")}
                              <a class="search-overlay-results-link" href="${bdacData.root_url}/events">View all events <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                        `
                        : `
                            <p>No events for that search term </br>
                                <a class="search-overlay-results-link" href="${bdacData.root_url}/events">View all events <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                            </p>
                        `
                    }
                </div>
                <div class="col-sm-4">
                    <h5 class="intro-section-title text-center">Opening Hours</h5>
                </div>
        `)
      this.isSpinnerVisible = false
    })
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
                <div class="row search-overlay-results">
                </div>
            </div>
        </div>
      `)
  }
}

export default Search
