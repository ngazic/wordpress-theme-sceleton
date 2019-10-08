var domIsReady = (function (domIsReady) {
	var isBrowserIeOrNot = function () {
		return (! document.attachEvent || typeof document.attachEvent === "undefined" ? 'not-ie' : 'ie' );
	}

	domIsReady = function (callback) {
		if ( callback && typeof callback === 'function' ) {
			if ( isBrowserIeOrNot() !== 'ie' ) {
				document.addEventListener("DOMContentLoaded", function () {
					return callback();
				});
			} else {
				document.attachEvent("onreadystatechange", function () {
					if ( document.readyState === "complete" ) {
						return callback();
					}
				});
			}
		} else {
			console.error( 'The callback is not a function!' );
		}
	}

	return domIsReady;
})(domIsReady || {});

(function ( document, window, domIsReady, undefined ) {
	domIsReady(function () {
		if ( document.querySelector( "select" ) !== null ) {
			styleSelect('select');
		}

		if ( document.querySelector( ".glide" ) !== null ) {
			var glide = new Glide( '.glide' ).mount();
		}

		var guardsman = {
			init: function () {
				this.dom();
				this.events();
			},

			dom: function () {
				guardsman.mainContentForPosts = document.querySelector( '#main-content-post-categories' );
				guardsman.mainContentForFeaturedPost = document.querySelector( '#main-content-post-categories-featured' );
				guardsman.categoriesLinks = document.querySelectorAll( '.tag-with-border li' );
				guardsman.selectSortPosts = document.querySelector( '#select-sort-posts' );
				guardsman.loadMorePosts = document.querySelector( '#load-more-posts' );
				guardsman.getUrl = window.location;
				guardsman.baseUrl = guardsman.getUrl.protocol + "//" + guardsman.getUrl.host + "/" + guardsman.getUrl.pathname.split( '/' )[ 0 ];
				guardsman.ourRequest = new XMLHttpRequest();
				guardsman.selectedValueSort = "desc";
				guardsman.currentPage = 1;
				guardsman.getPostsUrl;
				guardsman.categoryId = "";
				guardsman.sortPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?per_page=8&order=' + guardsman.selectedValueSort + '&_embed';
			},
			events: function () {
				for ( var i = 0; i < guardsman.categoriesLinks.length; i++ ) {
					guardsman.categoriesLinks[ i ].addEventListener('click', function (e) {
						guardsman.changeActiveClassTags( this );
						e.preventDefault();
						var anchorTag = this.children;
						guardsman.categoryId = anchorTag[ 0 ].href.split( '?' )[ 1 ] !== '' ? anchorTag[ 0 ].href.split( '?' )[ 1 ] : undefined;
						if ( guardsman.categoryId !== undefined ) {
							guardsman.getPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?categories=' + guardsman.categoryId + '&per_page=8&order=' + guardsman.selectedValueSort + '&_embed';
						} else {
							guardsman.getPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?per_page=8&categories_exclude=1' + '&_embed';
						}
						guardsman.getDataWithAjax( guardsman.getPostsUrl );
					});
				}

				if( guardsman.selectSortPosts !== null ) {
					guardsman.selectSortPosts.addEventListener( 'change', function () {
						guardsman.selectedValueSort = this.value;
						guardsman.sortPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?per_page=8&categories_exclude=1&order=' + guardsman.selectedValueSort + '&categories=' + guardsman.categoryId + '&_embed';
						guardsman.getDataWithAjax( guardsman.sortPostsUrl );
					});
				}

				if ( guardsman.loadMorePosts !== null ) {
					guardsman.loadMorePosts.addEventListener('click', function (e) {
						e.preventDefault();
						guardsman.mainContentForPosts.classList.remove( 'have-post' );
						var offset = (document.querySelectorAll( '.posts-list .col-md-4' ).length) + 1;
						if ( guardsman.categoryId == undefined ) {
							guardsman.sortPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?per_page=4&categories_exclude=1&offset=' + offset + '&order=' + guardsman.selectedValueSort + '&_embed';
						} else {
							guardsman.sortPostsUrl = guardsman.baseUrl + '/wp-json/wp/v2/posts/?per_page=4&categories=' + guardsman.categoryId + '&offset=' + offset + '&order=' + guardsman.selectedValueSort + '&_embed';
						}
						guardsman.ourRequest.open( 'GET', guardsman.sortPostsUrl );
						guardsman.ourRequest.onload = function () {
							if (guardsman.ourRequest.status >= 200 && guardsman.ourRequest.status < 400) {
								var data = JSON.parse( guardsman.ourRequest.responseText );
								var responseLength;
								if ( data.length < 4 ) {
									responseLength = data.length;
									guardsman.loadMorePosts.classList.add( "hide" );
								}
								else {
									responseLength = data.length - 1;
									guardsman.loadMorePosts.classList.remove( "hide" );
								}
								for (var i = 0; i < responseLength; i++) {
									guardsman.mainContentForPosts.innerHTML += guardsman.generatePost( data[ i ] );
								}
							} else {
								console.log( "We connected to the server, but it returned an error." );
							}
						};

						guardsman.ourRequest.onerror = function () {
							console.log( "Connection error" );
						};
						guardsman.ourRequest.send();
					})
				}
			},

			loadData: function ( data ) {
				guardsman.clearHtml( "main-content-post-categories-featured" );
				guardsman.clearHtml( "main-content-post-categories" );
				var postsLength;
				if ( data.length > 0 ) {
					guardsman.mainContentForFeaturedPost.classList.add( 'have-post' );
					guardsman.mainContentForPosts.classList.add( 'have-post' );
					guardsman.mainContentForFeaturedPost.insertAdjacentHTML( 'beforeend', guardsman.generateFeaturedPost(data[ 0 ]) );
				}

				if ( data.length == 8 ) {
					postsLength = data.length - 1;
					if ( guardsman.loadMorePosts !== null ) {
						guardsman.loadMorePosts.classList.remove( "hide" );
					}
					else {
						guardsman.loadMorePosts.classList.add( "hide" );
					}
				} else {
					postsLength = data.length;
					if ( guardsman.loadMorePosts !== null ) {
						guardsman.loadMorePosts.classList.add( "hide" );
					}
				}

				for ( var i = 1; i < postsLength; i++ ) {
					guardsman.mainContentForPosts.insertAdjacentHTML( 'beforeend', guardsman.generatePost(data[ i ]) );
				}
			},
			generatePost: function ( data ) {
				var category = data._embedded[ 'wp:term' ][ 0 ][ 0 ].name;
				var author = data._embedded.author[ 0 ].name;
				var outPutHTML = '';
				outPutHTML += '<div class="col-md-4 col-xs-12">';
				outPutHTML += '<article id="' + data.id + '" class="article-post">';
				var date = new Date( data.date );
				var dateString = ( '0' + date.getDate() ).slice( -2 ) + '.' + ( '0' + (date.getMonth() + 1) ).slice( -2 ) + '.' + date.getFullYear();
				if ( data.fimg_url !== "" ) {
					outPutHTML += '<div class="img-wrapper aspect-3-2">';
					outPutHTML += '<div class="post-image">';
					outPutHTML += '<img title="image title" alt="thumb image" class="" src="' + data.fimg_url + '" style="width:100%; height:100%;" />';
					outPutHTML += '</div>';
					outPutHTML += '</div>';
				}
				outPutHTML += '<ul class="tag-list">';
				outPutHTML += '<li class="tag-list-item ">' + dateString + '</li>';
				outPutHTML += '<li class="tag-list-item ">' + author + '</li>';
				outPutHTML += '<li class="tag-list-item ">' + category + '</li>';
				outPutHTML += '</ul>';
				outPutHTML += '<h4 class="h4">' + data.title.rendered + '</h4>';
				outPutHTML += '<div class="text">' + data.content.rendered + '</div>';
				outPutHTML += '<a href="?p=' + data.id + '>" class="link" >READ MORE</a>';
				outPutHTML += '</article>';
				outPutHTML += '</div>';

				return outPutHTML;
			},
			generateFeaturedPost: function ( data ) {
				var category = data._embedded[ 'wp:term' ][ 0 ][ 0 ].name;
				var author = data._embedded.author[ 0 ].name;
				var outPutHTML = '';
				outPutHTML += '<div class="row">';
				var date = new Date( data.date );
				var dateString = ( '0' + date.getDate() ).slice( -2 ) + '.' + ( '0' + (date.getMonth() + 1)) .slice( -2 ) + '.' + date.getFullYear();
				if ( data.fimg_url !== "" ) {
					outPutHTML += '<div class="col-md-8 col-xs-12">';
					outPutHTML += '<div class="img-wrapper aspect-3-2">';
					outPutHTML += '<div class="post-image">';
					outPutHTML += '<img title="image title" alt="thumb image" class="" src="' + data.fimg_url + '" style="width:100%; height:100%;" />';
					outPutHTML += '</div>';
					outPutHTML += '</div>';
					outPutHTML += '</div>';
				}

				outPutHTML += '<div class="col-md-4 col-xs-12">';
				outPutHTML += '<div class="teaser-text">';
				outPutHTML += '<ul class="tag-list">';
				outPutHTML += '<li class="tag-list-item ">' + dateString + '</li>';
				outPutHTML += '<li class="tag-list-item ">' + author + '</li>';
				outPutHTML += '<li class="tag-list-item ">' + category + '</li>';
				outPutHTML += '</ul>';
				outPutHTML += '<h4 class="h4">' + data.title.rendered + '</h4>';
				outPutHTML += '<div class="text">' + data.content.rendered + '</div>';
				outPutHTML += '<a href="?p=' + data.id + '>" class="link" >READ MORE</a>';

				outPutHTML += '</div>';
				outPutHTML += '</div>';
				outPutHTML += '</div>';

				return outPutHTML;
			},
			clearHtml: function ( id ) {
				var myNode = document.getElementById( id );
				while ( myNode.firstChild ) {
					myNode.removeChild( myNode.firstChild );
				}
			},
			getDataWithAjax: function ( url ) {
				guardsman.ourRequest.open( 'GET', url) ;
				guardsman.ourRequest.onload = function () {
					if ( guardsman.ourRequest.status >= 200 && guardsman.ourRequest.status < 400 ) {
						var data = JSON.parse( guardsman.ourRequest.responseText );
						guardsman.loadData( data );
					} else {
						console.log( "We connected to the server, but it returned an error." );
					}
				};

				guardsman.ourRequest.onerror = function () {
					console.log( "Connection error" );
				};
				guardsman.ourRequest.send();
			},
			changeActiveClassTags: function ( itemClicked ) {
				var foundedElement = document.querySelector( '.tag-list-item.active' );
				if ( foundedElement !== null ) {
					foundedElement.classList.remove( "active" );
				}
				itemClicked.classList.add( "active" );
			}
		}

		guardsman.init();
	});
})( document, window, domIsReady );
