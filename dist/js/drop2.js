
function cek_seminar(obj){
  var value=obj.value;
  if(value=="belum"){
    $("#uji1").css("display","none");
    $("#uji2").css("display","none");
  }
  else if(value=="sem1"){
    $("#uji1").css("display","block");
    $("#uji2").css("display","none");
  }
  else if(value=="sem2"){
    $("#uji1").css("display","block");
    $("#uji2").css("display","block");
  }
  else{
    $("#uji1").css("display","none");
    $("#uji2").css("display","none");
  }
}
