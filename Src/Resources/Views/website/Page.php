<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  	$('#createList').click(function() {
    		$('#sortable').show();
    		$(this).attr('disabled','');
        $('#toggle').removeAttr('disabled');
			  $( "#sortable" ).sortable();
		    $( "#sortable" ).disableSelection();
    });
    
    $('#toggle').click(function() {
    	//check if sortable() is enabled and change and change state accordingly
      // Getter
      var disabled = $("#sortable").sortable( "option", "disabled" );
      if (disabled) {
      	$("#sortable").sortable( "enable" );
        $('#status').html('Sortable is now Enabled!!');
      }
      else {
      	$("#sortable").sortable("disable");
        $('#status').html('Sortable is Disabled');
      }
    });
  });
  </script>
</head>
<body>
  <input type="button" id="createList" value="Create Sortable List"/>
  <input type="button" id="toggle" value="Toggle Sortable" disabled/>
  <br><br>  
  <span id="status"></span>
  <br><br>
  <ul id="sortable" style="display: none;">
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
</ul>
</body>
</html>