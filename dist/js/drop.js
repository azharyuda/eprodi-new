function cek_skrip(obj){
  var value=obj.value;
  if(value=="tdk"){
    $("#tophide").css("display","none");
    $("#judhide").css("display","none");
    $("#doshide1").css("display","none");
    $("#doshide2").css("display","none");
    $("#sem").css("display","none");
    $("#uji1").css("display","none");
    $("#uji2").css("display","none");

  }
  else if(value=="y4"){
    $("#tophide").css("display","block");
    $("#judhide").css("display","block");
    $("#doshide1").css("display","block");
    $("#doshide2").css("display","block");
    $("#sem").css("display","block");
    $("#uji1").css("display","none");
    $("#uji2").css("display","none");
  }
  else{
    $("#tophide").css("display","none");
    $("#judhide").css("display","none");
    $("#doshide1").css("display","none");
    $("#doshide2").css("display","none");
    $("#sem").css("display","none");
    $("#uji1").css("display","none");
    $("#uji2").css("display","none");
  }
}
