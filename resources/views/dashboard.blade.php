@extends('adminlte::page')

@section('title', 'User Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content_header')
    <h1>User Dashboard</h1>
@stop

@section('content')
<style>
.i-circle {
    color: #fff;
    padding: 5px 20px;
    border-radius: 50%;
    font-size: 35px;
    border: 2px solid #fff;
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">		
		jQuery(document).ready(function () {
			
			//LOADER SHOW
			jQuery('.content-grid-loader').show(); 
			
			//GET DATA
			getEmployeeData('employees.name','ASC');
			
			//LOADER HIDE
			jQuery('.content-grid-loader').hide();
			
			
			
		});
		
		function sortingFunction(listingOrder){
			
			var sortBy = jQuery('#sortBy').val();
			
			//LOADING MESSAGE
			jQuery('#users').text('Please Wait..');
			//LOADER SHOW
			jQuery('.content-grid-loader').show(); 
			
			//GET DATA
			getEmployeeData(sortBy,listingOrder);
			
			//LOADER HIDE
			jQuery('.content-grid-loader').hide();
		}
		
		
		//GET EMPLOYEE DATA
		function getEmployeeData(sortBy,listingOrder){
			
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				
			postData = {
				'_token': CSRF_TOKEN,
				'sortBy': sortBy,
				'listingOrder':listingOrder
			};
				var url = "{{ URL::to('/getAllEmployees') }}";
			
		
			//jQuery('.content-grid-loader').show();
			jQuery.ajax({
			  url: url,
			  type: 'POST',
			  data: postData,
			  dataType: 'JSON',
			  success: function (response) 
			  {
				 
				$("#users").html(response.html);
				
			  }
			});
		}
			
			
</script>      
	

<div id="users">Please wait....</div>    
   
@stop