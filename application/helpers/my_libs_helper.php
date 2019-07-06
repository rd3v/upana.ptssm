<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_image')) {
    function upload_image($files, $method, $folder, $image_name, $error_data, $required = FALSE, $pagepath = ADMINPAGE.'/_layout/wrapper') {
        $CI =& get_instance();

        $file = is_array($files) ? $files[0] : $files;

        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']      = upload_path($folder);
            $config['allowed_types']    = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']     = TRUE;
            $config['overwrite']        = TRUE;
            $config['max_size']         = '2048'; // KB
            $CI->load->library('upload', $config);

            if (!file_exists(upload_path($folder))) {
                mkdir(upload_path($folder), 0777, TRUE);
            }

            if (!$CI->upload->do_upload($file)) {
                $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
                $CI->load->view($pagepath, $error_data);
                return FALSE;
            } else { // Jika upload gambar berhasil
                if ($method == 'edit') {
                    // Hapus gambar lama
                    if ($image_name != '') {
                        unlink(upload_path($folder).$image_name);
                        unlink(upload_path($folder).'thumbs/'.$image_name);
                    }
                }

                // Image Editor
                $upload = array('upload_data' => $CI->upload->data());
                $gambar = $upload['upload_data']['file_name'];

                $config['image_library']    = 'gd2';
                $config['source_image']     = upload_path($folder).$gambar;
                $config['quality']          = "100%";

                if (is_array($files)) {
                    $config['maintain_ratio']   = FALSE;
                    $config['width']            = intval($files[1]->width);
                    $config['height']           = intval($files[1]->height);
                    $config['x_axis']           = intval($files[1]->x);
                    $config['y_axis']           = intval($files[1]->y);

                    $CI->load->library('image_lib', $config, 'crop');

                    if (!$CI->crop->crop()) {
                        unlink(upload_path($folder).$gambar);
                        $error_data['error_upload'] = $CI->crop->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }

                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = $files[1]->default_width;
                    $config['height']           = $files[1]->default_width;

                    $CI->load->library('image_lib', $config, 'cresize');

                    if (!$CI->cresize->resize()) {
                        unlink(upload_path($folder).$image_name);
                        $error_data['error_upload'] = $CI->cresize->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }
                }

                $config['maintain_ratio']   = TRUE;
                $config['new_image']        = upload_path($folder).'thumbs/';
                $config['create_thumb']     = TRUE;
                $config['thumb_marker']     = '';
                $config['width']            = 300;
                $config['height']           = 220;

                $CI->load->library('image_lib', $config, 'resize');

                if (!$CI->resize->resize()) {
                    unlink(upload_path($folder).$image_name);
                    $error_data['error_upload'] = $CI->resize->display_errors('<i style="color: red;">', '</i>');
                    $CI->load->view($pagepath, $error_data);
                    return FALSE;
                }

                return $gambar;
            }
        } else if ($required) {
            $lang = $CI->config->item('language');
            $CI->lang->load('upload_lang', $lang);
            $error_data['error_upload'] = '<i style="color: red;">'.$CI->lang->line('upload_no_file_selected').'</i>';
            $CI->load->view($pagepath, $error_data);
            return FALSE;
        } else return $image_name;
    }
}

