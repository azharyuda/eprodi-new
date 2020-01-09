
  function cek_ubah(obj){
    var value=obj.value;
  if(value=="ada"){
      $("#alasan_ubah").css('display','block');
      $("#lbl_ubah").css('display','block');
      $("#lbluji1").css('display','block');
      $("#dosenuji1").css('display','block');
      $("#lbluji2").css('display','block');
      $("#dosenuji2").css('display','block');

    }
    else{
      $("#alasan_ubah").css('display','none');
      $("#lbl_ubah").css('display','none');
      $("#lbluji1").css('display','none');
      $("#dosenuji1").css('display','none');
      $("#lbluji2").css('display','none');
      $("#dosenuji2").css('display','none');
  }
    }
