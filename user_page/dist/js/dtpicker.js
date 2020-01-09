var dateToday = new Date();
  $(function() {
   $( "#datepicker" ).datepicker({
    minDate: 0,
    dateFormat: "yy-mm-dd",
    dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
    dayNamesShort: ['Ming.','Sen.','Sel.','Rab.','Kam.','Jum.','Sab.'],
    dayNamesMin: ['M','S','S','R','K','J','S'],
    monthNames: ['Januari','Februari','Maret','April','Mei','Juni',
    'Juli','Agustus','September','Oktober','November','December'],
    monthNamesShort: ['Jan.','Feb.','Mar.','Apr.','Mei','Juni',
    'Juli','Agst.','Sept.','Okt.','Nov.','Des.'],
    minDate: 0
   });
 });
