jQuery.validator.addMethod("notEqual", function(value, element, param) {
  return this.optional(element) || value != param;
}, "Please specify a different (non-default) value");

$.validator.addMethod('lettersonly', function(value) {
    return value.match(/^[a-zA-Z\s['.,\\\]"-]+$/);
}, 'You must use only lowercase letters and symbols in your entry');

$(document).ready(function(){
	$('#frm-dsn').validate({
    rules: {
            _NIDN: {
              digits: true,
              maxlength: 10,
              minlength: 10,
              required: true,
              remote: "dosen_file/validate.php"

            },
            _nm_dosen: {
              required: true,
              lettersonly: true

            },
            _kuota_pembimbing1: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2

            },
            _kuota_pembimbing2: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2
            },
            _kuota_penguji1: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2
            },
            _kuota_penguji2: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2
            },
            _penguji1_kkpi: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2
            },
            _penguji2_kkpi: {
              required: true,
              digits: true,
              minlength: 1,
              maxlength: 2
            }
					},
            messages: {
              _NIDN: {
                digits: "Hanya boleh angka",
                maxlength: "Maksimal 10 digit",
                minlength: "Minimal 10 digit",
                required: "Harus diisi",
                remote: "NIDN Sudah terdaftar"

              },
              _nm_dosen: {
                required: "harus diisi",
                lettersonly: "tidak boleh angka"

              },
              _kuota_pembimbing1: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              },
              _kuota_pembimbing2: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              },
              _kuota_penguji1: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              },
              _kuota_penguji2: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              },
              _penguji1_kkpi: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              },
              _penguji2_kkpi: {
                required: "harus diisi",
                digits: "hanya boleh angka",
                minlength: "Minimal digit adalah 1",
                maxlength: "Maksimal digit adalah 2"
              }
						}
					});
  	$('#frm-top').validate({
      rules: {
              _idtopik: {
                lettersonly: true,
                remote: "skripsi_file/skripsi_topik/validate.php",
                required: true
              },

              _topik: {
                lettersonly: true,
                required: true
              }
            },
            messages: {
              _idtopik: {
                lettersonly: "Tidak boleh angka",
                remote: "ID Topik sudah ada",
                required: "Tidak Boleh kosong!"
              },

              _topik: {
                lettersonly: "Tidak boleh angka",
                required: "Tidak boleh Kosong!"
              }
            }

    });
    $('#frm-surat').validate({
      rules: {
        _nosurat: {
          required: true
        }
      },
      messages: {
        _nosurat: {
        required: "Data harus diisi!"
      }
    }
    });
	$('#frm-sem').validate({
		rules: {

			_cek: {
				required: true
			},
			_syarat: {
				required: true
			},
			_dosen_ubah: {
				required: true
			},
			_dosen_ujisetuju: {
				required: true
			},
			_alasan_ubah: {
				required: true
			},
			_syarat_kurang: {
				required: true
			}
		},
			messages: {
				_cek: {
					required: "Data tidak boleh kosong"
				},
				_syarat: {
					required: "Data tidak boleh kosong"
				},
				_dosen_ubah: {
					required: "Data tidak boleh kosong"
				},
				_dosen_ujisetuju: {
					required: "Data tidak boleh kosong"
				},
				_alasan_ubah: {
					required: "Data tidak boleh kosong"
				},
				_syarat_kurang: {
					required: "Data tidak boleh kosong"
				}
			}
	});
	$('#frm-kkpi').validate({
		rules: {
			_cek: {
				required: true
			},
			_syarat: {
				required: true
			},
			_dosen_ubah: {
				required: true
			},
			_dosenuji1: {
				required: true
			},
			_dosenuji2: {
				required: true
			},
			_alasan_ubah: {
				required: true
			},
			_syarat: {
				required: true
			}
		},
		messages: {
			_cek: {
				required: "Data tidak boleh kosong!"
			},
			_syarat: {
				required: "Data tidak boleh kosong!"
			},
			_dosen_ubah: {
				required: "Data tidak boleh kosong!"
			},
			_dosenuji1: {
				required: "Data tidak boleh kosong!"
			},
			_dosenuji2: {
				required: "Data tidak boleh kosong!"
			},
			_alasan_ubah: {
				required: "Data tidak boleh kosong!"
			},
			_syarat: {
				required: "Data tidak boleh kosong!"
			}
		}
	});
	$('#frm-tgl').validate({
		rules: {
			_konf: {
				required: true
			},
			_ruangan: {
				required: true,
				digits: true,
				maxlength: 2,
				minlength: 1
			},
			_kurang: {
				required: true
			}
	},
	messages: {
		_konf: {
			required: "Data tidak boleh kosong!"
		},
		_ruangan: {
			required: "Data tidak boleh kosong!",
			digits: "Data harus angka!",
			maxlength: "Maksimal 2 digit!",
			minlength: "Minimal 1 Digit!"
		},
		_kurang: {
			required: "Data tidak boleh kosong!"
		}
	}
});