if (!function_exists('upload_file_api')) {
    function upload_file_api($file, $folder, $method, $cfilename, $nfilename, $required) {
        $CI = get_instance();
        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']              = upload_path($folder);
            $config['allowed_types']            = 'jpg|png|jpeg|pdf|doc|docx';
            $config['file_name']                = is_array($nfilename) ? '' : str_replace('.', '', $nfilename);
            $config['encrypt_name']             = is_array($nfilename);
            $config['overwrite']                = FALSE;
            $config['max_filename_increment']   = 1000;
            $config['file_ext_tolower']         = TRUE;
            $config['max_size']                 = '10240'; // KB
            $CI->load->library('upload', $config);

            if (!file_exists(upload_path($folder))) {
                mkdir(upload_path($folder), 0777, TRUE);
            }

            if (!$CI->upload->do_upload($file)) {
                return array('success' => FALSE, 'message' => $CI->upload->display_errors('', ''));
            } else { // Jika upload file berhasil
                if ($method == 'edit') {
                    // Hapus file lama
                    if ($cfilename != '' AND file_exists(upload_path($folder).'/'.$cfilename)) unlink(upload_path($folder).'/'.$cfilename);
                }

                $upload = array('upload_data' => $CI->upload->data());
                $file = $upload['upload_data']['file_name'];
                return array('success' => TRUE, 'message' => $file);
            }
        } else {
            if ($required) return array('success' => FALSE, 'message' => 'File must be attached!');
            else return array('success' => TRUE, 'message' => $cfilename);
        }
    }
}

if (!function_exists('view_error')) {
    function view_error($judul = '404 Page Not Found', $page_type = ADMIN_URL, $error_type = 404, $accessed_by = ['0', '99999999']) {
        $CI =& get_instance();

        if ($error_type == 403) {
            $content = 'Halaman "<b>'.$judul.'</b>" ';

            if ($accessed_by[0]) $content .= 'diatur agar tidak bisa diakses oleh:<br/>';
            else {
                $admin = $CI->crud->gd('users', ['id_user' => '99999999']);
                $content .= ' hanya bisa diakses oleh:<br/><br/><b>'.$admin->fullname.' ('.$admin->position.')</b>';
            }

            for ($i = 1; $i < sizeof($accessed_by); $i++) {
                $user = $CI->crud->gd('users', ['id_user' => $accessed_by[$i]]);
                $content .= '<br/><b>'.($user ? $user->fullname.' ('.$user->position.')' : '').'</b>';
            }
        } else $content = '';

        $view = array(
            'title'     => $judul,
            'isi'       => $page_type.'/_error/'.(string)$error_type,
            'settings'  => $CI->settings,
            'error'     => $error_type,
            'content'   => $content
        );

        $CI->output->set_status_header($error_type);
        $CI->load->view($page_type.'/_layout/wrapper', $view);

        return;
    }
}

if (!function_exists('acak_id')) {
    function acak_id($table, $pk, $alias = FALSE) {
        $CI =& get_instance();
        $CI->load->helper('string');
        $id = 0;

        do {
            $id = mt_rand(1,9).random_string('numeric', 7);
            if ($alias) $slug = random_string('alnum', 100);
            else $slug = random_string('alnum', 4);
        } while ($CI->crud->cw($table, array($pk => $id)) > 0);

        return array('id' => $id, 'slug' => $slug);
    }
}

if (!function_exists('debug')) {
    function debug()
    {
        $numArgs = func_num_args();

        echo 'Total Arguments:' . $numArgs . "\n";

        $args = func_get_args();
        echo '<pre>';
        foreach ($args as $index => $arg) {
            echo 'Argument ke-' . $index . ':'. "\n";
            var_dump($arg);
            echo "\n";
            unset($args[$index]);
        }
        echo '</pre>';
        die();
    }
}

if (!function_exists('do_rcopy')) {
    function do_rcopy($src, $dst) {
        $dir = opendir($src);
        if (!file_exists($dst)) mkdir($dst, 0777, TRUE);

        while(false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src.'/'.$file)) {
                    do_rcopy($src.'/'.$file, $dst.'/'.$file);
                } else {
                    copy($src.'/'.$file, $dst.'/'.$file);
                }
            }
        }

        closedir($dir);
    }
}

if (!function_exists('do_rrmdir')) {
    function do_rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);

            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object)) do_rrmdir($dir."/".$object);
                    else unlink($dir."/".$object);
                }
            }

            rmdir($dir);
        }
    }
}

