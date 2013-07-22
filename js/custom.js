jQuery.noConflict();
    jQuery(document).ready(function($){
    /********** jquery dropdown menu **********/
	$('ul.sf-menu').superfish({
		autoArrows:  false
	});

	/********** jquery responsive dropdown menu **********/
    $("<select />").appendTo("nav");
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Select Page..."
      }).appendTo("nav select");
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
  });


    });