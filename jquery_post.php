<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 20.04.2017
 * Time: 8:07
 */
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.post demo</title>
  <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
</head>
<body>

<form action="/" id="searchForm">
  <input type="text" name="s" placeholder="Search...">
  <input type="submit" value="Search">
</form>
<!-- the result of the search will be rendered inside this div -->
<div id="result"></div>

<script>
    $(document).ready(function(){
        $("input").keyup(function(){
            var txt = $("input").val();
            $.post("demo_ajax_gethint.asp", {suggest: txt}, function(result){
                $("span").html(result);
            });
        });
    });
</script>

<script>
// Attach a submit handler to the form
$( "#searchForm" ).submit(function( event ) {

    // Stop form from submitting normally
    event.preventDefault();

    // Get some values from elements on the page:
    var $form = $( this ),
    term = $form.find( "input[name='s']" ).val(),
    url = $form.attr( "action" );

  // Send the data using post
  var posting = $.post( url, { s: term } );

  // Put the results in a div
  posting.done(function( data ) {
      var content = $( data ).find( "#content" );
      $( "#result" ).empty().append( content );
  });
});
</script>

</body>
</html>
