$(function() {


     var pgurl = window.location.href;

     $(".navigation ul li a").each(function(){

          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )

          $(this).addClass("active");
     });

     $('.delete').click(function(){
     	res = confirm('Do you want to delete this record?');
     	if(res == true){
     		return true;
     	}
     	return false;
     });

     $('time').timeago();
});