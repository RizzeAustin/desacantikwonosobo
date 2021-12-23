// function prov(kd_prov){
//     switch(kd_prov) {
//         case '01':
//             return '01 Some Province'
//         case '33':
//             return '33 Jawa tengah'
//         default:
//             return kd_prov
//     }
// }
// function kab(kd_kab){
//     switch(kd_kab) {
//         case '01':
//             return '01 Some kabs'
//         case '07':
//             return '07 Wonosobo'
//         default:
//             return kd_kab
//     }
// }
// function kec(kd_kec){
//     switch(kd_kec) {
//         case '010':
//             return '010 Wadaslintang'
//         case '020':
//             return '020 Kepil'
//         case '030':
//             return '030 Sapuran'
//         case '031':
//             return '031 Kalibawang'
//         case '040':
//             return '040 Kaliwiro'
//         case '050':
//             return '050 Leksono'
//         case '051':
//             return '051 Sukoharjo'
//         case '060':
//             return '060 Selomerto'
//         case '070':
//             return '070 Kalikajar'
//         case '080':
//             return '080 Kertek'
//         case '090':
//             return '090 Wonosobo'
//         case '100':
//             return '100 Watumalang'
//         case '110':
//             return '110 Mojotengah'
//         case '120':
//             return '120 Garung'
//         case '130':
//             return '130 Kejajar'
//         default:
//             return kd_kec
//     }
// }
function nm_tempat(url, token, kd_prov, kd_kab, kd_kec, kd_desa){
    var d = $.ajax({
        url: url,
        type: "POST",
        data:{ 
            _token: token,
            'kd_prov': kd_prov,
            'kd_kab': kd_kab,
            'kd_kec': kd_kec,
            'kd_desa': kd_desa,
        },
        cache: false,
        dataType: 'json',
    });
    return d
}
function b2r5(b2r5){
    switch(b2r5) {
        case '1':
            return '1. Selesai dicacah'
        case '2':
            return '2. Tidak bersedia dicacah'
        default:
            return b2r5
    }
}
function b3r1a(b3r1a){
    switch(b3r1a) {
        case '1':
            return '1. Milik sendiri'
        case '2':
            return '2. Kontrak/sewa'
        case '3':
            return '3. Bebas sewa'
        case '4':
            return '4. Dinas'
        case '5':
            return '5. Lainnya'
        default:
            return b3r1a
    }
}
function b3r1b(b3r1b){
    switch(b3r1b) {
        case '1':
            return '1. Milik sendiri'
        case '2':
            return '2. Milik orang lain'
        case '3':
            return '3. Tanah negara'
        case '4':
            return '4. Lainnya'
        default:
            return b3r1b
    }
}
function b3r3(b3r3){
    switch(b3r3) {
        case '01':
            return '01. Marmer/granit'
        case '02':
            return '02. Keramik'
        case '03':
            return '03. Parket/vinil/permadani'
        case '04':
            return '04. Ubin/tegel/teraso'
        case '05':
            return '05. Kayu/papan kualitas tinggi'
        case '06':
            return '06. Semen/bata merah'
        case '07':
            return '07. Bambu'
        case '08':
            return '08. Kayu/papan kualitas rendah'
        case '09':
            return '09. Tanah'
        case '10':
            return '10. Lainnya'
        default:
            return b3r3
    }
}
function b3r4a(b3r4a){
    switch(b3r4a) {
        case '1':
            return '1. Tembok'
        case '2':
            return '2. Plesteran anyaman bambu/kawat'
        case '3':
            return '3. Kayu'
        case '4':
            return '4. Anyaman bambu'
        case '5':
            return '5. Batang kayu'
        case '6':
            return '6. Bambu'
        case '7':
            return '7. Lainnya'
        default:
            return b3r4a
    }
}
function b3r4b(b3r4b){
    switch(b3r4b) {
        case '1':
            return '1. Bagus/kualitas tinggi'
        case '2':
            return '2. Jelek/kualitas rendah'
        default:
            return b3r4b
    }
}
function b3r5a(b3r5a){
    switch(b3r5a) {
        case '01':
            return '01. Beton/genteng beton'
        case '02':
            return '02. Genteng keramik'
        case '03':
            return '03. Genteng metal'
        case '04':
            return '04. Genteng tanah liat'
        case '05':
            return '05. Asbes'
        case '06':
            return '06. Seng'
        case '07':
            return '07. Sirap'
        case '08':
            return '08. Bambu'
        case '09':
            return '09. Jerami/ijuk/daun daunan/rumbia'
        case '10':
            return '10. Lainnya'
        default:
            return b3r5a
    }
}
function b3r5b(b3r5b){
    switch(b3r5b) {
        case '1':
            return '1. Bagus/kualitas tinggi'
        case '2':
            return '2. Jelek/kualitas rendah'
        default:
            return b3r5b
    }
}
function b3r7(b3r7){
    switch(b3r7) {
        case '01':
            return '01. Air kemasan bermerk'
        case '02':
            return '02. Air isi ulang'
        case '03':
            return '03. Leding meteran'
        case '04':
            return '04. Leding eceran'
        case '05':
            return '05. Sumur bor/pompa'
        case '06':
            return '06. Sumur terlindung'
        case '07':
            return '07. Sumur tak terlindung'
        case '08':
            return '08. Mata air terlindung'
        case '09':
            return '09. Mata air tak terlindung'
        case '10':
            return '10. Air sungai/danau/waduk'
        case '11':
            return '11. Air hujan'
        case '12':
            return '12. Lainnya'
        default:
            return b3r7
    }
}
function b3r8(b3r8){
    switch(b3r8) {
        case '1':
            return '1. Membeli eceran'
        case '2':
            return '2. Langganan'
        case '3':
            return '3. Tidak membeli'
        default:
            return b3r8
    }
}
function b3r9a(b3r9a){
    switch(b3r9a) {
        case '1':
            return '1. Listrik PLN'
        case '2':
            return '2. Listrik NON PLN'
        case '3':
            return '3. Bukan listrik'
        default:
            return b3r9a
    }
}
function b3r9b(b3r9b){
    switch(b3r9b) {
        case '1':
            return '1. 450 watt'
        case '2':
            return '2. 900 watt'
        case '3':
            return '3. 1300 watt'
        case '4':
            return '4. 2200 watt'
        case '5':
            return '5. > 2200 watt'
        case '6':
            return '6. Tanpa meteran'
        default:
            return b3r9b
    }
}
function b3r10(b3r10){
    switch(b3r10) {
        case '1':
            return '1. Listrik'
        case '2':
            return '2. Gas > 3 kg'
        case '3':
            return '3. Gas 3 kg'
        case '4':
            return '4. Gas kota/biogas'
        case '5':
            return '5. Minyak tanah'
        case '6':
            return '6. Briket'
        case '7':
            return '7. Arang'
        case '8':
            return '8. Kayu bakar'
        case '9':
            return '9. Tidak memasak di rumah'
        default:
            return b3r10
    }
}
function b3r11a(b3r11a){
    switch(b3r11a) {
        case '1':
            return '1. Sendiri'
        case '2':
            return '2. Bersama'
        case '3':
            return '3. Umum'
        case '4':
            return '4. Tidak ada'
        default:
            return b3r11a
    }
}
function b3r11b(b3r11b){
    switch(b3r11b) {
        case '1':
            return '1. Leher angsa'
        case '2':
            return '2. Plengsengan'
        case '3':
            return '3. Cemplung/cubluk'
        case '4':
            return '4. Tidak pakai'
        default:
            return b3r11b
    }
}
function b3r12(b3r12){
    switch(b3r12) {
        case '1':
            return '1. Tangki'
        case '2':
            return '2. SPAL'
        case '3':
            return '3. Lubang tanah'
        case '4':
            return '4. Kolam/sawah/sungai/danau/laut'
        case '5':
            return '5. Pantai/tanah lapang/kebun'
        case '6':
            return '6. Lainnya'
        default:
            return b3r12
    }
}
function b4k3(b4k3){
    switch(b4k3) {
        case '1':
            return '1. Kepala keluarga'
        case '2':
            return '2. Istri/suami'
        case '3':
            return '3. Anak'
        case '4':
            return '4. Manantu'
        case '5':
            return '5. Cucu'
        case '6':
            return '6. Orang tua/mertua'
        case '7':
            return '7. Pembantu ruta'
        case '8':
            return '8. Lainnya'
        default:
            return b4k3
    }
}
function b4k4(b4k4){
    switch(b4k4) {
        case '1':
            return '1. Laki-laki'
        case '2':
            return '2. Perempuan'
        default:
            return b4k4
    }
}
function b4k6(b4k6){
    switch(b4k6) {
        case '1':
            return '1. Belum kawin'
        case '2':
            return '2. Kawin/nikah'
        case '3':
            return '3. Cerai hidup'
        case '4':
            return '4. Cerai mati'
        default:
            return b4k6
    }
}
function b4k7(b4k7){
    switch(b4k7) {
        case '0':
            return '0. Tidak'
        case '1':
            return '1. Ya, dapat ditunjukkan'
        case '2':
            return '2. Ya, tidak dapat ditunjukkan'
        default:
            return b4k7
    }
}
function b4k8(b4k8){
    switch(b4k8) {
        case '1':
            return '1. Ya'
        case '2':
            return '2. Tidak'
        default:
            return b4k8
    }
}
function b4k9(b4k9){
    switch(b4k9) {
        case 0:
            return '0. Tidak memiliki'
        case 1:
            return '1. Akta Kelahiran'
        case 2:
            return '2. Kartu Pelajar'
        case 4:
            return '4. KTP'
        case 8:
            return '8. SIM'
        case 3:
            return '3. Akta kelahiran, kartu pelajar'
        case 5:
            return '5. Akta kelahiran, KTP'
        case 9:
            return '9. Akta kelahiran, SIM'
        case 6:
            return '6. Kartu pelajar, KTP'
        case 10:
            return '10. Kartu pelajar, SIM'
        case 12:
            return '12. KTP, SIM'
        case 7:
            return '7. Akta kelahiran, kartu pelajar, KTP'
        case 11:
            return '11. Akta kelahiran, kartu pelajar, SIM'
        case 14:
            return '14. Kartu pelajar, KTP, SIM'
        case 15:
            return '15. Akta kelahiran, kartu pelajar, KTP, SIM'
        default:
            return b4k9
    }
}
function b4k9Check(val){
    switch (String(val)) {
        case '0':
            $('#b4k9_0').prop('checked', true)
            break
        case '1':
            $('#b4k9_1').prop('checked', true)
            break
        case '2':
            $('#b4k9_2').prop('checked', true)
            break
        case '4':
            $('#b4k9_4').prop('checked', true)
            break
        case '8':
            $('#b4k9_8').prop('checked', true)
            break
        case '3':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_2').prop('checked', true)
            break
        case '5':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_4').prop('checked', true)
            break
        case '9':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        case '6':
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_4').prop('checked', true)
            break
        case '10':
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        case '12':
            $('#b4k9_4').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        case '7':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_4').prop('checked', true)
            break
        case '11':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        case '14':
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_4').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        case '15':
            $('#b4k9_1').prop('checked', true)
            $('#b4k9_2').prop('checked', true)
            $('#b4k9_4').prop('checked', true)
            $('#b4k9_8').prop('checked', true)
            break
        default:
            $('#b4k9_1').prop('checked', false)
            $('#b4k9_2').prop('checked', false)
            $('#b4k9_4').prop('checked', false)
            $('#b4k9_8').prop('checked', false)
            break
    }
}
function b4k10(b4k10){
    switch(b4k10) {
        case '1':
            return '1. Ya'
        case '2':
            return '2. Tidak'
        default:
            return b4k10
    }
}
function b4k11(b4k11){
    switch(b4k11) {
        case '1':
            return '1. MOW/tubektomi'
        case '2':
            return '2. MOP/vasektomi'
        case '3':
            return '3. AKDR/IUD/spiral'
        case '4':
            return '4. Suntikan KB'
        case '5':
            return '5. Susuk KB/norplan/implanon/alwalit'
        case '6':
            return '6. Pil KB'
        case '7':
            return '7. Kondom/karet KB'
        case '8':
            return '8. Intravag/tisue/kondom wanita'
        case '9':
            return '9. Cara tradisional'
        default:
            return b4k11
    }
}
function b4k12(b4k12){
    switch(b4k12) {
        case '00':
            return '00. Tidak cacat'
        case '01':
            return '01. Tuna daksa/cacat tubuh'
        case '02':
            return '02. Tuna netra/buta'
        case '03':
            return '03. Tuna rungu'
        case '04':
            return '04. Tuna wicara'
        case '05':
            return '05. Tuna rungu & wicara'
        case '06':
            return '06. Tuna netra & cacat tubuh'
        case '07':
            return '07. Tuna netra, rungu, & wicara'
        case '08':
            return '08. Tuna rungu, wicara, & cacat tubuh'
        case '09':
            return '09. Tuna rungu, wicara, netra, & cacat tubuh'
        case '10':
            return '10. Cacat mental retardasi'
        case '11':
            return '11. Mantan penderita gangguan jiwa'
        case '12':
            return '12. Cacat fisik & mental'
        default:
            return b4k12
    }
}
function b4k13(b4k13){
    switch(b4k13) {
        case '0':
            return '0. Tidak ada'
        case '1':
            return '1. Hipertensi (tekanan darah tinggi)'
        case '2':
            return '2. Rematik'
        case '3':
            return '3. Asma'
        case '4':
            return '4. Masalah jantung'
        case '5':
            return '5. Diabetes (kencing manis)'
        case '6':
            return '6. Tuberculosis (TBC)'
        case '7':
            return '7. Stroke'
        case '8':
            return '8. Kanker atau tumor ganas'
        case '9':
            return '9. Lainnya (gagal ginjal, paru-paru flek, dan sejenisnya)'
        default:
            return b4k13
    }
}
function b4k14(b4k14){
    switch(b4k14) {
        case '1':
            return '1. A'
        case '2':
            return '2. B'
        case '3':
            return '3. AB'
        case '4':
            return '4. O'
        case '5':
            return '5. Tidak tahu'
        default:
            return b4k14
    }
}
function b4k15(b4k15){
    switch(b4k15) {
        case '0':
            return '0. Tidak/belum pernah sekolah'
        case '1':
            return '1. Masih sekolah'
        case '2':
            return '2. Tidak bersekolah lagi'
        default:
            return b4k15
    }
}
function b4k16(b4k16){
    switch(b4k16) {
        case '01':
            return '01. SD/SDLB'
        case '02':
            return '02. Paket A'
        case '03':
            return '03. M. Ibtidaiyah'
        case '04':
            return '04. SMP/SMPLB'
        case '05':
            return '05. Paket B'
        case '06':
            return '06. M. Tsanawiyah'
        case '07':
            return '07. SMA/SMK/SMALB'
        case '08':
            return '08. Paket C'
        case '09':
            return '09. M. Aliyah'
        case '10':
            return '10. Perguruan tinggi'
        default:
            return b4k16
    }
}
function b4k17(b4k17){
    switch(b4k17) {
        case '8':
            return '8 (tamat)'
        default:
            return b4k17
    }
}
function b4k18(b4k18){
    switch(b4k18) {
        case '0':
            return '0. Tidak punya ijazah'
        case '1':
            return '1. SD/sederajat'
        case '2':
            return '2. SMP/sederajat'
        case '3':
            return '3. SMA/sederajat'
        case '4':
            return '4. D1/D2/D3'
        case '5':
            return '5. D4/S1'
        case '6':
            return '6. S2/S3'
        default:
            return b4k18
    }
}
function b4k19(b4k19){
    switch(b4k19) {
        case '1':
            return '1. Ya'
        case '2':
            return '2. Tidak'
        default:
            return b4k19
    }
}
function b4k20(b4k20){
    switch(b4k20) {
        case '1':
            return '1. Ya'
        case '2':
            return '2. Tidak'
        default:
            return b4k20
    }
}
function b4k21(b4k21){
    switch(b4k21) {
        case '01':
            return '01. Pertanian tanaman padi & palawija'
        case '02':
            return '02. Hortikultura'
        case '03':
            return '03. Perkebunan'
        case '04':
            return '04. Perikanan tangkap'
        case '05':
            return '05. Perikanan budidaya'
        case '06':
            return '06. Peternakan'
        case '07':
            return '07. Kehutanan & pertanian lainnya'
        case '08':
            return '08. Pertambangan/penggalian'
        case '09':
            return '09. Industri pengolahan'
        case '10':
            return '10. Listrik dan gas'
        case '11':
            return '11. Bangunan/kontruksi'
        case '12':
            return '12. Perdagangan'
        case '13':
            return '13. Hotel dan rumah makan'
        case '14':
            return '14. Transportasi dan pergudangan'
        case '15':
            return '15. Informasi & komunikasi'
        case '16':
            return '16. Keuangan & asuransi'
        case '17':
            return '17. Jasa pendidikan'
        case '18':
            return '18. Jasa kesehatan'
        case '19':
            return '19. Jasa kemasyarakatan, pemerintahan, & perorangan'
        case '20':
            return '20. Pemulung'
        case '21':
            return '21. TKI'
        case '22':
            return '22. Lainnya'
        default:
            return b4k21
    }
}
function b4k22(b4k22){
    switch(b4k22) {
        case '1':
            return '1. Berusaha sendiri'
        case '2':
            return '2. Berusaha dibantu buruh tidak tetap/tidak dibayar'
        case '3':
            return '3. Berusaha dibantu buruh tetap/dibayar'
        case '4':
            return '4. Buruh/karyawan/pegawai swasta'
        case '5':
            return '5. PNS/TNI/POLRI/BUMN/BUMD/anggota legislatif'
        case '6':
            return '6. Pekerja bebas pertanian'
        case '7':
            return '7. Pekerja bebas non-pertanian'
        case '8':
            return '8. Pekerja keluarga/tidak dibayar'
        default:
            return b4k22
    }
}
function b4k23(b4k23){
    switch(b4k23) {
        case '1':
            return '1. Islam'
        case '2':
            return '2. Protestan'
        case '3':
            return '3. Katolik'
        case '4':
            return '4. Hindu'
        case '5':
            return '5. Budha'
        case '6':
            return '6. Konghucu'
        case '7':
            return '7. Lainnya'
        default:
            return b4k23
    }
}
function b4k24(b4k24){
    switch(b4k24) {
        case '01':
            return '01. Arab'
        case '02':
            return '02. Ambon'
        case '03':
            return '03. Bali'
        case '04':
            return '04. Batak'
        case '05':
            return '05. Betawi'
        case '06':
            return '06. Bugis'
        case '07':
            return '07. China'
        case '08':
            return '08. Dayak'
        case '09':
            return '09. India'
        case '10':
            return '10. Jawa'
        case '11':
            return '11. Madura'
        case '12':
            return '12. Melayu'
        case '13':
            return '13. Minang'
        case '14':
            return '14. Papua'
        case '15':
            return '15. Sunda'
        case '16':
            return '16. Timor'
        case '17':
            return '17. Lainnya'
        default:
            return b4k24
    }
}
function b4k25(b4k25){
    switch(b4k25) {
        case '1':
            return '1. Alamat tempat tinggal dan KTP/KK di dalam desa'
        case '2':
            return '2. Alamat tempat tinggal di dalam desa tapi KTP/KK di luar desa'
        case '3':
            return '3. Alamat tempat tinggal di luar desa tapi KTP/KK di dalam desa'
        default:
            return b4k25
    }
}

