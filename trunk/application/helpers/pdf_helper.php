<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * A free and open source web based invoicing system
 *
 * @package		InvoicePlane
 * @author		Kovah (www.kovah.de)
 * @copyright	Copyright (c) 2012 - 2015 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 *
 */

function generate_permohonan_pdf($id_permohonan, $stream = true, $template = null, $isGuest = null)
{
    $CI = &get_instance();

    $CI->load->helper('country');

	$sql_butir_peribadi = "
		select a.*, b.kewarganegaraan, c.bangsa, d.etnik, e.agama, f.taraf_perkahwinan,
		g.kelulusan, i.kategori_pemohon
		from permohonan_butir_peribadi a
		left join ref_kewarganegaraan b on a.kewarganegaraan = b.id
		left join ref_bangsa c on a.bangsa = c.id
		left join ref_etnik d on a.etnik = d.id
		left join ref_agama e on a.agama = e.id
		left join ref_taraf_perkahwinan f on a.taraf_perkahwinan = f.id
		left join ref_kelulusan g on a.kelulusan = g.id
		left join ref_kategori_pemohon i on a.kategori_pemohon = i.id
		where a.id=".$id_permohonan;
	$query_butir_peribadi = $CI->db->query($sql_butir_peribadi);
    $butir_peribadi = $query_butir_peribadi->row_array();
    
    $query_maklumat_am = $CI->db->query("select * from permohonan_maklumat_am where id_permohonan=".$id_permohonan);
    $maklumat_am = $query_maklumat_am->row_array();

	$sql_kursus = "
		select a.*, 
			b1.kod_kursus as b1_kod1, b1.nama_kursus as b1_nama, b1.id_kluster as b1_kluster, b11.kod_kluster as b11_kod, b11.nama_kluster as b11_nama,
			c1.kod_kursus as c1_kod1, c1.nama_kursus as c1_nama, c1.id_kluster as c1_kluster, c11.kod_kluster as c11_kod, c11.nama_kluster as c11_nama,
			d1.kod_kursus as d1_kod1, d1.nama_kursus as d1_nama, d1.id_kluster as d1_kluster, d11.kod_kluster as d11_kod, d11.nama_kluster as d11_nama
		from permohonan_kursus a 
		left join ref_kursus b1 on a.kursus1=b1.id
		left join ref_kluster b11 on b1.id_kluster=b11.id
		left join ref_kursus c1 on a.kursus2=c1.id
		left join ref_kluster c11 on c1.id_kluster=c11.id
		left join ref_kursus d1 on a.kursus3=d1.id
		left join ref_kluster d11 on d1.id_kluster=d11.id
		where a.id_permohonan=".$id_permohonan;
    $query_kursus = $CI->db->query($sql_kursus);
    $kursus = $query_kursus->row_array();

    // PDF associated files
    #$include_zugferd = $CI->mdl_settings->setting('include_zugferd');
    $include_zugferd = null;
	$associatedFiles = null;

    $data = array(
        'butir_peribadi' => $butir_peribadi,
        'maklumat_am' => $maklumat_am,
        'kursus' => $kursus,
        'output_type' => 'pdf',
    );

    $html = $CI->load->view('templates/pdf/permohonan', $data, true);

    $CI->load->helper('mpdf');
    return pdf_create($html, 'permohonan_'.$butir_peribadi['no_rujukan_permohonan'],
        $stream, null, true, $isGuest, $include_zugferd, $associatedFiles);
}