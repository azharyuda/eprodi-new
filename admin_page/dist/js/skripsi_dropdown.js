function cek_status(obj){
  var value=obj.value;
  if(value=="revisi"){
    $("#bagian_revisi").css('display','block');
    $("#lbl_revisi").css('display','block');
    $("#ala").css('display','block');
    $("#alas").css('display','block');
    $("#dos").css('display','block');
    $("#lbldos").css('display','block');
    $("#alasan").css('display','none');
    $("#lbl_alasan").css('display','none');

  }
  else if(value=="tidak"){
    $("#bagian_revisi").css('display','none');
    $("#lbl_revisi").css('display','none');
    $("#alasan").css('display','block');
    $("#lbl_alasan").css('display','block');
    $("#dos").css('display','none');
    $("#lbldos").css('display','none');
  }
  else{
    $("#bagian_revisi").css('display','none');
    $("#alasan").css('display','none');
    $("#lbl_revisi").css('display','none');
    $("#lbl_alasan").css('display','none');
    $("#dos").css('display','block');
    $("#lbldos").css('display','block');
        $("#ala").css('display','none');
    $("#alas").css('display','none');
  }

}
