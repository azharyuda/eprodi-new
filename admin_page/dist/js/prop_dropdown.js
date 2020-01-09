function cek_stat(obj){
  var value=obj.value;
if(value=="tidak"){
    $("#alasan").css('display','block');
    $("#lbl_alasan").css('display','block');
  }
  else{
    $("#alasan").css('display','none');
    $("#lbl_alasan").css('display','none');
  }

}
