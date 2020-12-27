
$(function() {
$("#sendchat").click(function() {
var text = $("#text").val();
var name = $("#name").val();
var reciever_id = $("#reciever_id").val();
var receiver_name =$("#receiver_name").val();
var dataString = 'text='+ text + '&name='+ name + '&reciever_id='+ reciever_id+ '&receiver_name='+ receiver_name;

if(text=='')
{
$("#errormes2").fadeIn( 500 );
$("#errormes2").fadeOut( 500 );
}
else
{
$.ajax({
type: "POST",
url: "Messageajax.php",
data: dataString,
beforeSend: function(){
$("#sendmessage").html("Sending Your Message");
  
},
success: function(){
$("#sendmessage").html("Send Message");
$('#text').val("");
setTimeout(function(){
$("html, body, .gist-body").animate({ scrollTop: 400000 }, 500);
},2000);
},

});
}
return false;
});
});

$(document).ready(function()
 {
  $.ajaxSetup({cache:false});
  setInterval(function() {$('.room-body').load('load_message.php');}, 500);
});

$(function() {
$("#sendmessage").click(function() {
var text = $("#text").val();
var name = $("#name").val();
var dataString = 'text='+ text + '&name='+ name;

if(text=='')
{
$("#errormes2").fadeIn( 500 );
$("#errormes2").fadeOut( 500 );
}
else
{
$.ajax({
type: "POST",
url: "chatajax.php",
data: dataString,
beforeSend: function(){
$("#sendmessage").html("Sending Your Message");
  
},
success: function(){
$("#sendmessage").html("Send Message");
$('#text').val("");
setTimeout(function(){
$("html, body, .gist-body").animate({ scrollTop: 400000 }, 500);
},500);
},

});
}
return false;
});
});

$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('Vconnect uploading profile pic');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-image').on('click', function (ev) {
  resize.croppie('result', {
  type: 'canvas',
  size: 'viewport'
}).then(function (img) {
  $.ajax({
    url: "/upload",
    type: "POST",
    data: {"image":img},
    beforeSend:function(){
      $('#loader').show();
    },
    success: function (data) {
      html = '<img src="' + img + '" />';
      $("#preview-crop-image").html(html);
      $('#loader').hide();
      $('#success_message').show();
      console.log('Vconnect profile photo changed');
    }
  });
});
});