if (!function_exists('do_zip')) {
    function do_zip($src, $dst, $del = FALSE) {
        // Get real path for our folder
        $rootPath = realpath($src);

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($dst.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Initialize empty "delete list"
        $filesToDelete = array();
        $dirsToDelete = array();

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // $filePath = $file->getRealPath();
            $filePath = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $file->getRealPath());
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);

                // Add current file to "delete list"
                // delete it later cause ZipArchive create archive only after calling close function and ZipArchive lock files until archive created)
                // if ($file->getFilename() != 'important.txt') {
                    $filesToDelete[] = $filePath;
                // }
            } else {
                $dirsToDelete[] = $filePath;
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();

        if ($del) {
            // Delete all files from "delete list"
            foreach ($filesToDelete as $file) {
                unlink($file);
            }

            foreach (array_reverse($dirsToDelete) as $dir) {
                @rmdir($dir);
            }
        }

        return $dst.'.zip';
    }
}

if (!function_exists('do_unzip')) {
    function do_unzip($src, $dst, $del = FALSE) {
        // get the absolute path to $src
        $path = pathinfo(realpath($dst), PATHINFO_DIRNAME);

        $zip = new ZipArchive;
        $res = $zip->open($src);

        if ($res === TRUE) {
            $zip->extractTo($path);
            $zip->close();

            if ($del) unlink($src);

            return TRUE;
        } else {
            return FALSE;
        }
    }
}

if (!function_exists('surat_unik')) {
    function surat_unik($tb, $pk) {
        $CI =& get_instance();

        $surat_unik = 'is_unique['.$tb.'.no_surat]|';
        if ($CI->input->post($pk, TRUE)) {
            $unik = $CI->crud->gd($tb, [$pk => $CI->input->post($pk, TRUE)]);
            if ($unik) {
                if ($unik->no_surat == $CI->input->post('no_surat', TRUE)) $surat_unik = '';
            }
        }

        return $surat_unik;
    }
}

if (!function_exists('alamat')) {
    function alamat($data, $uppercase = FALSE, $level = 3, $leader = FALSE) {
        $wilayah = explode('.', $data->kode_wilayah);

        $deskel = ($wilayah[3] < 2000 ? 'Kelurahan ' : 'Desa ').$data->desa;
        $kecamatan = ' Kecamatan '.$data->kecamatan;
        $kabkota = ($wilayah[1] < 70 ? ' Kabupaten ' : ' Kota ').$data->kabkota;
        $provinsi = ' Provinsi '.$data->provinsi;

        switch ($level) {
            case 1: $output = ''; break;
            case 2: $output = $kecamatan; break;
            case 3: $output = $kecamatan.$kabkota; break;
            default: $output = $kecamatan.$kabkota.$provinsi; break;
        }

        if ($uppercase) array_push($wilayah, strtoupper($deskel.$output));
        else array_push($wilayah, $deskel.$output);

        $pimpinan = array(
            ($wilayah[3] < 2000 ? 'Lurah ' : 'Kepala Desa ').$data->desa.($leader ? $output : ''),
            'Camat '.$data->kecamatan,
            ($wilayah[1] < 70 ? 'Bupati ' : 'Walikota ').$data->kabkota,
            'Gubernur '.$data->provinsi
        );

        array_push($wilayah, $pimpinan);

        return $wilayah;
    }
}

if (!function_exists('get_ttd')) {
    function get_ttd() {
        $CI =& get_instance();

        $tgl = ($CI->input->get('tgl', TRUE) ? $CI->input->get('tgl', TRUE) : date('Y-m-d'));
        $id_ttd = ($CI->input->get('ttd', TRUE) ? $CI->input->get('ttd', TRUE) : '1');
        $ttd = $CI->crud->gd('buku_aparat_pemerintah_desa', ['urutan' => $id_ttd]);

        if ($ttd) $ttd->tgl = $tgl;
        else $ttd = (Object) ['urutan' => '1', 'nama' => '_________________', 'jabatan' => '_________________', 'tgl' => $tgl];

        return $ttd;
    }
}

