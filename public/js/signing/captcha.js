define(["jquery","jqueryUI"],function(e){"use strict";e.widget("pp.capthaInput",{_create:function(){this._getElements(),this._addListeners(),Backbone.trigger.apply(Backbone,["analytics:trackEvent:showCaptcha","showCaptcha"])},_getElements:function(){this.elements={},this.elements.refreshCaptcha=e("#refreshCaptcha"),this.elements.captchaImage=e("#captchaImageDisplay"),this.elements.audioCaptcha=e(".captchaAudio"),this.elements.audioSrc=e("#captchaPlay")},_addListeners:function(){this.elements.refreshCaptcha.bind("click",e.proxy(this._clickCaptchaReload,this)),this.elements.audioCaptcha.bind("click",e.proxy(this._audioClick,this))},_audioClick:function(e){this.elements.audioSrc.get(0).load(),this.elements.audioSrc.get(0).play(),Backbone.trigger.apply(Backbone,["analytics:trackClick:audioCaptcha","audioCaptcha"])},_clickCaptchaReload:function(t){t.preventDefault(),t.stopPropagation();var n=this;e.ajax({type:"POST",url:"/signup/refreshCaptcha",dataType:"json",success:function(e){n.elements.captchaImage.attr("src",e.data.captchaImgUrl),n.elements.audioSrc.attr("src",e.data.captchaAudioUrl)}}),Backbone.trigger.apply(Backbone,["analytics:trackClick:refreshCaptcha","refreshCaptcha"])}})});