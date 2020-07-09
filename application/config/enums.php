<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*******************************************
 *        List of Config Codes             *
 *******************************************/

/*******************************************
 *         	   Type Pages                  *
 *******************************************/
$config['Admin_Page'] = 1;
$config['Misc_Page'] = 2;

/*******************************************
 *            List of Pages                *
 *******************************************/
//---- Misc Sub Menu ----
$config['Login'] = "Masuk";
$config['ChangePassword'] = "Ganti Kata Sandi";
//---- Dashboard ----
$config['Dashboard'] = "Beranda";
$config['VTO'] = "Virtual Try On";
//---- Master Sub Menu ----
$config['Master'] = "Master";
$config['MasterUser'] = "Master User";

//---- Transaction Sub Menu ----
$config['Trans'] = "Transaksi";
$config['TransDataKacamata'] = "Data Kacamata";

$config['Settings'] = "Pengaturan";
$config['Account'] = "Akun";
$config['Logout'] = "Keluar";


/*******************************************
 *                Table List               *
 *******************************************/
$config['tbconfig'] = 'tb_config';
$config['tbglasses'] = 'tb_glasses';
$config['tblevel'] = 'tb_level';
$config['tbuser'] = 'tb_user';

/*******************************************
 *                View List                *
 *******************************************/
$config['viewlistglasses'] = 'view_list_glasses';
$config['viewlistlevel'] = 'view_list_level';
$config['viewlistuser'] = 'view_list_user';
/*******************************************
 *             Function List               *
 *******************************************/
/*******************************************
 *         Store Procedure List            *
 *******************************************/
$config['spgeneratecode'] = 'sp_generate_code';

/*******************************************
 *                 Status                  *
 *******************************************/
$config['Success'] = 'Sukses';
$config['Failed'] = 'Gagal';
$config['Error'] = 'Eror';
$config['Warning'] = 'Peringatan';
$config['Info'] = 'Informasi';

/*******************************************
 *                 Action                  *
 *******************************************/
$config['View'] = 'Lihat';
$config['Download'] = 'Unduh';
$config['Upload'] = 'Unggah';
$config['Save'] = 'Simpan';
$config['Email'] = 'Email';
$config['Whatsapp'] = 'Whatsapp';

/*******************************************
 *                Messages                 *
 *******************************************/
// Login
$config['InvalidUserPw'] = 'Username / Password salah.';
$config['EmptyUserPw'] = 'Username / Password tidak boleh kosong.';

// Dashboard
$config['Welcome'] = 'Selamat datang, ';

// Globals
$config['SuccessAdded'] = ' berhasil ditambahkan';
$config['SuccessSaved'] = ' berhasil disimpan';
$config['SuccessUpdated'] = ' berhasil diperbarui';
$config['SuccessDeleted'] = ' berhasil dihapus';
$config['AlreadyExists'] = ' sudah tersedia';
$config['IsUsed'] = ' sedang digunakan';
$config['IsNotActive'] = ' sedang tidak aktif';
$config['NotExists'] = ' tidak tersedia';
$config['FailedSaved'] = ' gagal menyimpan';

// Change Password
$config['WrongOldPw'] = 'Password lama salah';

/*******************************************
 *                Folder     	           *
 *******************************************/
$config['UploadPath'] = 'uploads/';
$config['ImageUploadPath'] = 'assets/img/';
$config['GlassesImageUploadPath'] = 'assets/img/glasses/';
$config['DownloadPath'] = 'downloads/';