if (!function_exists('pbb_dibayar')) {
    function pbb_dibayar($data, $pbb_treshold) {
        $njop_bumi = $data->njop_bumi === '' ? 0 : $data->njop_bumi;
        $njop_bangunan = $data->njop_bangunan === '' ? 0 : $data->njop_bangunan;
        $faktor_pengurang = $data->faktor_pengurang === '' ? 0 : $data->faktor_pengurang;
        $njop_bumi_tot = $data->luas_bumi * $njop_bumi;
        $njop_bangunan_tot = $data->luas_bangunan * $njop_bangunan;
        $njop_utang = (($njop_bumi_tot + $njop_bangunan_tot - $data->njop_tkp) / 1000) ? (($njop_bumi_tot + $njop_bangunan_tot - $data->njop_tkp) / 1000) : 0;
        $pbb_dibayar = ($njop_utang - $faktor_pengurang) < $pbb_treshold ? $pbb_treshold : ($njop_utang - $faktor_pengurang);

        return $pbb_dibayar;
    }
}

if (!function_exists('update_sitemap')) {
    function update_sitemap() {
        $CI =& get_instance();

        $view = array();

        $file = $CI->load->view(HOMEPAGE.'/sitemap', $view, TRUE);
        file_put_contents('./sitemap.xml', $file);
    }
}

if (!function_exists('hapus_cache')) {
    function hapus_cache($uri) {
        $CI =& get_instance();

        for ($i = 0; $i < sizeof($uri); $i++) {
            $CI->output->delete_cache($uri[$i]);

            if ($uri[$i] == '/blog') {
                $jml = $CI->crud->cw('blog', array('status' => 'Publish'));

                for ($j = 2; $j <= ceil($jml / 5) ; $j++) {
                    $CI->output->delete_cache('/blog?p='.$j);
                }
            }
        }
    }
}

if (!function_exists('get_youtube_details')) {
    function get_youtube_details($ytid, $detail = 'title') {
        if (!isset($GLOBALS['youtube_details'][$ytid])) {
            $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ytid . '&format=json'); //get JSON video details
            $GLOBALS['youtube_details'][$ytid] = json_decode($json, true); //parse the JSON into an array
        }

        return $GLOBALS['youtube_details'][$ytid][$detail]; //return the requested video detail
    }
}

if (!function_exists('prettify_tags')) {
    function prettify_tags($tags, $link = FALSE, $url = NULL) {
        $temp = explode(',', trim($tags, ','));
        $tags = '';

        for ($i = 0; $i < sizeof($temp); $i++) {
            $tag = $link ? '<a href="'.$url.$temp[$i].'">'.ucwords($temp[$i]).'</a>' : ucwords($temp[$i]);
            $tags .= $tag.', ';
        }

        return trim($tags, ', ');
    }
}

if (!function_exists('waktu')) {
    function waktu($wkt) {
        $jam = substr($wkt, 0, 2);
        $menit = substr($wkt, 3, 2);

        if ($jam < 12) {
            $AMPM = "AM";
            if ($jam == 0) $jam = 12;
        } else {
            $AMPM = "PM";
            if ($jam != 12) $jam = $jam-12;
        }

        return $jam.':'.$menit.' '.$AMPM;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tgl, $upper = FALSE) {
        if ($tgl == "0000-00-00") return "-";
        else {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = get_bulan(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);

            if ($upper) return strtoupper($tanggal.' '.$bulan.' '.$tahun);
            else return $tanggal.' '.$bulan.' '.$tahun;
        }
    }
}

if (!function_exists('tgl_db')) {
    function tgl_db($tgl, $todb = FALSE) {
        if (substr($tgl, 2, 1) == '/') { // ini format mm/dd/yyyy
            $bulan = substr($tgl, 0, 2);
            $tanggal = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);
            return $tahun.'-'.$bulan.'-'.$tanggal;
        } else {
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            return $bulan.'/'.$tanggal.'/'.$tahun;
        }
    }
}

