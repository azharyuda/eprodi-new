
  function cek_seminar(obj){
    var value=obj.value;
  if(value=="yes"){
      $("#alasan_ubah").css('display','block');
      $("#alasan").css('display','block');
      $("#dosen").css('display','block');
      $("#dosen_drop").css('display','block');

    }
    else{
      $("#alasan_ubah").css('display','none');
      $("#alasan").css('display','none');
      $("#dosen").css('display','none');
      $("#dosen_drop").css('display','none');
  }
    }