function b5k3(b5k3){
    switch(b5k3) {
        case '1':
            return '1. Pekarangan'
        case '2':
            return '2. Sawah irigasi'
        case '3':
            return '3. Sawah tadah hujan'
        case '4':
            return '4. Tegalan'
        case '5':
            return '5. Kolam'
        default:
            return b5k3
    }
}
function b5k4(b5k4){
    switch(b5k4) {
        case '1':
            return '1. Ada SPPT'
        case '2':
            return '2. Tidak ada SPPT'
        default:
            return b5k4
    }
}
function b5k7(b5k7){
    switch(b5k7) {
        case '1':
            return '1. SHM'
        case '2':
            return '2. HGB'
        case '3':
            return '3. Tidak bersertifikat'
        default:
            return b5k7
    }
}
function b6r1k2(b6r1k2){
    switch(b6r1k2) {
        case '00':
            return '00. Penerimaan pendapatan'
        case '01':
            return '01. Pertanian tanaman padi & palawija'
        case '02':
            return '02. Hortikultura'
        case '03':
            return '03. Perkebunan'
        case '04':
            return '04. Perikanan tangkap'
        case '05':
            return '05. Perikanan budidaya'
        case '06':
            return '06. Peternakan'
        case '07':
            return '07. Kehutanan & pertanian lainnya'
        case '08':
            return '08. Pertambangan/penggalian'
        case '09':
            return '09. Industri pengolahan'
        case '10':
            return '10. Listrik & gas'
        case '11':
            return '11. Bangunan/kontruksi'
        case '12':
            return '12. Perdagangan'
        case '13':
            return '13. Hotel & rumah makan'
        case '14':
            return '14. Transportasi & pergudangan'
        case '15':
            return '15. Informasi & komunikasi'
        case '16':
            return '16. Keuangan & asuransi'
        case '17':
            return '17. Jasa pendidikan'
        case '18':
            return '18. Jasa kesehatan'
        case '19':
            return '19. Jasa kemasyarakatan, pemerintah, & perorangan'
        case '20':
            return '20. Pemulung'
        case '21':
            return '21. TKI'
        case '22':
            return '22. Lainnya'
        default:
            return b6r1k2
    }
}
function b7r5a(b7r5a){
    switch(b7r5a) {
        case '1':
            return '1. Ya'
        case '2':
            return '2. Tidak'
        default:
            return b7r5a
    }
}
function b7r5k2(b7r5k2){
    switch(b7r5k2) {
        case '01':
            return '01. Pertanian tanaman padi dan palawija'
        case '02':
            return '02. Hortikultura'
        case '03':
            return '03. Perkebunan'
        case '04':
            return '04. Perikanan tangkap'
        case '05':
            return '05. Perikanan budidaya'
        case '06':
            return '06. Peternakan'
        case '07':
            return '07. Kehutanan dan pertanian lainnya'
        case '08':
            return '08. Pertambangan/penggalian'
        case '09':
            return '09. Usaha menjahit/tata busana'
        case '10':
            return '10. Salon kecantikan'
        case '11':
            return '11. Reparasi/montir mobil/motor'
        case '12':
            return '12. Reparasi elektronika'
        case '13':
            return '13. Industri barang dari kulit'
        case '14':
            return '14. Industri barang dari kayu'
        case '15':
            return '15. Industri barang dari logam'
        case '16':
            return '16. Industri barang dari kain/tenun'
        case '17':
            return '17. Industri gerabah/kramik/batu'
        case '18':
            return '18. Industri anyaman dari rotan/bambu, rumput, pandan, dll'
        case '19':
            return '19. Industri makanan dan minuman'
        case '20':
            return '20. Industri lainnya'
        case '21':
            return '21. Listrik dan gas'
        case '22':
            return '22. Bangunan/kontruksi'
        case '23':
            return '23. Toko/warung kelontong'
        case '24':
            return '24. Perdagangan lain'
        case '25':
            return '25. Warung/kedai makanan'
        case '26':
            return '26. Penginapan (homestay)'
        case '27':
            return '27. Hotel dan rumah makan'
        case '28':
            return '28. Ojek pangkalan'
        case '29':
            return '29. Ojek online'
        case '30':
            return '30. Transportasi dan pergudangan lainnya'
        case '31':
            return '31. Informasi dan komunikasi'
        case '32':
            return '32. Keuangan dan asuransi'
        case '33':
            return '33. Usaha les bahasa asing'
        case '34':
            return '34. Usaha les komputer'
        case '35':
            return '35. Jasa pendidikan lain'
        case '36':
            return '36. Praktek dokter umum/spesialis'
        case '37':
            return '37. Praktek dokter gigi'
        case '38':
            return '38. Praktek bidan'
        case '39':
            return '39. Jasa kesehatan lain'
        case '40':
            return '40. Jasa kemasyarakatan, pemerintahan, & perorangan'
        case '41':
            return '41. Pemulung'
        case '42':
            return '42. Lainnya'
        default:
            return b7r5k2
    }
}
function b7r5k4(b7r5k4){
    switch(b7r5k4) {
        case '1':
            return '1. Ada'
        case '2':
            return '2. Tidak ada'
        default:
            return b7r5k4
    }
}
function b7r5k5(b7r5k5){
    switch(b7r5k5) {
        case '1':
            return '1. < 1 juta'
        case '2':
            return '2. 1 - < 5 juta'
        case '3':
            return '3. 5 - < 10 juta'
        case '4':
            return '4. >= 10 juta'
        default:
            return b7r5k5
    }
}

function getCombinations(valuesArray){
    var combi = [];
    var temp = [];
    var slent = Math.pow(2, valuesArray.length);
    for (var i = 0; i < slent; i++){
        temp = [];
        for (var j = 0; j < valuesArray.length; j++){
            if ((i & Math.pow(2, j))){
                temp.push(valuesArray[j]);
            }
        }
        if (temp.length > 0){
            combi.push(temp);
        }
    }

    combi.sort((a, b) => a.length - b.length);
    return combi;
}