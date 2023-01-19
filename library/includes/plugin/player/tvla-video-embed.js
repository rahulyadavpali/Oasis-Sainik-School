/**
 * All video block functionality
 * 
 */

(function (TVLA, $, undefined) {

  //-------------------
  //document ready
  //--------------------

  $(document).ready(function () {

    if ($('.tvla-video-wrapper').length) {
	    
	    var deviceClass = TVLA.isMobile()?'mobile':'desktop';
      
      $('.tvla-video-wrapper').removeClass('mobile');
      $('.tvla-video-wrapper').removeClass('desktop');
      $('.tvla-video-wrapper').addClass(deviceClass);

      $('.tvla-video-wrapper').each(function () {

        var that = this;
        if ($(that).find('.vimeo').length) {
          new TVLA.VideoPlayer({
            type: 'vimeo',
            iframe: $(that).find('.player.vimeo')
          });
        }
        if ($(that).find('.youtube').length) {
          TVLA.addVideoToEnable(
              $(that).find('.player.youtube').attr('id'),
              {
                type: 'youtube',
                iframe: $(that).find('.player.youtube')
              }
          );
          TVLA.enableYoutubeApi();
        }
        if ($(that).find('.htmlvideo').length) {
          new TVLA.VideoPlayer({
            type: 'htmlvideo',
            // we have a video element in this case, not iframe
            iframe: $(that).find('.player.htmlvideo')
          });
        }
        //Hide caption for slide if it has video and we are in 'desktop' state
        if (!TVLA.isMobile()) {
          $(this).siblings('.hp_slider_content_text.hide-caption-desktop').hide();
        }
      });

      enableSliderVideoEvents();
    }

  });


  //-------------------
  //FUNCTIONS OBJECTS
  //--------------------

  function enableSliderVideoEvents() {
    //ADDING SLIDER EVENTS FOR VIDEO 
    function onSliderAfter(slider) {

      $.each(slider.slides, function (index, value) {
        $(value).find('.tvla-video-wrapper').trigger('slideOut');
      });
      $(slider.slides[slider.animatingTo]).find('.tvla-video-wrapper').trigger('slideIn');
    }
    function onSliderStart(slider) {
      if (slider.slides.length > 1) {
        $.each(slider.slides, function (index, value) {
          $(value).find('.tvla-video-wrapper').trigger('videoInSlide', index);
        });
      } else if (slider.slides.length === 1) {
        // we have a single slide
        $(slider).find('.tvla-video-wrapper').trigger('videoInSoloSlide', 0);
      }

      onSliderAfter(slider);
    }

    $('.flexslider').each(function () {
      var slider = $(this).data('flexslider');
      slider.vars.before = onSliderAfter;
      slider.vars.start = onSliderStart;
    });

    //receiving events from video
    $('.flexslider').on('videoStarted', function (event, slideIndex) {
      var slider = $(this).data('flexslider');
      if (slider.playing) {
        slider.pause();
      }
    });

    $('.flexslider').on('videoEnded', function (event, slideIndex) {
      var slider = $(this).data('flexslider');
      if (!slider.playing){
        slider.play();
        slider.flexAnimate(slider.getTarget("next"), false, false, false);
      }
    });
    
    var videoPausedTimeoutHandler;
    $('.flexslider').on('videoPaused', function (event, slideIndex) {
      var slider = $(this).data('flexslider');
      clearTimeout(videoPausedTimeoutHandler);

      videoPausedTimeoutHandler = setTimeout(function() {
        if (!slider.playing && slider.currentSlide === slideIndex){
          slider.play();
          slider.flexAnimate(slider.getTarget("next"), false, false, false);
        }
      }, 5000);

    });
  }

  /**
   * Checs if user is on mobile device
   * 
   * @returns bool - true if browser is mobile;
   */
  var isMobileStatic;

  TVLA.isMobile = function () {
    if (typeof isMobileStatic === 'undefined') {
      isMobileStatic = (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
          || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4)));
    }
    return isMobileStatic;
    //if ( $(window).width() > 980 ) {
     // return false;
    //} else {
      //return true;
    //} */  
  };

  /**
   * Enables box behavior when its horizontal center line enters and leaves the screen
   * @param wrapper
   * @param function callbackIn
   * @param function callbackOut   
   */
  TVLA.enableElementEventsOnScroll = function (wrapper, callbackIn, callbackOut) {
    var historyInView = false;
    $(window).scroll(function () {
      var inView = TVLA.elementInView(wrapper);

      if (inView !== historyInView) {
        if (inView) {
          callbackIn();
        } else {
          callbackOut();
        }
        historyInView = inView;
      }
    });
  };

  /**
   *  Checks if horizontal center line of element is in view
   * @param {type} element
   * @returns {Boolean}
   */
  TVLA.elementInView = function (element) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(element).offset().top;

    var elemBottom = elemTop + $(element).height();
    var elemMiddle = elemTop + $(element).height() / 2;

    return ((elemMiddle <= docViewBottom) && (elemMiddle >= docViewTop));
  };

  /**
   * Enables youtube api by adding its script    
   */

  TVLA.enableYoutubeApi = function () {
    if (typeof window.YT !== 'undefined')
      return;
    var tag = document.createElement('script');
    tag.id = 'iframe-demo';
    tag.src = 'https://www.youtube.com/iframe_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  };

  var apiYtReady = false;

  TVLA.videoIdsToEnable = new Array();

  TVLA.addVideoToEnable = function (id, options) {
    if (apiYtReady) {
      createYoutubeWrapper({id: id, options: options});
    } else {
      TVLA.videoIdsToEnable.push({id: id, options: options});
    }
  };

  //called on api ready
  TVLA.onYouTubeIframeAPIReady = function () {
    apiYtReady = true;

    if (TVLA.videoIdsToEnable.length) {
      for (var i = 0; i < TVLA.videoIdsToEnable.length; i++) {
        createYoutubeWrapper(TVLA.videoIdsToEnable[i]);
      }
      //empty array
      TVLA.videoIdsToEnable.splice(0, TVLA.videoIdsToEnable.length);
    }
  };

  function createYoutubeWrapper(videoIdToEnable) {
    return new YT.Player(videoIdToEnable.id, {
      events: {
        'onReady': function (event) {
          new TVLA.VideoPlayer(videoIdToEnable.options, event.target);

          //HACK for first youtube video in slide 
          // - it loads later than slider so we need to resend play triger for it or else i won't start
          var slider = $(event.target.a).closest('.flexslider').data('flexslider');
          if (slider) {
            $(slider.slides[slider.currentSlide]).find('.tvla-video-wrapper').trigger('slideIn');
          }
        }
      }
    });
  }

  /**
   * Youtube and vimeo wrapper object constructor
   * 
   * @param {type} options
   * options = {
   *  iframeSelector: string required
   * }
   * @returns {undefined}
   * 
   */

  TVLA.VideoPlayer = function VideoPlayer(options, youtubeObject) {
	  if (!(this instanceof VideoPlayer)) {
      return new VideoPlayer(options, youtubeObject);
    }

    //basic init
    var that = this;

    this.type = options.type;
    this.id = options.iframe.attr('id');

    if (this.type === 'vimeo') {
      this.vimeo = new Vimeo.Player(options.iframe);
      this.vimeo.setAutopause(false);
    }

    if (this.type === 'youtube') {
      this.youtube = youtubeObject;
    }

    if (this.type === 'htmlvideo') {
      this.htmlvideo = options.iframe.get(0);
    }
    //optional muting
    this.wrapper = options.iframe.closest('.tvla-video-wrapper');
    this.viewport = this.wrapper.find('.player-viewport');

    options.muted = (this.wrapper.attr('data-muted') === 'true');
    options.soundControls = !!this.wrapper.find('.vbutton-sound').length;
    options.playControls = !!this.wrapper.find('.vbutton-playback').length;
    options.layout = this.wrapper.attr('data-layout');
    options.aspectRatio = this.wrapper.attr('data-ratio');
    options.autoplay = this.wrapper.attr('data-autoplay');
    options.mobile = this.wrapper.attr('data-mobile');

    this.overlay = this.wrapper.find('.player-overlay');
    this.buttonPlay = this.wrapper.find('.vbutton-play');
    this.buttonPause = this.wrapper.find('.vbutton-pause');
    this.buttonSoundOn = this.wrapper.find('.vbutton-sound-on');
    this.buttonSoundOff = this.wrapper.find('.vbutton-sound-off');
    
    this.mobileOverlay = this.wrapper.find('.player-overlay-mobile');

    //basic player control functions

    var playerPlaying = false;
    var playerMuted = false;   

    //playback wrappers
    this.play = function (mobileClick) {
	    if (TVLA.isMobile() && !mobileClick) {
		    return;
	    }
      if (that.type === 'vimeo') {
        that.vimeo.play();
      }
      if (that.type === 'youtube') {
        that.youtube.playVideo();
      }      
      if (that.type === 'htmlvideo') {
        that.htmlvideo.play();
      }      
          
    };

    this.pause = function () {
      if (that.type === 'vimeo') {
        that.vimeo.pause();
      }
      if (that.type === 'youtube') {
        that.youtube.pauseVideo();
      }
      if (that.type === 'htmlvideo') {
        that.htmlvideo.pause();
      }      
    };

    this.playToggle = function () {
      if (playerPlaying) {
        that.pause();
      } else {
        that.play();
      }
    };

    //sound wrappers
    this.soundOn = function () {
      if (that.type === 'vimeo') {
        that.vimeo.setVolume(1);
      }
      if (that.type === 'youtube') {
        that.youtube.setVolume(100);
      }
      if (that.type === 'htmlvideo') {
        that.htmlvideo.volume = 1;
      }      
      if (options.soundControls) {
        that.buttonSoundOn.show();
        that.buttonSoundOff.hide();
      }
      playerMuted = false;
    };

    this.soundOff = function () {
      if (that.type === 'vimeo') {
        that.vimeo.setVolume(0);
      }
      if (that.type === 'youtube') {
        that.youtube.setVolume(0);
      }
      if (that.type === 'htmlvideo') {
        that.htmlvideo.volume = 0;
      }      
      if (options.soundControls) {
        that.buttonSoundOn.hide();
        that.buttonSoundOff.show();
      }
      playerMuted = true;
    };

    this.soundToggle = function () {
      if (playerMuted) {
        that.soundOn();
      } else {
        that.soundOff();
      }
    };

    //init controlls buttons and player
    if (options.autoplay === 'on-ready') {
      this.play();
    } else {
      this.pause();
    }

    if (options.muted) {
      this.soundOff();
    } else {
      this.soundOn();
    }

    //init control clicks;
    if (options.playControls) {
      this.buttonPlay.click(function (e) {
        that.play();
        e.stopPropagation();
      });
      this.buttonPause.click(function (e) {
        that.pause();
        e.stopPropagation();
      });
      this.overlay.click(function (e) {
        that.playToggle();
      });
    }
    if (options.soundControls) {
      that.buttonSoundOn.click(function (e) {
        that.soundOff();
        e.stopPropagation();
      });
      that.buttonSoundOff.click(function (e) {
        that.soundOn();
        e.stopPropagation();
      });
    }


    /*
     * aspect ratio and cover mode
     */

    //Sets dummy aspect ratio, so wideo would have its native proportion
    this.setWrapperAspectRatio = function () {
      that.wrapper.find('.before-dummy').css({paddingTop: that.aspectRatio * 100 + '%'});
    };

    //Sets viewport size and position so video would cover all the container space
    this.setSizeForCoverMode = function() {
      //disable this function for mobile with default controld
      if (options.mobile === 'show-default' && TVLA.isMobile()) return;

      if ( that.wrapper.height() / that.wrapper.width() < that.aspectRatio ){
        that.viewport.css({
          'width':that.wrapper.width(), 
          'height':that.wrapper.width()*that.aspectRatio,
          'top': (that.wrapper.height()-that.wrapper.width()*that.aspectRatio) / 2,
          'left': 0
        });
      } else {
        that.viewport.css({
          'width':that.wrapper.height()/that.aspectRatio,
          'height':that.wrapper.height(),
          'top': 0,
          'left': (that.wrapper.width()-that.wrapper.height()/that.aspectRatio) / 2
        });
      }
    };

    
    this.aspectRatio = 9/16; //default

    if (options.layout === 'cover' || options.layout === 'aspect' ) {
      if (this.type === 'vimeo') {
        Promise.all([this.vimeo.getVideoWidth(), this.vimeo.getVideoHeight()])
          .then(function (values) {
            var playerWidth = values[0];
            var playerHeight = values[1];
            that.aspectRatio = playerHeight / playerWidth;
            if (options.layout === 'aspect') {
              that.setWrapperAspectRatio();          
            }
            if (options.layout == 'cover') {
              that.setSizeForCoverMode();
            }
          });
      }

      if (this.type === 'youtube') {

        var ratio = options.aspectRatio;

        if (ratio) {
          var a = ratio.split(":");
          this.aspectRatio = parseInt(a[1])/parseInt(a[0]);
        }
        if (options.layout === 'aspect') {
          that.setWrapperAspectRatio();
        }

        if (options.layout === 'cover') {
          that.setSizeForCoverMode();
        }
      }
      
      if (this.type === 'htmlvideo') {

        this.htmlvideo.onloadedmetadata = function() {
          that.aspectRatio = that.htmlvideo.videoHeight/that.htmlvideo.videoWidth;

          if (options.layout === 'aspect') {
            that.setWrapperAspectRatio();
          }

          if (options.layout === 'cover') {
            that.setSizeForCoverMode();
          }
        }
      }

      if (options.layout === 'cover') {
        $(window).resize(this.setSizeForCoverMode);
      }
    }

    //ON VIDEO END CREATE EVENT ON SLIDER element
    if (this.type === 'youtube') {
      this.youtube.addEventListener('onStateChange', 'youtubeStateChanged');
    }

    this.youtubeStateChanged = function (e) {
      
      if (e.data === YT.PlayerState.PLAYING) {
        that.videoPlaying();
      }
      if (e.data === YT.PlayerState.PAUSED) {
        that.videoPaused();
      }
      if (e.data === YT.PlayerState.ENDED) {
        that.videoEnded();
      }
    };
    
    this.videoPlaying = function () {
	    playerPlaying = true;
	    //wasItPlayed = true;
	    options.iframe.closest('.flexslider').trigger('videoStarted', that.slideIndex);
       if (options.playControls) {
        that.buttonPlay.hide();
        that.buttonPause.show();
      } 
      if (TVLA.isMobile()) {
	      that.mobileOverlay.hide();
      }
    };
    
    var pauseTimeoutHandler;
    this.videoPaused = function () {
	    playerPlaying = false;

      options.iframe.closest('.flexslider').trigger('videoPaused', that.slideIndex);

      if (options.playControls) {
        that.buttonPlay.show();
        that.buttonPause.hide();
      }
      
      if (TVLA.isMobile()) {
	      that.mobileOverlay.show();
      }
    };
    
    this.videoEnded = function () {
	    playerPlaying = false;
      options.iframe.closest('.flexslider').trigger('videoEnded', that.slideIndex);
      if (options.playControls) {
        that.buttonPlay.show();
        that.buttonPause.hide();
      }
      if (TVLA.isMobile()) {
	      that.mobileOverlay.show();
      }
    };

    if (this.type === 'vimeo') {
      that.vimeo.on('play', function () {
        that.videoPlaying();
      });
      that.vimeo.on('pause', function () {
        that.videoPaused();
      });
      that.vimeo.on('ended', function () {
        that.videoEnded();
      });
    }

    if (this.type === 'htmlvideo') {
      that.htmlvideo.onplay = that.videoPlaying;
      that.htmlvideo.onpause = that.videoPaused;
      that.htmlvideo.onended = that.videoEnded;
    }

    //autoplay on scrool in and pause on out;
    if (options.autoplay === 'on-scroll') {
      TVLA.enableElementEventsOnScroll(this.wrapper, this.play, this.pause);
    }

    //slider autoplay
    this.wrapper.on('slideIn', function () {
      that.play();
    });

    this.wrapper.on('slideOut', function () {
      that.pause();
    });

    // slider tells us if we are in slide - loop should be off 
    this.wrapper.on('videoInSlide', function (event, slideIndex) {
      that.slideIndex = slideIndex;
      if (that.type==='vimeo') {
        that.vimeo.setLoop(false);
      } else if (that.type==='youtube') {
        that.youtube.setLoop(false);
      } else if (that.type==='htmlvideo') {
        that.htmlvideo.loop = false;
      } 
    });

    // slider tells us if we are in solo slide - loop is on
    this.wrapper.on('videoInSoloSlide', function () {
      if (that.type==='vimeo') {
        that.vimeo.setLoop(true);
      } else if (that.type==='youtube') {
        that.youtube.setLoop(true);
      } else if (that.type==='htmlvideo') {
        that.htmlvideo.loop = true;
      } 
    });
    
    this.mobileOverlay.click(function(){
      that.play(true);    
    });

    //try adding mobile overlay backgroud from sibling with class tvla-video-mobile-image
    if (options.mobile == 'show-custom' && TVLA.isMobile()) {
      var src = "";

      //first case (in views row)
      var imageElement = this.wrapper.closest('.views-row').find('.tvla-video-mobile-image');
      if (imageElement.length) {
        src = imageElement.find('img').attr('src');
      }
      
      //second case (in slide)
      imageElement = this.wrapper.closest('.slides > li').find('.tvla-video-mobile-image');
      if (imageElement.length) {
        src = imageElement.find('img').attr('src');
      }
        
      this.mobileOverlay.css({
        'background-image' : 'url(' + src + ')',
        'background-size' : 'cover',
        'background-position' : 'center center'
      });

    }

    //add this video to video array so it would be accessable from outside
    window.TVLA.allVideos = window.TVLA.allVideos || {};
    window.TVLA.allVideos[this.id] = this;
    return this;
  };

}(window.TVLA = window.TVLA || {}, jQuery));

//************************
//GLOBAL SPACE
//************************

//For youtube api global ready calback
function onYouTubeIframeAPIReady() {
  TVLA.onYouTubeIframeAPIReady();
}

function youtubeStateChanged(e) {
  TVLA.allVideos[e.target.a.id].youtubeStateChanged(e);
}