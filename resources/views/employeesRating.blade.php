@extends('layout')

@section('body')



<div id="rating">
   @include('rating') 
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>

        $(document).ready(function() {
         setInterval(function() {
           var page = window.location.href;
           $.ajax({
           type: 'GET' ,
           url: page ,
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data)
           {  
             $('#rating').html(data);         
           }
           });
         }, 2000);
       });
           </script>

@stop
