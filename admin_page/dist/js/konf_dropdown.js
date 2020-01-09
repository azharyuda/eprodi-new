
    function cek_syarat(obj){
      var value=obj.value;
      if(value=="y4"){
        $("#ruang").css('display','block');
        $("#lbl_ruang").css('display','block');
        $("#kurang").css('display','none');
        $("#lbl_syarat").css('display','none');
      }
      else{
        $("#lbl_ruang").css('display','none');
        $("#ruang").css('display','none');
        $("#kurang").css('display','block');
        $("#lbl_syarat").css('display','block');
      }
    }
