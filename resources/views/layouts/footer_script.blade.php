<script>        
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
          swal({
              title:"",
              text:"{{ Session::get('message') }}", 
              icon:"info",
              timer: 3000,
              buttons: false
              });
              break;
          case 'warning': 
                 swal({
              title:"",
              text:"{{ Session::get('message') }}", 
              icon:"warning",
              timer: 3000,
              buttons: false
              });           
              break;
          case 'success':
                 swal({
              title:"",
              text:"{{ Session::get('message') }}", 
              icon:"success",
              timer: 3000,
              buttons: false
              });
              break;
  
          case 'error':
                 swal({
              title:"",
              text:"{{ Session::get('message') }}", 
              icon:"error",
              timer: 3000,
              buttons: false
              });
              break;
              case 'danger':
                swal({
              title:"",
              text:"{{ Session::get('message') }}", 
              icon:"error",
              timer: 3000,
              buttons: false
              });
              break;
      }
    @endif
  
  </script>
<script>
    $('.form_add_cart').submit(function(e){
	e.preventDefault();
    // alert('dd')
	$.ajax({
        url:$(this).attr('action'),
        type:"POST",
        data:$(this).serialize(),
        success:function(res){        	        	    
            swal({text:res.message,icon:"success",timer: 3000,buttons: false});
            $('.cart_count').html(res.quantity);            
            $('.minicart-total').html(res.total);
        },
        error:function(res){
        	swal({title:"",text:res.message, icon:"error",buttons: true});
        }
	});
})

function check_btn(){
    alert('a');
}

$(document).ready(function(){
    var country_arr = [];
    setInterval(function(){
        $( "#countryId option" ).each(function() {
            var countries = $( this ).val();
            if(countries!=''){
                country_arr.push(countries);
                // console.log(countries);
            }
        }); 
    }, 3000);            
})

function show_modal(id){
    var id = id;
    $.post("{{url('quick_view')}}",{id:id},function(data){
        $.fancybox.open(data);        
    });

}

// quantity start
// $(document).ready(function() {

// $('.minus').click(function () {
//         var $input = $(this).parent().find('input[name=quantity]');
//         var count = parseInt($input.val()) - 1;        
//         count = count < 1 ? 1 : count;
//         $input.val(count);
//         $input.change();
//         return false;
// });

// $('.plus').click(function () {
//         var $input = $(this).parent().find('input[name=quantity]');
//         $input.val(parseInt($input.val()) + 1);            
//         $input.change();
//         return false;
// });

// });

// // quantity end

</script>