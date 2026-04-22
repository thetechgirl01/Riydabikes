

<!DOCTYPE html>
<html>
  <head>

    <title><?php echo e($settings->site_name); ?> Logistics Company | Invoice</title>
	
	<!-- Define Charset -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<!-- Page Description and Author -->
	<meta name="description" content="<?php echo e($settings->site_name); ?> "/>
	<meta name="keywords" content="<?php echo e($settings->site_name); ?>" />
	<meta name="author" content="Jaomweb">	
	
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=1200">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo e(asset('temp/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo e(asset('dash/css/print-invoice.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="barcode.js"></script>
	
	
<style>
	    
	    #background{
    position:absolute;
    z-index:0; 
    display:block;
    min-height:70%; 
    min-width:70%; 
}

#content{
    position:absolute;
    z-index:1;
}

#bg-text
{
    color:grey;
    font-size:36px;
    transform:rotate(300deg);
    -webkit-transform:rotate(300deg);
}
	    
	</style>
	
	
 


  </head>
        <?php echo $__env->yieldContent('content'); ?>


        <script src="<?php echo e(asset('temp/app.min.js')); ?>" type="text/javascript"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/layouts/invoice.blade.php ENDPATH**/ ?>