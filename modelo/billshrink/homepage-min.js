function validatenumber(A,B){jQuery.getScript("/mobileplanadvisor2/lookupNumber.bx?inputPhone.phoneNumber="+A+"&windowEvent=phoneNumberChange&requestmode=ajax");return true}function validatenumberforce(A){jQuery.getScript("/mobileplanadvisor2/lookupNumber.bx?inputPhone.phoneNumber="+A+"&windowEvent=phoneNumberChange&forceLookup=true&requestmode=ajax");return true}function validatefriendnumber(A,B){jQuery.getScript("/mobileplanadvisor2/lookupNumber.bx?inputPhone.phoneNumber="+A+"&windowEvent=friendNumberLookup&requestmode=ajax&button="+B);return true}function validateaddress(A){if(typeof (GClientGeocoder)!="undefined"){if(A.val()!=""){addressValidationGeocoder=new GClientGeocoder();addressValidationGeocoder.setBaseCountryCode("US");addressValidationGeocoder.getLocations(A.val(),function(B){if(!B||B.Status.code!=200||B.Placemark.length>1||B.Placemark[0].AddressDetails.Country.CountryNameCode!="US"){jQuery("#"+A.attr("id")+"_isValid").val(0);jQuery(A).addClass("error")}else{jQuery("#"+A.attr("id")+"_isValid").val(1);jQuery(A).removeClass("error")}})}else{jQuery("#"+A.attr("id")+"_isValid").val(1);jQuery(A).removeClass("error")}}else{if(jQuery(document).data("manualChange")){jQuery(document).data("manualChange").push(A.attr("id"))}else{jQuery(document).data("manualChange",[A.attr("id")])}jQuery.getScript("https://maps.google.com/maps?file=api&v=2&"+googleKey+"&callback=reChange&async=2&sensor=false")}}function reChange(){jQuery.each(jQuery(document).data("manualChange"),function(A,B){jQuery("#"+B).change()});jQuery(document).data("manualChange",[])}(function(A){A(function(){A.ajaxSetup({dataType:"script"});A("._track").track();A("._popup").popup();A("._popupbutton").popupbutton();A("._mirror").mirror();A("div._labelover").labelover(function(){return A(this).attr("title")});A("._remove").link({mode:"remove"});A("._link").link();A("._popunder").popunder();A("._progress").progress();A("._tabs").tabs().bind("tabsshow",function(C,B){if(B&&B.panel){A(B.panel).trigger("show")}});A("._datepicker").datepicker({dateFormat:"mm-dd-yy",minDate:0,maxDate:"+2y + 1w"});A("._cond").cond();A("._inplace").inplace();A("._cardcomplete,._buxcomplete").buxcomplete();A("._slider").slider();A("._dynaload").dynaload();A("._showinit").showinit();A("._ajaxform").ajaxForm();A("._cart").cart();A("a[href^='http']").not("[href*='tarifasrd.com']").not("[href*='localhost']").not("[href*='servicelabs.com']").not("[href*='buxwatch.com']").attr("target","_blank");A("a[rel='external'],._external_link").attr("target","_blank");A("input[type=password]").change(function(){A(this).val(A.trim(A(this).val()))});A("._validate").each(function(){var C=A(this);if(0!=C.length){var B=C.metadata?C.metadata()["validate"]:{};C.validate(B)}});A("._url").val(document.location);A("._feed").feed()})})(jQuery);jQuery(window).load(function(){setTimeout(function(){if(jQuery(".recent-blog-posts").length>0){jQuery.ajax({type:"GET",url:"",dataType:"script",cache:true,callback:null,data:null})}},100)});function update_blogfeed(A){jQuery(".recent-blog-posts .feed-item").html('<a href="'+A.items[0].link+'">'+A.items[0].title+"</a>")}jQuery.validator.addMethod("notEqual",function(C,A,D){var B=jQuery(A);var F=B.attr("id");var E=false;jQuery("."+D).each(function(){if(jQuery(this).attr("id")!=F){if(jQuery(this).val()==C&&jQuery(this).val()!=""){E=false;return false}else{E=true;return true}}});return E},"This field must be unique.");jQuery.validator.addMethod("script",function(value,element,param){return eval(param+'("'+value+'","'+element.id+'");')},"This field is not valid.");jQuery.validator.addMethod("phone",function(A,B){A=A.replace(/\s+/g,"");return this.optional(B)||A.length>9&&A.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/)},"Please specify a valid #");jQuery.validator.addMethod("notEqualTo",function(B,A,C){paramValue=jQuery(C).val();return B!=paramValue},"This field is not valid.");function chainAjax(G,B,D,C){var A=D;var F=C;var E=jQuery(G+":eq("+B+")").val();if(jQuery(G).length>1){if(B<(jQuery(G).length-1)){B++;jQuery(E).ajaxSubmit({url:A?F==E?jQuery(E).attr("action"):A:$(E).attr("action"),success:function(){chainAjax(G,B,A,F)},error:function(){}})}else{jQuery(E).submit()}}else{jQuery(E).submit()}}function validateaddressZip(A){jQuery("#"+A.attr("id")+"_isValid").val(1);jQuery(A).removeClass("error");if(typeof (GClientGeocoder)!="undefined"){if(A.val()!=""){addressValidationGeocoder=new GClientGeocoder();addressValidationGeocoder.setBaseCountryCode("US");addressValidationGeocoder.getLocations(A.val(),function(B){if(!B||B.Status.code!=200||B.Placemark.length>1||B.Placemark[0].AddressDetails.Country.CountryNameCode!="US"||B.Placemark[0].AddressDetails.Accuracy<8){jQuery("#"+A.attr("id")+"_isValid").val(0);jQuery(A).addClass("error")}else{jQuery("#"+A.attr("id")+"_isValid").val(1);jQuery(A).removeClass("error")}})}else{jQuery("#"+A.attr("id")+"_isValid").val(1);jQuery(A).removeClass("error")}}else{if(jQuery(document).data("manualChange")){jQuery(document).data("manualChange").push(A.attr("id"))}else{jQuery(document).data("manualChange",[A.attr("id")])}jQuery.getScript("https://maps.google.com/maps?file=api&v=2&"+googleKey+"&callback=reChange&async=2&sensor=false")}};