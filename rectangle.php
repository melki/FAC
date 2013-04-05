<?php
header("Content-Type: image/jpeg" ); 
if(isset($_GET['pourcentage']))
{
	$dim=2*$_GET['pourcentage']+1;	
	$image=imagecreate($dim,20);
	imageColorAllocate($image,204,150,255);
	$textcolor =  imageColorAllocate($image,255,255,255);
	imageJpeg($image);
	imageDestroy($image);	
}

else

{
	$image=imagecreate(200,20);
	imageColorAllocate($image,204,150,255);
	imageJpeg($image);
	imageDestroy($image);
}
?>