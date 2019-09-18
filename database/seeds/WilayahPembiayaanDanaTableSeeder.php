<?php

use Illuminate\Database\Seeder;

class WilayahPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wilayah_pembiayaan_dana')->delete();
        
        \DB::table('wilayah_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ACEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'AMBON',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'AMPANA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'BAGAN BATU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'BALIKPAPAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'BANDUNG',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:23:10',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'BANGKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'BANGKINANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'BANGKO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'BANJAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 17,
                'name' => 'BANJARMASIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 18,
                'name' => 'BANYUWANGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 19,
                'name' => 'BATAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 20,
                'name' => 'BATULICIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 21,
                'name' => 'BATURAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 22,
                'name' => 'BAU-BAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 23,
                'name' => 'BEKASI',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:23:35',
            ),
            17 => 
            array (
                'id' => 26,
                'name' => 'BELITUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 27,
                'name' => 'BENGKULU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 28,
                'name' => 'BERAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 29,
                'name' => 'BIMA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 30,
                'name' => 'BLITAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 31,
                'name' => 'BLORA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 32,
                'name' => 'BOGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 33,
                'name' => 'BOJONEGORO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 34,
                'name' => 'BONE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 35,
                'name' => 'BONTANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 36,
                'name' => 'BOYOLALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 37,
                'name' => 'BUNGKU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 38,
                'name' => 'CIANJUR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 39,
                'name' => 'CIKAMPEK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 40,
                'name' => 'CIKARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 41,
                'name' => 'CILACAP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 42,
                'name' => 'CILEGON',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 43,
                'name' => 'CILEUNGSI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 44,
                'name' => 'CIREBON',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 45,
                'name' => 'DENPASAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 46,
                'name' => 'DEPOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 47,
                'name' => 'DHARMASRAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 48,
                'name' => 'DUMAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 49,
                'name' => 'ENDE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 50,
                'name' => 'GARUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 51,
                'name' => 'GIANYAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 52,
                'name' => 'GORONTALO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 53,
                'name' => 'GRESIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 54,
                'name' => 'JAKARTA',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:23:55',
            ),
            46 => 
            array (
                'id' => 58,
                'name' => 'JAMBI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 59,
                'name' => 'JATIBARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 60,
                'name' => 'JAYAPURA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 61,
                'name' => 'JEMBER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 62,
                'name' => 'JEPARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 63,
                'name' => 'JOMBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 64,
                'name' => 'KARAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 65,
                'name' => 'KASONGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 66,
                'name' => 'KAYU AGUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 67,
                'name' => 'KEBUMEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 68,
                'name' => 'KEDIRI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 69,
                'name' => 'KENDAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 70,
                'name' => 'KENDARI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 71,
                'name' => 'KEPANJEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 72,
                'name' => 'KISARAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 73,
                'name' => 'KLATEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 74,
                'name' => 'KOTAMOBAGU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 75,
                'name' => 'KUDUS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 76,
                'name' => 'KUNINGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 77,
                'name' => 'KUPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 78,
                'name' => 'LAHAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 79,
                'name' => 'LAMPUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 80,
                'name' => 'LANGSA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 81,
                'name' => 'LEUWILIANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 82,
                'name' => 'LOMBOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 83,
                'name' => 'LUBUK LINGGAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 84,
                'name' => 'LUMAJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 85,
                'name' => 'LUWUK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 86,
                'name' => 'MADIUN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 87,
                'name' => 'MADURA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 88,
                'name' => 'MAGELANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 89,
                'name' => 'MAJALENGKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 90,
                'name' => 'MAJENANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 91,
                'name' => 'MAKASSAR',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:26:14',
            ),
            80 => 
            array (
                'id' => 93,
                'name' => 'MALANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 94,
                'name' => 'MAMUJU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 95,
                'name' => 'MANADO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 96,
                'name' => 'MANNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 97,
                'name' => 'MANOKWARI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 98,
                'name' => 'MARTAPURA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 99,
                'name' => 'MAUMERE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 100,
                'name' => 'MEDAN',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:26:34',
            ),
            88 => 
            array (
                'id' => 102,
                'name' => 'MERAUKE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 103,
                'name' => 'MIMIKA TIMIKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 104,
                'name' => 'MOJOKERTO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 105,
                'name' => 'MOROWALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 106,
                'name' => 'MUARA BULIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 107,
                'name' => 'MUARA BUNGO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 108,
                'name' => 'MUARA TEWEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 109,
                'name' => 'MUNTOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 110,
                'name' => 'NABIRE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 111,
                'name' => 'NGANJUK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 112,
                'name' => 'NGAWI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 113,
                'name' => 'PACITAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 114,
                'name' => 'PADANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 115,
                'name' => 'PALANGKARAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 116,
                'name' => 'PALEMBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 117,
                'name' => 'PALOPO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 118,
                'name' => 'PALU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 119,
                'name' => 'PAMEKASAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 120,
                'name' => 'PANDEGLANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 121,
                'name' => 'PANGKALAN BUN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 122,
                'name' => 'PARE-PARE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 123,
                'name' => 'PARIAMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 124,
                'name' => 'PARUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 125,
                'name' => 'PASAMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 126,
                'name' => 'PASURUAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 127,
                'name' => 'PATI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 128,
                'name' => 'PAYAKUMBUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 129,
                'name' => 'PEKALONGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 130,
                'name' => 'PEKAN BARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 131,
                'name' => 'PELAIHARI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 132,
                'name' => 'PEMATANG SIANTAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 133,
                'name' => 'PESISIR SELATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 134,
                'name' => 'POLEWALI MANDAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 135,
                'name' => 'PONOROGO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 136,
                'name' => 'PONTIANAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 137,
                'name' => 'POSO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 138,
                'name' => 'PRABUMULIH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 139,
                'name' => 'PROBOLINGGO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 140,
                'name' => 'PURWAKARTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 141,
                'name' => 'PURWODADI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 142,
                'name' => 'PURWOKERTO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 143,
                'name' => 'RANGKAS BITUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 144,
                'name' => 'RANTAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 145,
                'name' => 'RANTAU PRAPAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 146,
                'name' => 'REMBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 147,
                'name' => 'RENGAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 148,
                'name' => 'RUTENG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 149,
                'name' => 'SALATIGA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 150,
                'name' => 'SAMARINDA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 151,
                'name' => 'SAMPIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 152,
                'name' => 'SEKAYU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 153,
                'name' => 'SEMARANG',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:26:49',
            ),
            140 => 
            array (
                'id' => 155,
                'name' => 'SENGKANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 156,
                'name' => 'SERANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 157,
                'name' => 'SIDOARJO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 158,
                'name' => 'SINGARAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 159,
                'name' => 'SINGKAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 160,
                'name' => 'SINTANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 161,
                'name' => 'SITUBONDO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 162,
                'name' => 'SOLO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 163,
                'name' => 'SOLOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 164,
                'name' => 'SOLOK SELATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 165,
                'name' => 'SORONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 166,
                'name' => 'SRAGEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 167,
                'name' => 'SUBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 168,
                'name' => 'SUKABUMI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 169,
                'name' => 'SUKOHARJO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 170,
                'name' => 'SUMBAWA BESAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 171,
                'name' => 'SUMEDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 172,
                'name' => 'SURABAYA',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:26:57',
            ),
            158 => 
            array (
                'id' => 174,
                'name' => 'TABANAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 175,
                'name' => 'TANAH GROGOT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 176,
                'name' => 'TANGERANG',
                'created_at' => NULL,
                'updated_at' => '2019-05-11 19:27:48',
            ),
            161 => 
            array (
                'id' => 183,
            'name' => 'TANGERANG SELATAN (PAMULANG)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 184,
                'name' => 'TANJUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 185,
                'name' => 'TANJUNG PINANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 186,
                'name' => 'TARAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 187,
                'name' => 'TASIKMALAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 188,
                'name' => 'TEGAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 189,
                'name' => 'TELUK KUANTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 190,
                'name' => 'TENGGARONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 191,
                'name' => 'TERNATE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 192,
                'name' => 'TOBOALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 193,
                'name' => 'TOLI-TOLI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 194,
                'name' => 'TUBAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 195,
                'name' => 'TULUNG AGUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 196,
                'name' => 'UJUNG BATU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 197,
                'name' => 'WARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 198,
                'name' => 'WONOSOBO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 199,
                'name' => 'YOGYAKARTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}