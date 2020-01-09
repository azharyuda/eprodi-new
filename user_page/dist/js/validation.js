jQuery.validator.addMethod("notEqual", function(value, element, param) {
  return this.optional(element) || value != param;
}, "Please specify a different (non-default) value");


$(document).ready(function() {
	$('#frm-kkpi').validate({
    rules: {
			_judul: {
					minlength: 20,
					maxlength: 200,
					required: true,
					pattern: "^[a-zA-Z1-9 /s]+$"
				},
				_pilihan: {
					required: true
				},
				_dosenuji1: {
					required: true,
					notEqualTo: "#uji2"
				},
				_dosenuji2: {
					required: true,
					notEqualTo: "#uji1"
				}
			},
			messages: {
				_judul: {
						minlength: "Panjang judul minimal 20 kata",
						maxlength: "Panjang Judul maksimal 200 kata",
						required: "Judul harus Diisi",
						pattern: "Judul hanya dapat diinput dengna huruf dan angka"
					},
					_pilihan: {
						required: "Pilih Tugas yang diambil"
					},
					_dosenuji1: {
						required: "Pilih Usulan Dosen Penguji 1",
						notEqualTo: "Usulan Dosen Penguji 1 tidak boleh sama dengan dosen penguji 2"
					},
					_dosenuji2: {
						required: "Pilih Dosen Penguji 2",
						notEqualTo: "Usulan Dosen Penguji 2 tidak boleh sama dengan dosen penguji 1"
					}
			}
		});

    $('#frm-prop').validate({
      rules: {
        _judul: {
            minlength: 20,
            maxlength: 400,
            required: true,
            pattern: "^[a-zA-Z1-9 /s]+$"
          },
          _topik: {
            required: true,
            pattern: "^[a-zA-Z /s]+$"
          },
          _dosbing1: {
            required: true,
            notEqualTo: "#bimbing2"
          },
          _dosbing2: {
            required: true,
            notEqualTo: "#bimbing1"
          },
          _file_proposal: {
            required: true,
            extension: "zip|doc|docx"
          }
        },
        messages: {
          _judul: {
              minlength: "Panjang judul minimal 20 kata",
              maxlength: "Panjang Judul maksimal 400 kata",
              required: "Judul harus Diisi",
              pattern: "Judul hanya dapat diinput dengna huruf dan angka"
            },
            _topik: {
              required: "Topik tidak boleh kosong!",
              pattern: "Topik hanya dapat diinput dengan huruf!"
            },
            _dosbing1: {
              required: "Usulan Dosen Pembimbing harus diisi!",
              notEqualTo: "Usulan Dosen Pembimbing 1 tidak boleh sama dengan Dosen Pembimbing 2"
            },
            _dosbing2: {
              required: "Usulan Dosen Pembimbing harus diisi!",
              notEqualTo: "Usulan Dosen Pembimbing 2 tidak boleh sama dengan Dosen Pembimbing 1"
            },
            _file_proposal: {
              required: "File harus diupload!",
              extension: "Extensi File Salah! harus berupa doc, docx, atau zip!"
            }
        }
      });

      $('#frm-ubah').validate({
        rules: {
          _judul: {
              minlength: 20,
              maxlength: 400,
              required: true,
              pattern: "^[a-zA-Z1-9 /s]+$",
              remote: "proposal_file/validate.php"
            },
            _alasan: {
              required: true,
              pattern: "^[a-zA-Z /s]+$"
          }
        },
          messages: {
            _judul: {
                minlength: "Panjang judul minimal 20 kata",
                maxlength: "Panjang Judul maksimal 400 kata",
                required: "Judul harus Diisi",
                pattern: "Judul hanya dapat diinput dengna huruf dan angka",
                remote: "Judul yang baru tidak berbeda dengan yang lama"
              },
              _alasan: {
                required: "Alasan tidak boleh kosong!",
                pattern: "^[a-zA-Z /s]+$"
              }
          }
        });

        $('#frm-sempro').validate({
          rules: {
              _dosenuji1: {
                required: true,
              }
            },
            messages: {
                _dosenuji1: {
                  required: "Pilih Usulan Dosen Penguji 1",
                }
              }
          });

    $('#frm-tgl').validate({
      rules: {
  			_tglseminar: {
  					dateISO: true,
            required: true
  				},
  				_jam: {
  					required: true
  				}
  			},
  			messages: {
          _tglseminar: {
    					dateISO: "Masukkan Tanggal Seminar yang benar!",
              required: "Tanggal Seminar harus diisi!"
    				},
    				_jam: {
    					required: "Jam seminar tidak boleh kosong!"
    				}
  			}
  		});


$('[name^="_file_persyaratan"]').each(function() {
$(this).rules('add', {
		required: true,
		extension: "zip|jpg|jpeg",
		messages: {
		required: "Input Persyaratan!",
		extension: "Ekstensi file salah!",
}
})
});

$('[name^="_persyaratan"]').each(function() {
$(this).rules('add', {
		required: true,
		extension: "jpg|jpeg",
		messages: {
		required: "Input Persyaratan!",
		extension: "Ekstensi file salah!",
}
})
});
$('[name^="_syarat"]').each(function() {
$(this).rules('add', {
		required: true,
		extension: "zip|jpg|jpeg",
		messages: {
		required: "Input Persyaratan!",
		extension: "Ekstensi file salah!",
}
})
});
});
