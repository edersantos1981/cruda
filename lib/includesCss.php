<?php include_once '../vendor/autoload.php'; ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">        
<!-- Las librerías fontawesome no funcionan descargadas -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="../lib/mdb/css/addons/datatables.min.css">
<link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />        
<link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
<link rel="icon" href="../gui/favicon.ico" sizes="32x32 48x48" type="image/vnd.microsoft.icon" />
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" /> -->
<link rel="stylesheet" href="../lib/mdb/css/addons/buttons.dataTables.min.css" />

<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }            
</style>

<style>
    .columnaOpciones { 
        text-align: center; 
        width: 25%; 
    }
</style>

<style type="text/css">
    .dt-buttons {
        float: right !important;
    }        
    .dataTables_filter label {
        float: left !important;
    }
</style>