if (!function_exists('format_tgl')) {
    function format_tgl($tgl, $indo) {
        if (substr($tgl, 2, 1) == '-') { // ini format dd-mm-yyyy
            $tanggal = substr($tgl, 0, 2);
            $bulan = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);

            return $tahun.'-'.$bulan.'-'.$tanggal;
        } else if (substr($tgl, 4, 1) == '-') { // ini format yyyy-mm-dd
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            $waktu = substr($tgl, 11, 8);

            return $indo ? $tanggal.' '.get_bulan($bulan).' '.$tahun.', '.waktu($waktu) : $tanggal.'-'.$bulan.'-'.$tahun;
        }
    }
}

if (!function_exists('get_hari')) {
    function get_hari($day) {
        switch ($day) {
            case 0: return 'Ahad'; break;
            case 1: return 'Senin'; break;
            case 2: return 'Selasa'; break;
            case 3: return 'Rabu'; break;
            case 4: return 'Kamis'; break;
            case 5: return 'Jumat'; break;
            case 6: return 'Sabtu'; break;
        }
    }
}

if (!function_exists('get_minggu')) {
    function get_minggu($mng) {
        switch ($mng) {
            case 1: return 'Pertama'; break;
            case 2: return 'Kedua'; break;
            case 3: return 'Ketiga'; break;
            case 4: return 'Keempat'; break;
        }
    }
}

if (!function_exists('get_bulan')) {
    function get_bulan($bln) {
        switch ($bln) {
            case 1: return 'Januari'; break;
            case 2: return 'Februari'; break;
            case 3: return 'Maret'; break;
            case 4: return 'April'; break;
            case 5: return 'Mei'; break;
            case 6: return 'Juni'; break;
            case 7: return 'Juli'; break;
            case 8: return 'Agustus'; break;
            case 9: return 'September'; break;
            case 10: return 'Oktober'; break;
            case 11: return 'November'; break;
            case 12: return 'Desember'; break;
        }
    }
}

if (!function_exists('rupiah')) {
    function rupiah($angka, $kurs = '') {
        if ($angka === '') $angka = 0;
        if ($kurs) return $kurs.' '.number_format($angka);
        else return 'Rp'.number_format($angka, 0, ',', '.').',-';
    }
}

if (!function_exists('sebut')) {
    function sebut($angka, $langsung = FALSE, $koma = '.') {
        $angka = explode($koma, trim($angka, $koma));

        if ($langsung) {
            $bulat = str_split($angka[0]);
            for ($i = 0; $i < sizeof($bulat); $i++) { $bulat[$i] = terbilang($bulat[$i]); }
            $huruf = implode(' ', $bulat);
        } else {
            $huruf = trim(terbilang($angka[0]));
        }

        if (sizeof($angka) > 1) {
            $desimal = str_split($angka[1]);
            for ($i = 0; $i < sizeof($desimal); $i++) { $desimal[$i] = terbilang($desimal[$i]); }
            $huruf .= ' koma'.implode(' ', $desimal);
        }

        return $huruf;
    }
}

