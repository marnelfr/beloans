define(["nougat","jquery","backbone","fso-helper","lap","textField","passwordField","captcha","browserID"],function(e,t,n,r){"use strict";var i=n.View.extend({el:"#account",initialize:function(e){e&&e.data?this.data=e.data:this.afterRender()},afterRender:function(){this.$(".textInput").lap(),this.$(".textInput").textField(),this.$("#email")&&this.$("#email").bind("blur",t.proxy(this.detectGuest,this)),this.$("#password").passwordField(),this.$("#captcha").length&&this.$("#captcha").capthaInput();var e=this.$(".textInput.hasError").get(0);e&&(t(e).find(".errorMessage").addClass("open"),t(e).find(".error-submit").addClass("open")),PAYPAL.tns.loginflow="signup/account",PAYPAL.tns.flashLocation="https://www.paypalobjects.com/en_US/m/midOpt.swf",PAYPAL.tns.MIDinit(),this.browserProfiling(),t("input[type=email]:visible").length&&t(".incentiveText:not(:visible)").show();var n=t(".personalAccountSignUp").data("selectionenabled");window.setTimeout(function(){window.addEventListener("popstate",function(e){n&&(this.$("#radioOptions").removeClass("hide"),this.$(".personalAccountSignUp").addClass("hide")),/personalAccount/.test(window.location.hash)?t(".incentiveText:not(:visible)").fadeToggle("down"):t(".incentiveText:visible").fadeToggle("up")})},1e3)},events:{"change  input[name=accountType][type=radio]":"changeHref","change #country":"changeCountry","click #personalSignUpLink":"showPersonalAccountSignUp","click #personalSignUpForm":"showRadioOptionsPersonalAccountForm","focus input[readonly=readonly]":"removeFocus","click .questionMark":"toggleSteps","click #stayLoggedIn":"toggleCheckBox"},changeHref:function(e){this.$("#personalSignUpForm").attr("href",t(e.target).data("href"))},toggleCheckBox:function(e){var n=t(e.currentTarget);n.toggleClass("_checked",!!n[0].checked)},showRadioOptionsPersonalAccountForm:function(e){var r=t("input[type=radio][name=accountType]:checked").val();r==="Personal"?(e.preventDefault(),window.location.hash="personalAccountSignUp",t(".incentiveText:not(:visible)").fadeToggle("down"),this.$("#radioOptions").addClass("hide"),this.$(".businessSignup").removeClass("hide"),this.$(".personalAccountSignUp").removeClass("hide"),this.$(".accountSelection.illustrations").addClass("hide"),n.trigger.apply(n,["analytics:trackLink:accountSelection"])):(e.preventDefault(),t("form").submit())},showPersonalAccountSignUp:function(e){e&&e.preventDefault(),this.$(".personalAccount").addClass("hide"),this.$(".personalAccountSignUp").removeClass("hide"),this.$("#radioOptions").addClass("hide"),this.$(".accountSelection.illustrations").addClass("hide"),t(".incentiveText:not(:visible)").show()},applyClass:function(e){t(e.target).parent().addClass("focus")},removeClass:function(e){t(e.target).parent().removeClass("focus")},removeFocus:function(e){return t(e.currentTarget).blur(),!1},changeCountry:function(e){var n=t(e.target).val(),r=window.location.search.indexOf("intent")!==-1?"&intent=true":"",i=t("#content").attr("data-country");if(n!==""&&n!==i){document.location.href=window.location.pathname+"?country.x="+n+r;return}},browserProfiling:function(){try{PAYPAL.bp.init("signup_form","bp_mid"),PAYPAL.ks.init("signup_form","password","bp_ks1"),PAYPAL.common.appendField("signup_form","bp_ks2"),PAYPAL.common.appendField("signup_form","bp_ks3")}catch(e){}},toggleSteps:function(e){this.$(".oneTouchSteps").toggleClass("hide")},detectGuest:function(e){var n=e.target.value,r=this.$("#email")&&this.$("#email").parent()&&this.$("#email").parent().parent()&&this.$("#email").parent().parent().hasClass("hasError"),i=r||n===""||this.lastEmailValue===n;if(i)return;this.lastEmailValue=n,t.ajax({type:"POST",url:"/signup/account/detect",data:{email:n,_csrf:t("#csrf").val()},dataType:"json",success:function(e){return}})},render:function(){this.$(".textInput").lap().textField()}});return i});