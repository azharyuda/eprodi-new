jQuery.validator.addMethod("notEqual", function(value, element, param) {
  return this.optional(element) || value != param;
}, "Please specify a different (non-default) value");

$.validator.addMethod('lettersonly', function(value) {
    return value.match(/^[a-zA-Z\s['.,\\\]"-]+$/);
}, 'You must use only lowercase letters and symbols in your entry');

$(document).ready(function(){
	$('#frm-dftr').validate({
    rules: {
            _nim: {
              digits: true,
              minlength: 7,
              maxlength: 7,
							required: true,
							remote: "validate.php"
            },
            _nm_mahasiswa: {
              required: true,
              maxlength: 50,
              minlength: 10,
              lettersonly: true
            },
            _passw: {
              required: true,
              maxlength: 20,
              minlength: 8,
            },
            _email: {
              required: true,
              email: true,
              remote: "validate_email.php"
            },
            _skrip: {
              required: true
            },
            _topik_skrip: {
              required: true
            },
            _judul_skripsi: {
              required: true
            },
            _seminar: {
              required: true
            },
            _dosen_wali: {
              required: true
            },
            _dosen_uji1: {
              required: true,
            },
            _dosen_uji2: {
              required: true,
            },
						_dosbing1:{
							required: true,
						},
						_dosbing2:{
							required: true,
						},
            _file: {
              required: true,
              extension: "jpg|jpeg"
            }
					},
            messages: {
              _nim: {
							  remote: "NIM Sudah Terdaftar. Silahkan lakukan login di <a href='login.php'>sini</a>",
                digits: "NIM hanya dapat diinput dengan angka",
                maxlength: "Maksimal digit adalah 7",
                minlength: "Minimal digit adalah 7",
                required: "NIM Harus Diisi!"
              },
							_dosbing1:{
                required: "Data Tidak Boleh Kosong"
							},
							_dosbing2:{
								required: "Data Tidak Boleh Kosong"
							},
              _nm_mahasiswa: {
                required: "Nama Harus Diisi!",
                maxlength: "Maksimal Panjang nama adalah 50",
                minlength: "Masukkan Nama Minimal 10 huruf",
                lettersonly: "Hanya boleh memasukkan nama!"
              },
              _passw: {
                required: "Password Harus Diisi",
                maxlength: "Panjang Password Maksimal 20",
                minlength: "Panjang Password Minimal 8"
              },
              _email: {
                required: "Email harus diisi",
                email: "Format email tidak sesuai!",
                remote: "Email sudah terdaftar!"
              },
              _skrip: {
                required: "Combo harus dipilih!"
              },
              _topik_skrip: {
                required: "Combo harus dipilih!"
              },
              _judul_skripsi: {
                required: "Judul harus diisi!"
              },
              _seminar: {
                required: "Combo harus dipilih!"
              },
              _dosen_wali: {
                required: "Combo harus dipilih!"
              },
              _dosen_uji1: {
                required: "Data Dosen Penguji 1 Harus diisi!",
              },
              _dosen_uji2: {
                required: "Data Dosen Penguji 2 Harus diisi!",
              },
						}
					})
				});
