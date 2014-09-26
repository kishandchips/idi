;(function($) {

	window.main = {
		init: function(){

			if($.fn.scroller){
				$('.scroller').each(function(){
					var scroller = $(this);
					var options = {};

					if(scroller.hasClass('gallery-scroller') || scroller.data('scroll-all') === true) options.scrollAll = true;
					if(scroller.data('auto-scroll') === true ) options.autoScroll = true;
					if(scroller.data('resize') === true ) options.resize = true;
					if(scroller.data('callback')) {
						scroller.bind('onChange', function(e, nextItem){
							var func = window[scroller.data('callback')];
							func($(this), nextItem);
						});					
					}
					
					scroller.scroller(options);
				});				
			}	

			$('a.gallery').colorbox({
				rel:'gal',
				scalePhotos: true,
				maxWidth: "90%",
				maxHeight: "90%"		
			});

			$('.accordion-item').on('click', function() {
				var id = $(this).data('id');
				$('.content', this).slideToggle(300);
				$(this).toggleClass('open');
			});
		

			$('#content h1:first, #content .row:first').addClass('first');	

			$('a[href^=#].scroll-to-btn').click(function(){
				var target = $($(this).attr('href'));
				var offsetTop = (target.length != 0) ? target.offset().top : 0;
				$('html,body').animate({scrollTop: offsetTop},'slow');
				return false;
			});

			$('#mobile-navigation-btn').on('touchstart click', function() {
				var navigation = $('#mobilenav');
				if(navigation.is(':visible')){
					navigation.slideUp();
				} else {
					navigation.slideDown();
				}
			});	

			$('#footer .mobile-navigation-btn').on('click', function() {
				var navigation = $('#footer #menu-primary-footer');
				navigation.slideToggle(200);
			});

			$(".gform_widget select").selecter();

			if($.fn.colorbox){
				if( $('#lightbox').length > 0 && $(window).width() > 1000 ){
					var delay = $('#lightbox').data('delay');
					setTimeout(function() {
						$.colorbox({
							inline:true,
							href:"#lightbox-inner"
						});
					}, delay);	
				}				

				$('.popupbox #call-now .button, .call-icon').on('click', function(event) {
					event.preventDefault();
					$('#call-box #cloudIqClickButton').click();
				});
			}


	        $('#content table').wrap( "<div class='scroll-table'></div>" );
		},		

		loaded: function(){
			this.setBoxSizing();				
		},

		setBoxSizing: function(){
			if( $('html').hasClass('no-boxsizing') ){
		        $('.span:visible').each(function(){
		        	console.log($(this).attr('class'));
		        	var span = $(this);
		            var fullW = span.outerWidth(),
		                actualW = span.width(),
		                wDiff = fullW - actualW,
		                newW = actualW - wDiff;			
		            span.css('width',newW);
		        });
		    }
		},

		equalHeight: function(){
			if($('.equal-height').length !== 0){
		
				var currTallest = 0,
				currRowStart = 0,
				rowDivs = new Array(),
				topPos = 0;

				$('.equal-height').each(function() {

					var element = $(this);
					topPos = element.offset().top;
					element.height('auto');
					if (currRowStart != topPos) {

						for (i = 0 ; i < rowDivs.length ; i++) {
							rowDivs[i].height(currTallest);
						}

						rowDivs.length = 0;
						currRowStart = topPos;
						currTallest = element.height();
						rowDivs.push(element);
					} else {
						rowDivs.push(element);
						currTallest = (currTallest < element.height()) ? (element.height()) : (currTallest);
					}

					for (i = 0 ; i < rowDivs.length ; i++) {
						rowDivs[i].height(currTallest);
					}
				});
			}
		},		
		
		resize: function(){
			main.equalHeight();	
		},

		mobNav: {
			init: function(){
				windowWidth = $(window).width();
				mobMenu 	= $('#header .menu');
				button 		= $('#header .mob-menu a')
				main.mobNav.click();
			},

			click: function(){
				button.on('click',function(event){
					event.preventDefault();
					mobMenu.slideToggle();
				})
			},

			resize: function(){
				if (windowWidth>600){
					mobMenu.removeClass('display');
				};
			}
		}
	}

	$(function(){
		main.init();
		
	});

	$(window).load(function(){
		main.loaded();
		main.equalHeight();	
		main.resize();
		main.mobNav.init();	
	});
	
	$(window).scroll(function() {

	});
	
	$(window).resize(function() {
		if ($(window).width() < 800) {
			$("#slideupbox").hide();
		}
	});
	
})(jQuery);
