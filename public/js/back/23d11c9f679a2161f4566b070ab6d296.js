Bootstrapper.bindImmediate(function(){var Bootstrapper=window["Bootstrapper"];var ensightenOptions=Bootstrapper.ensightenOptions;Bootstrapper.data.resolve(["11506","11505"],function(manage_11506,manage_11505){var i=window,r="ga";i.GoogleAnalyticsObject=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)};i[r].l=1*new Date;Bootstrapper.insertScript("//www.paypalobjects.com/gajs/analytics.js");Bootstrapper["UA_ga"]=Bootstrapper["UA_ga"]||{};var g=i[r];var getAccountId=function(){var accountId=
"UA-53389718-2";var host=window.location.hostname.toLowerCase();if(host&&host.indexOf("www.paypal.com")<0)accountId="UA-53389718-1";return accountId};var getDomainName=function(){var isLocalhost=document.location.hostname==="localhost.paypal.com";var domainName="";if(isLocalhost)domainName="none";else domainName="auto";return domainName};g("create",getAccountId(),getDomainName());g("require","displayfeatures");Bootstrapper.bindPageSpecificCompletion(function(){setTimeout(function(){Bootstrapper.bindDOMParsed(function(){setTimeout(function(){window.ga("set",
"page",function(){var pathname=window.location.pathname.toLowerCase();var search=window.location.search.toLowerCase();var pageName="";if(pathname.indexOf("/uk/")===0)pageName="/gb/"+pathname.substring(4)+search;else if(pathname.indexOf("/"+window.dataLayer.contentCountry+"/")!==0)pageName="/"+window.dataLayer.contentCountry+pathname+search;return pageName}());window.ga("set",{"dimension1":manage_11506,"dimension2":manage_11505,"dimension3":function anon(){var cid="";ga(function(tracker){cid=tracker.get("clientId")});
return cid}()});window["ga"]("send","pageview",Bootstrapper["UA_ga"]||{})},250)})},250)})})},1691929,441713);