if (!function_exists('terbilang')) {
    function terbilang($x) {
        $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
        if ($x === '0') return ' nol';
        elseif ($x < 0) return 'minus'.terbilang($x * -1);
        elseif ($x < 12) return ' '.$huruf[$x];
        elseif ($x < 20) return terbilang($x - 10).' belas';
        elseif ($x < 100) return terbilang($x / 10).' puluh'.terbilang($x % 10);
        elseif ($x < 200) return 'seratus'.terbilang($x - 100);
        elseif ($x < 1000) return terbilang($x / 100).' ratus'.terbilang($x % 100);
        elseif ($x < 2000) return 'seribu'.terbilang($x - 1000);
        elseif ($x < 1000000) return terbilang($x / 1000).' ribu'.terbilang($x % 1000);
        elseif ($x < 1000000000) return terbilang($x / 1000000).' juta'.terbilang($x % 1000000);
        elseif ($x < 1000000000000) return terbilang($x / 1000000000).' miliar'.terbilang($x % 1000000000);
        elseif ($x < 1000000000000000) return terbilang($x / 1000000000000).' triliun'.terbilang($x % 1000000000000);
        elseif ($x < 1000000000000000000) return terbilang($x / 1000000000000000).' kuadriliun'.terbilang($x % 1000000000000000);
        elseif ($x < 1000000000000000000000) return terbilang($x / 1000000000000000000).' kuantiliun'.terbilang($x % 1000000000000000000);
        elseif ($x < 1000000000000000000000000) return terbilang($x / 1000000000000000000000).' sekstiliun'.terbilang($x % 1000000000000000000000);
        elseif ($x < 1000000000000000000000000000) return terbilang($x / 1000000000000000000000000).' septiliun'.terbilang($x % 1000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000).' oktiliun'.terbilang($x % 1000000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000000).' noniliun'.terbilang($x % 1000000000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000000000).' desiliun'.terbilang($x % 1000000000000000000000000000000000);
    }
}

if (!function_exists('tambah_nol')) {
    function tambah_nol($num, $size = 2) {
        if ($size == 2) {
            if (strlen($num) == 1) return '0'.$num;
            else return $num;
        } else if ($size == 3) {
            if (strlen($num) == 1) return '00'.$num;
            else if (strlen($num) == 2) return '0'.$num;
            else return $num;
        } else if ($size == 4) {
            if (strlen($num) == 1) return '000'.$num;
            else if (strlen($num) == 2) return '00'.$num;
            else if (strlen($num) == 3) return '0'.$num;
            else return $num;
        } else if ($size == 5) {
            if (strlen($num) == 1) return '0000'.$num;
            else if (strlen($num) == 2) return '000'.$num;
            else if (strlen($num) == 3) return '00'.$num;
            else if (strlen($num) == 4) return '0'.$num;
            else return $num;
        } else return $num;
    }
}

if (!function_exists('number_to_roman')) {
    function number_to_roman($num) {
        $n = intval($num);
        $res = '';

        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        );

        foreach ($roman_numerals as $roman => $number) {
            /*** divide to get  matches ***/
            $matches = intval($n / $number);

            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);

            /*** substract from the number ***/
            $n = $n % $number;
        }

        /*** return the res ***/
        return $res;
    }
}

if (!function_exists('cari_query')) {
    function cari_query($q, $data) {
        $builder = "IFNULL($data[0], '') LIKE CONCAT('%', '$q', '%')";

        for ($i = 1; $i < sizeof($data); $i++) {
            $builder .= " OR IFNULL($data[$i], '') LIKE CONCAT('%', '$q', '%')";
        }

        return $builder;
    }
}

if (!function_exists('do_hash')) {
    function do_hash($data, $type = 'bcrypt') {
        if ($type == 'bcrypt') return password_hash($data, PASSWORD_BCRYPT);
        else if ($type == 'md5') return md5(md5($data.md5($data)));
        else return $data;
    }
}

if (!function_exists('compare_hash')) {
    function compare_hash($data1, $data2, $sama) {
        if ($sama) $stat = ($data1 === $data2)? TRUE : FALSE;
        else $stat = password_verify($data1, $data2);

        return $stat;
    }
}

if (!function_exists('set_lang')) {
    function set_lang($lang, $lang_name) {
        $cookie = array(    'name'      => $lang_name,
                            'value'     => $lang,
                            'expire'    => (60 /*detik*/ * 60 /*menit*/ * 24 /*jam*/ * 30 /*hari*/ * 12 /*bulan*/ * 100 /*tahun*/));
        set_cookie($cookie);
    }
}
