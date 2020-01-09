
    function cek_konf(obj){
      var value=obj.value;
      if(value=="y4"){
        $("#lbl_alasan").css('display','none');
        $("#alasan").css('display','none');
      }
      else{
        $("#lbl_alasan").css('display','block');
        $("#alasan").css('display','block');
      }
    }
