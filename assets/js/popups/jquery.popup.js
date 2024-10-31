/* ========= INFORMATION ============================
	- document:  LeadGeneration
	- author:    Dmytro Lobov
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/
	
==================================================== */

// jQuery Popup
(function($) {
	"use strict";
	$.fn.lgPopup = function(options) {
		
		// Settings
		var settings = $.extend({}, options);
		
		// Start each popup
		return this.each(function() {
			var self = this,
			id = self.id,
			videoSel = $(self).find('iframe[src*="youtube.com"]'),
			videoURL = videoSel.attr('src'),
			Click = '1',
			screen = $(window).width();
			
			// Open Popup via click						
			$('#' + settings.openPopup + ', .' + settings.openPopup + ', a[href$="' + settings.openPopup + '"]').click(function(event) {
				event.preventDefault();				
				showPopup();				
			});
			
			// Open Popup via hover 
			$('#' + settings.openPopup + ', .' + settings.openPopup + ', a[href$="' + settings.openPopup + '"]').hover(function(event) {
				event.preventDefault();
				if (settings.popupAction == 'hover') {
					showPopup();
				}
			});
			
			// Close popup
			$('#' + settings.closePopup + ', .' + settings.closePopup + ', a[href$="' + settings.closePopup + '"]').click(function() {				
				closePopup();
			});			
			
			$('#'+ id + ' .lg-popup-overlay-close').click(function() {				
				closePopup();				
			});	
			
			$('#' + id + ' .lg-popup-close-btn').on('click', function() {
				closePopup();				
			});	
			
			// Send action count 
			$('#' + id + ' .lg-popup-action').on('click', function() {
				if (settings.popupAnalytic == true){
					popup_view_count('action');				
				}
			});
			
			popupStyling();
			autoShowPopup();
			closeESC();
			
			// Popup location fixing
			function locationFix(param) {
				if (param === 'center') {
					$(self).children('.lg-popup').css({
						'margin' : 'auto'
					})
					} else if ((param === 'bottomCenter') || (param === 'topCenter')) {
					$(self).children('.lg-popup').css({
						'margin-left' : 'auto',
						'margin-right' : 'auto'
					})
					} else if ((param === 'right') || (param === 'left')) {
					$(self).children('.lg-popup').css({
						'margin-top' : 'auto',
						'margin-bottom' : 'auto'
					})
				}
			}
			
			function popupStyling() { 
				$(self).children('.lg-popup').addClass('lg-animated ' + settings.popupLocation);
				locationFix(settings.popupLocation);
			}
			
			// Add effect class
			function addEffectClass() {
				$(self).children('.lg-popup').addClass(settings.popupOpenEffect).removeClass(settings.popupCloseEffect);
			}
			
			// Remove effect class
			function removeEffectClass() {
				$(self).children('.lg-popup').removeClass(settings.popupOpenEffect).addClass(settings.popupCloseEffect);				
			}
			
			function overlayOpen() {
				if (settings.popupOverlay === true) {
					$(self).addClass('lg-popup-overlay fadeIn').removeClass('fadeOut');					
					$('html, body').addClass('no-scroll');
				}
			}
			
			function overlayClose() {
				if (settings.popupOverlay === true) { 
					$(self).removeClass('fadeIn').addClass('fadeOut');					
					$('html, body').removeClass('no-scroll');
				}
			}
			
			
			// Open Popup
			function showPopup() {				
				overlayOpen();								
				$(self).addClass('is-active');
				$(self).children('.lg-popup').addClass('is-active');
				addEffectClass();				
				videoAutoplay();				
				if (settings.closeButtonRemove !== true) {
					showCloseButton();
				}
				if (settings.closePopupAuto === true) {
					autoClosePopup();
				}				
				if (settings.popupAnalytic == true){
					popup_view_count('view');
				}
			}
			
			function popup_view_count(type) {
				var data = 'action=lg_count&count_type='+type+'&tool=popup&tool_id='+settings.popupID;				
				$.post(lg_count.ajaxurl, data, function() {});
			}
			
			// Close Popup
			function closePopup() {
				removeEffectClass();
				setTimeout(function() {
					$(self).children('.lg-popup').removeClass('is-active');
					$(self).removeClass('is-active');
					$(self).find('.lg-popup-close-btn').removeClass('is-active');
					overlayClose();
				}, settings.overlayTransitionSpeed * 1000);									
				if (settings.setCookie == true) {
					setPopupCookie();
				}				
			}			
			
			// Delay for open Popup
			function delayPopup() {
				setTimeout(function() {
					showPopup();
				}, settings.delayPopup * 1000)
			}
			
			// Close Popup after x second  
			function autoClosePopup() {
				setTimeout(function() {
					closePopup();
				}, settings.closePopupAutoDelay * 1000)
			}
			
			// Show close button after x second
			function showCloseButton() {
				setTimeout(function() {	
					$(self).find('.lg-popup-close-btn').addClass('is-active');					
				}, settings.delayCloseButton * 1000);
			}
			
			// Auto Show Popup
			function autoShowPopup() {
				if (deviceWidth() == true) {
					if (settings.popupAction == 'load') {
						delayPopup();
						} else if (settings.popupAction == 'exit') {
						setTimeout(function() {
							showPopupExit();
						}, settings.delayPopup * 1000);                        
						} else if (settings.popupAction == 'scrolled') {
						showPopupScroll();
						} else if (settings.popupAction == 'rightclick') {
						showPopupRightClick();
						} else if (settings.popupAction == 'selectedtext') {
						showPopupSelectedText();
					}
					if (settings.buttonAnimationEnable == true) {
						modalButtonAnimation();
					}
				}
			}
			
			// Popup on device
			function deviceWidth() {
				if (settings.windowMaxInclude == true) {
					if (settings.windowMaxWidth < screen) {
						var winmax = false;
						} else {
						var winmax = true;
					}
					} else {
					var winmax = true;
				}
				if (settings.windowMinInclude == true) {
					if (settings.windowMinWidth > screen) {
						var winmin = false;
						} else {
						var winmin = true;
					}
					} else {
					var winmin = true;
				}
				if (winmax == true && winmin == true) {
					return true;
					} else {
					return false;
				}
			}
			
			
			// Show Popup when user Exit page
			function showPopupExit() {								
				var t = false;
				$(document).on('mouseleave', function(e) {									
					if (e.clientY < 0 && !t) {
						t = true;
						showPopup();
					}
				});
			}
			
			// Show Popup when user Scroll page
			function showPopupScroll() {
				var s = false;
				$(document).scroll(function() {
					var scrollY = $(this).scrollTop();
					if ((scrollY > settings.popupScrollDistance) && !s) {
						s = true;
						delayPopup();
					}
				});				
			}
			
			// Show Popup when user click on right mouse button
			function showPopupRightClick() {
				$(document).contextmenu(function() {
					delayPopup();
					return false;
				});
			}
			
			// Show Popup when user select any text
			function showPopupSelectedText() {
				$(document).mouseup(function(e) {
					var selected_text = ((window.getSelection && window.getSelection()) || (document.getSelection && document.getSelection()) || (document.selection && document.selection.createRange && document.selection.createRange().text));
					if (selected_text.toString().length > 2 && Click == 1) {
						delayPopup();
					}
				});
			}
			
			// Close Popup when user click ESC 
			function closeESC() {
				if (settings.closeESC == true) {
					$(window).bind('keydown', function(e) {
						if (e.keyCode == 27) {
							closePopup();
						}
					})
				}
			}
			
			// Youtube video auto play 
			function videoAutoplay() {
				if ((settings.videoSupport == true) && (settings.videoAutoPlay == true)) {
					if (videoSel.length > 0) {
						videoSel.attr('src', videoURL + '?autoplay=1')
					}
				}
			}
			
			// Youtube video stop 
			function videoStop() {
				if ((settings.videoSupport == true) && (settings.videoStopOnClose == true)) {
					if (videoSel.length > 0) {
						videoSel.attr('src', videoURL + '?autoplay=0')
					}
				}
			}
			
			// Set a cookie to hide popup			
			function setPopupCookie() {
				var days = settings.cookieDays;
				var CookieDate = new Date();
				CookieDate.setTime(CookieDate.getTime() + (days * 24 * 60 * 60 * 1000));
				if (days > 0) {
					document.cookie = settings.cookieName + '=yes; path=/; expires=' + CookieDate.toGMTString();
					} else if (days === 0) {
					document.cookie = settings.cookieName + '=yes; path=/;';
				}
			};					
			
		});
	}
}(jQuery));