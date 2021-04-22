define(["jquery","jqueryUI","passwordToggle"],function(e){"use strict";var t=navigator&&navigator.userAgent,n=/android/i.test(t);e.widget("pp.passwordField",{_create:function(){this._getElements(),this._addListeners()},_getElements:function(){var t=e("<span/>",{"class":"tickmark hide"});this.elements={},this.confirmPasswordHidden=!1,this.elements.email=e("#email"),this.elements.password=e("#password"),this.elements.passwords=e("input[type=password]"),this.elements.confirmPassword=e("#confirmPassword"),this.elements.confirmPassword.length===0&&(this.confirmPasswordHidden=!0,this.elements.showPasswordLink=e("#toggle-link-show"),this.elements.hidePasswordLink=e("#toggle-link-hide")),this.elements.helpErrors=this.element.parent().parent().find(".help-error"),this.elements.helpInformation=this.element.parent().parent().find(".help-information"),this.elements.tickMarkElm=t,e(this.elements.passwords).after(t)},_addListeners:function(){this.elements.password.bind("focus",e.proxy(this._focus,this)),this.elements.password.bind("keyup input",e.proxy(this._keyup,this)),this.elements.password.bind("blur",e.proxy(this._blur,this)),this.elements.confirmPassword.bind("keyup input",e.proxy(this._confirmKeyPress,this)),this.elements.confirmPassword.bind("blur",e.proxy(this._confirmBlur,this)),this.elements.confirmPassword.bind("focus",e.proxy(this._confirmFocus,this)),this.confirmPasswordHidden&&(this.elements.password.hidePassword(!1),this.elements.hidePasswordLink.bind("click",e.proxy(this._togglePassword,this)),this.elements.showPasswordLink.bind("click",e.proxy(this._togglePassword,this)),this.elements.hidePasswordLink.hide())},closeAllBubble:function(){e("p.open, div.open").removeClass("open")},_blur:function(t){this.closeAllBubble(),e("#passwordValidations .requirement.hide").length==e("#passwordValidations .requirement").length&&e("#passwordValidations .restriction.hide").length==e("#passwordValidations .restriction").length?e("#password").parent().parent().removeClass("hasError"):e("#password").parent().parent().addClass("hasError"),this.validateField(t)},_focus:function(t){var n=e(t.target).parent().parent().hasClass("hasError");n?this.openError(e(t.target)):(e("#passwordValidations").removeClass("open"),e(t.target).parent().parent().hasClass("completed")||this.openHelp(e(t.target)))},_keyup:function(t){this.elements.password.parent().parent().removeClass("hasError");var n=this.validateField(t);n.valid?(e("#passwordValidations .requirement.hide").length===e("#passwordValidations .requirement").length&&e("#passwordValidations .restriction.hide").length===e("#passwordValidations .restriction").length?e("#passwordValidations").removeClass("open"):e("#passwordValidations").addClass("open"),this.elements.password.parent().parent().addClass("completed"),this.elements.password.parent().parent().removeClass("hasError")):(this.openHelp(e(t.target)),!n.requirement&&!n.restriction&&(this.elements.password.attr("aria-invalid",!0),this.elements.password.parent().parent().removeClass("completed"),t.type==="blur"&&this.elements.password.parent().parent().addClass("hasError")))},_confirmKeyPress:function(e){var t=this.elements.password.val(),n=this.elements.confirmPassword.val();this._toggleTickMark(),!this.elements.password.parent().parent().hasClass("hasError")&&t.length!==0&&t===n&&(this.elements.confirmPassword.parent().parent().removeClass("hasError"),this.elements.confirmPassword.parent().parent().removeClass("error-format"),this._toggleTickMark(!0))},_confirmFocus:function(t){var n=e(t.target).parent().parent().hasClass("hasError");n&&this.openError(e(t.target))},_confirmBlur:function(t){var n=this.elements.password.val(),r=this.elements.confirmPassword.val();n!==r&&(this.elements.confirmPassword.parent().parent().addClass("hasError"),this.elements.confirmPassword.parent().parent().addClass("error-format"),this.openError(e(t.target)),this._toggleTickMark())},_toggleTickMark:function(e){e?(this.elements.password.siblings("span.tickmark").removeClass("hide"),this.elements.confirmPassword.siblings("span.tickmark").removeClass("hide")):(this.elements.password.siblings("span.tickmark").addClass("hide"),this.elements.confirmPassword.siblings("span.tickmark").addClass("hide"))},_togglePassword:function(e){e.preventDefault(),this.elements.password.focus(),e.target.id==="toggle-link-show"?(this.elements.showPasswordLink.hide(),this.elements.hidePasswordLink.show()):(this.elements.showPasswordLink.show(),this.elements.hidePasswordLink.hide()),this.elements.password.togglePassword()},openError:function(e){var t=e.attr("id");t&&t.length>0&&e.attr("aria-describedby",t+"-help-error"),e.parent().parent().find(".help-information ul > li:not(.hide)").length&&(e.parent().parent().find(".help-information").addClass("open"),e.parent().parent().find(".errorMessage").removeClass("open"))},openHelp:function(t){var n=e(t).attr("id");n&&n.length>0&&e(t).attr("aria-describedby","passwordValidations"),e(t).parent().parent().find(".help-information ul > li:not(.hide)").length&&e(t).parent().parent().find(".help-information").addClass("open")},validateField:function(e){var t=this._requirements(e),n=this._restrictions(e);return{valid:t&&n,requirement:t,restriction:n}},_updateToolTip:function(t,r,i,s,o){if(s){e(r.get(i)).addClass("hide");if(n){var u=!1,a=e("#passwordValidations").find(".requirement"),f=e("#passwordValidations").find(".restriction");for(var l=0;l<a.length;l++)e(a[l]).hasClass("hide")||(u=!0);if(u===!1)for(var l=0;l<f.length;l++)e(f[l]).hasClass("hide")||(u=!0);u?e("#passwordValidations").show():e("#passwordValidations").hide()}}else n&&e("#passwordValidations").show(),e(r.get(i)).removeClass("hide")},_requirements:function(t){var n=this.elements.password,r=!0,i=e("#passwordValidations").find(".requirement"),s=[{"case":"lengthCheck",content:0,pattern:/^(?=.{8,}).*$/g},{"case":"presenceOfSymbol",content:1,pattern:/[0-9!-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\]/g},{"case":"legal",content:2,pattern:/^(?=.{3,}).*$/g}],o,u=s,a=i.length;for(o=0;o<a;o++)u=s[o],u.pattern.test(n.val())?(this._updateToolTip(t,i,u.content,!0,"requirment"),r=!0):(this._updateToolTip(t,i,u.content,!1,"requirment"),r=!1);return r},_restrictions:function(t){var n=this.elements.password,r=!0,i=e("#passwordValidations").find(".restriction"),s=[{"case":"lengthCheck",content:0,pattern:/^(?=.{21}).*$/g},{"case":"emailCheck",content:this.elements.email.val()!==""?1:"",pattern:this.elements.email.val()!==""?new RegExp("^"+this.elements.email.val()+"$"):new RegExp("^$")},{"case":"repetitiveCheck",content:2,pattern:/(.)\1{3}/g},{"case":"consecutiveNumberCheck",content:3,pattern:/0123|1234|2345|3456|4567|5678|6789|7890|8901|9012/g},{"case":"sequenceCharacterCheck",content:4,pattern:/qwer|wert|erty|rtyu|tyui|yuio|uiop|asdf|sdfg|dfgh|fghj|ghjk|hjkl|zxcv|xcvb|cvbn|vbnm|QWER|WERT|ERTY|RTYU|TYUI|YUIO|UIOP|ASDF|SDFG|DFGH|FGHJ|GHJK|HJKL|ZXCV|XCVB|CVBN|VBNM/g},{"case":"sequenceSpecialCharactersCheck",content:5,pattern:/\`123|890-|90-=|iop[|op[]|p\[\]\\|jkl\;|kl\;'|bnm,|nm,.|m,.\/|~!@\#|!@\#$|@#\$%|#\$%\^|\$%\^&|\%\^&\*|\^&\*\(|&\*\(\)|\*\(\)\_|\(\)\_\+|iop\[|op\[\]|p\[\]\\|BNM<|NM<>|M\<\>\?|IOP{}|OP{}|P{}\|/g},{"case":"spaceCheck",content:6,pattern:/\s/g}],o,u=s,a=s.length;for(o=0;o<a;o++)u=s[o],u.pattern.test(n.val())?(this._updateToolTip(t,i,u.content,!1),r=!1):(this._updateToolTip(t,i,u.content,!0),r=!0);return r}})});