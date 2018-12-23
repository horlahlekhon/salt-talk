<?php
$show="";
if(isset($_GET['url']))
	{
	$wpurl=$_GET['url'];
	}
if(isset($_GET['trigger']))
	{
	$trigger=$_GET['trigger'];
	}
if(isset($_GET['show']))
	{
	$show=$_GET['show'];
	}
if(($wpurl=="") OR ($trigger==""))
	{
	die();
	}
$handle=opendir ("../images/bg/");
?>
<style>
.img {float:left; overflow:hidden; width:100px; height:100px; margin:6px; padding:2px; border:1px solid #dcdcdc; cursor:pointer;}
</style>

<?php
if($show=="mini")
	{
	echo "<div style='height:300px; overflow-y:scroll;'>";
	}
while ($datei = readdir ($handle))
	{
	if(($datei!="") AND ($datei!=".") AND ($datei!="..") AND ($datei!="index.html") AND ($show!="mini"))
		{
		echo "<div class='img' style='background:url($wpurl/images/bg/$datei) top left' onclick=\"jQuery('#$trigger').val('$wpurl/images/bg/$datei'); jQuery('#src_load').dialog('close'); \">";
		//	echo "<img src='$wpurl/images/bg/$datei' alt=''  /><br>";
		echo "</div>";
		//	echo "<p>$datei</p>";
		}

	if(($datei!="") AND ($datei!=".") AND ($datei!="..") AND ($datei!="index.html") AND ($show=="mini"))
		{
		echo "<div class='style_select_bg' data-goal='' data-val='".$wpurl."/images/bg/".$datei."' style='background:url(".$wpurl."/images/bg/".$datei."); width:30px; height:30px; margin:2px; float:left;' ></div>";
		}
	}
if($show=="mini")
	{
	echo "<div class='style_select_bg' data-goal='' data-val=''   width:30px; height:30px; margin:2px; float:left;' > X </div>";	
	echo "<div style='clear:both'></div>
	</div>";
	}
closedir($handle);
?>
<script type="text/javascript">
var trigger="<?php echo $trigger; ?>";
</script>