<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascrpt">
    $("#save-and-go-back-button").keyup(function(){
       alert("there is a keyup");
    });
</script>

<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>


</head>
<body>


	 <div>
		<a href='<?php echo site_url('administrador/')?>'>Torneos</a> |
		<a href='<?php echo site_url('administrador/entrenadores')?>'>Entrenadores</a> |
		<a href='<?php echo site_url('administrador/noticias')?>'>Noticias</a> |
		<a href='<?php echo site_url('administrador/equipos')?>'>Equipos</a> | 
		<a href='<?php echo site_url('administrador/jugadores')?>'>Jugadores</a> |		 
		<a href='<?php echo site_url('administrador/rol')?>'>Rol</a> | 
		<!--<a href='<?php echo site_url('examples/film_management_twitter_bootstrap')?>'>Twitter Bootstrap Theme [BETA]</a> | 
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a> -->
		
	</div> 
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>