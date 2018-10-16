<!DOCTYPE html>
<html lang='en'>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="img/favicon.ico" />
		<?php if (isset($header)){?>
		<title><?=$header?></title>
		<?php }else{ ?>
		<title>Organes</title>
		<?php } if (isset($css)){?>
		<link rel="stylesheet" type="text/css" href="style/<?=$css?>.css?v=1">
		<?php } ?>
		<link rel="stylesheet" type="text/css" href="style/style.css?v=1">

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>