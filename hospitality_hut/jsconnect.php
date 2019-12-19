<html>

<form id="sampleForm" name="sampleForm" method="post" action="myloc.php">
<input type="text" name="latitude" id="lat" value="" style="display: none;">
<input type="text" name="longitude" id="long" value="" style="display: none;">

</form>

</html>

<script>
//var x = document.getElementById("demo");


    if (navigator.geolocation) {
    //document.sampleForm.lat.value = "ok";
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       document.sampleForm.lat.value = "Geolocation is not supported by this browser.";
    }


function showPosition(position) {
  document.sampleForm.lat.value = position.coords.latitude;
  document.sampleForm.long.value = position.coords.longitude;
  window.location.href = "search.php?latitude=" + position.coords.latitude +"&longitude="+position.coords.longitude;
}
</script>