$('#frm-konfprop').validate({
				rules: {
					_status_prop: {
						required: true,
					},
					_bagian_revisi: {
						required: true
					},
					_alasan: {
						required: true
					},
					_ubahdosen: {
						required: true,
					},
					_bimbing1: {
						required: true,
						notEqualTo: "#bing2",
					},
					_bimbing2: {
						required: true,
						notEqualTo: "#bing1",
					},
					_alasan_ubahdosen: {
						required: true
					}
			},
			messages: {
					_status_prop: {
						required: "Data tidak boleh kosong!",
					},
					_bagian_revisi: {
						required: "Data tidak boleh kosong!"
					},
					_alasan: {
						required: "Data tidak boleh kosong!"
					},
					_ubahdosen: {
						required: "Data tidak boleh kosong!",
					},
					_bimbing1: {
						required: "Data tidak boleh kosong!",
						notEqualTo: "Data dosen tidak boleh sama!",
					},
					_bimbing2: {
						required: "Data tidak boleh kosong!",
						notEqualTo: "Data dosen tidak boleh sama!",
					},
					_alasan_ubahdosen: {
						required: "Data tidak boleh kosong!"
					}
			}
    });
    $('#frm-ubahjdl').validate({
      rules: {
        _status: {
          required: true,
        },
        _usul: {
          required: true
        },
        _alasanubah:{
          required: true
        }
      },
      messages: {
        _status: {
          required: "Data tidak boleh kosong!",
        },
        _usul: {
          required: "Data tidak boleh kosong!"
        },
        _alasanubah:{
          required: "Data tidak boleh kosong!"
        }
      }
    });
    $('#konf-akun').validate({
      rules: {
        _status_akun: {
          required: true
        },
        _kurang: {
          required: true
        }
      },
      messages: {
        _status_akun: {
          required: "Harus Diisi",

        },
        _kurang: {
          required: "Harus Diisi"
        }
      }
    });
    $('#skrip-lama').validate({
      rules: {
        _NIM: {
          required: true,
          digits: true,
          minlength: 7,
          remote: "skripsi_file/skripsi_lama/validate.php",
          maxlength: 7
        },
        _nm_mhs: {
          required: true,
          lettersonly: true,
          minlength: 10,
          maxlength: 50
        },
        _tpk: {
          required: true
        },
        _judul: {
          required: true
        }
      },
      messages: {
        _NIM: {
          required: "Harus Diisi",
          digits: "Harus Diisi Angka",
          minlength: "Minimal digit adalah 7",
          remote: "NIM Sudah terdaftar",
          maxlength: "Maksimal digit adalah 7"
        },
        _nm_mhs: {
          required: "Harus Diisi",
          lettersonly: "Hanya diisi dengan huruf",
          minlength: "Panjang nama minimal 10 digit",
          maxlength: "Panjang nama maksimal 50 digit"
        },
        _tpk: {
          required: "Harus Diisi"
        },
        _judul: {
          required: "Harus Diisi"
        }
      }
    });
    $('#ubah-pass').validate({
      rules: {
        _lama: {
          required: true,
          minlength: 8,
          maxlength: 20
        },
        _passw: {
          required: true,
          minlength: 8,
          maxlength: 20,
          notEqualTo: "#passlama"
        },
        _konf: {
          required: true,
          minlength: 8,
          maxlength: 20,
          equalTo: "#passbaru"
        }
      },
      messages: {
        _lama: {
          required: "Harus Diisi!",
          minlength: "Minimal 8 digit",
          maxlength: "Maksimal 20 digit"
        },
        _passw: {
          required: "Harus Diisi!",
          minlength: "Minimal 8 digit",
          maxlength: "Maksimal 20 digit",
          notEqualTo: "Password tidak boleh sama dengan password lama"
        },
        _konf: {
          required: "Harus Diisi!",
          minlength: "Minimal 8 digit",
          maxlength: "Maksimal 20 digit",
          equalTo: "Password tidak sama dengan password baru!"
        }
      }
    });
  });
