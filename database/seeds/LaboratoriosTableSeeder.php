<?php

use Illuminate\Database\Seeder;

class LaboratoriosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('laboratorios')->delete();
        
        \DB::table('laboratorios')->insert(array (
            0 => array ('id' => 1, 'nombre' => 'ABBOTT LAB, S.A.'),
            1 => array ('id' => 2, 'nombre' => 'ABSORBENTES MAYA, S.A.'),
            2 => array ('id' => 3, 'nombre' => 'ACANTO S.A.'),
            3 => array ('id' => 4, 'nombre' => 'ADAMED, S.A.'),
            4 => array ('id' => 5, 'nombre' => 'ALFA FARMACEUTICA,S.A.'),
            5 => array ('id' => 6, 'nombre' => 'ALFREDO HERBRUJER JR. & CIA LTDA.'),
            6 => array ('id' => 7, 'nombre' => 'ARGUS SALUD'),
            7 => array ('id' => 8, 'nombre' => 'ARSAL S.A.'),
            8 => array ('id' => 9, 'nombre' => 'ASOCIACION PASMO'),
            9 => array ('id' => 10, 'nombre' => 'ASOFARMA , S.A.'),
            10 => array ('id' => 11, 'nombre' => 'ASTA MEDICA'),
            11 => array ('id' => 12, 'nombre' => 'AUROBINDO'),
            12 => array ('id' => 13, 'nombre' => 'AVENTIS PHARMA, S.A.'),
            13 => array ('id' => 14, 'nombre' => 'B.D.F.'),
            14 => array ('id' => 15, 'nombre' => 'BAYER, S.A. (POPULAR)'),
            15 => array ('id' => 16, 'nombre' => 'BOEHRINGER INGELHEIM'),
            16 => array ('id' => 17, 'nombre' => 'CALIQUIMICA, S.A.'),
            17 => array ('id' => 18, 'nombre' => 'CANELS'),
            18 => array ('id' => 19, 'nombre' => 'CAPLIN POINT LAB.'),
            19 => array ('id' => 20, 'nombre' => 'CAREMED, S.A.'),
            20 => array ('id' => 21, 'nombre' => 'CDI, S.A.'),
            21 => array ('id' => 22, 'nombre' => 'CHEMILCO INTERNACIONAL, S.A.'),
            22 => array ('id' => 23, 'nombre' => 'CHEMINTER '),
            23 => array ('id' => 24, 'nombre' => 'CODICASA (GERBER)'),
            24 => array ('id' => 25, 'nombre' => 'CODIMISA'),
            25 => array ('id' => 26, 'nombre' => 'COMERCIAL INTERAMERICANA. (MK)  BAYER'),
            26 => array ('id' => 27, 'nombre' => 'COMPAÑIA FARMACEUTICA CEBALLOS, S.A.'),
            27 => array ('id' => 28, 'nombre' => 'CONAMEP AYUDAME'),
            28 => array ('id' => 29, 'nombre' => 'CONAMEP S.A.'),
            29 => array ('id' => 30, 'nombre' => 'CORPORACION ALIFARMAT'),
            30 => array ('id' => 31, 'nombre' => 'COSMETICOS GABY'),
            31 => array ('id' => 32, 'nombre' => 'DAPE'),
            32 => array ('id' => 33, 'nombre' => 'DAVISSA'),
            33 => array ('id' => 34, 'nombre' => 'DIGELASA'),
            34 => array ('id' => 35, 'nombre' => 'DIPROFARM, S.A.'),
            35 => array ('id' => 36, 'nombre' => 'DISFAVIL'),
            36 => array ('id' => 37, 'nombre' => 'DISTRIBUIDORA COMERCIAL M & C'),
            37 => array ('id' => 38, 'nombre' => 'DISTRIBUIDORA VESA'),
            38 => array ('id' => 39, 'nombre' => 'DONOVAN WERKE A.G., S.A.'),
            39 => array ('id' => 40, 'nombre' => 'DROG ANCALMO, S.A.'),
            40 => array ('id' => 41, 'nombre' => 'DROG Y LAB NACIONAL'),
            41 => array ('id' => 42, 'nombre' => 'DROGUERIA CANDELARIA, S.A.'),
            42 => array ('id' => 43, 'nombre' => 'DROGUERIA CON FRACCIONAMIENTO ELU'),
            43 => array ('id' => 44, 'nombre' => 'DROGUERIA EXCEL'),
            44 => array ('id' => 45, 'nombre' => 'DROGUERIA LANDIVAR, S.A.'),
            45 => array ('id' => 46, 'nombre' => 'DROGUERIA ORAN'),
            46 => array ('id' => 47, 'nombre' => 'DROGUERIA WASHINGTON, S.A.'),
            47 => array ('id' => 48, 'nombre' => 'DROGUERIA Y LABORATORIO DRODIJOSA VITALAB'),
            48 => array ('id' => 49, 'nombre' => 'EMILIO HERRERA M. SUCESORES'),
            49 => array ('id' => 50, 'nombre' => 'EMPAQUES Y DISTRIBUCIONES R & H'),
            50 => array ('id' => 51, 'nombre' => 'ETHI, S.A.'),
            51 => array ('id' => 52, 'nombre' => 'FAR Y DROG SANTA ANA S.A.'),
            52 => array ('id' => 53, 'nombre' => 'FARKOT, S.A.'),
            53 => array ('id' => 54, 'nombre' => 'FARMA QUIMICA, S.A.'),
            54 => array ('id' => 55, 'nombre' => 'FARMACEUTICA'),
            55 => array ('id' => 56, 'nombre' => 'FARMACIAS DE LA COMUNIDAD, S.A.'),
            56 => array ('id' => 57, 'nombre' => 'FARMAMEDICA, S.A.'),
            57 => array ('id' => 58, 'nombre' => 'FARMEN, S.A.'),
            58 => array ('id' => 59, 'nombre' => 'GENOMMA LAB'),
            59 => array ('id' => 60, 'nombre' => 'GLAXOSMITHKLINE GUATEMALA S.A. ( ETICO )'),
            60 => array ('id' => 61, 'nombre' => 'GLAXOSMITHKLINE GUATEMALA, S.A.'),
            61 => array ('id' => 62, 'nombre' => 'GRUPO AJFASA'),
            62 => array ('id' => 63, 'nombre' => 'GRUPO PHENIEL JOSUE MONROY SUCESORES, S.A.'),
            63 => array ('id' => 64, 'nombre' => 'GUATEMALA'),
            64 => array ('id' => 65, 'nombre' => 'HELOS, S.A.'),
            65 => array ('id' => 66, 'nombre' => 'IMPOMED'),
            66 => array ('id' => 67, 'nombre' => 'INC FARMACEUTICA'),
            67 => array ('id' => 68, 'nombre' => 'INDUSTRIAS DEL COLOR, S.A.'),
            68 => array ('id' => 69, 'nombre' => 'INFASA'),
            69 => array ('id' => 70, 'nombre' => 'JOHSON & JOHSON GUATEMALA, S.A.'),
            70 => array ('id' => 71, 'nombre' => 'KIMBERLY CLARCK'),
            71 => array ('id' => 72, 'nombre' => 'KIMIFARM, S.A.'),
            72 => array ('id' => 73, 'nombre' => 'KRAL PHARMACEUTICA INTERNACIONAL, S.A.'),
            73 => array ('id' => 74, 'nombre' => 'LAB BUSSIE, S.A.'),
            74 => array ('id' => 75, 'nombre' => 'LAB CHINOIN'),
            75 => array ('id' => 76, 'nombre' => 'LAB FARMACEUTICO THERFAM ( G.F.I. )'),
            76 => array ('id' => 77, 'nombre' => 'LAB GENERIX'),
            77 => array ('id' => 78, 'nombre' => 'LAB SENOSIAN'),
            78 => array ('id' => 79, 'nombre' => 'LAB SUDORIN, S.A.'),
            79 => array ('id' => 80, 'nombre' => 'LAB VIZCAINO, S.A.'),
            80 => array ('id' => 81, 'nombre' => 'LABORATORIO FARMACEUTICO VIDES'),
            81 => array ('id' => 82, 'nombre' => 'LABORATORIO SANTA ANA'),
            82 => array ('id' => 83, 'nombre' => 'LABORATORIO TRINIDAD'),
            83 => array ('id' => 84, 'nombre' => 'LABORATORIOS BONIN, S.A.'),
            84 => array ('id' => 85, 'nombre' => 'LABORATORIOS KRISMELL'),
            85 => array ('id' => 86, 'nombre' => 'LABORATORIOS PRODUCTOS INDUSTRIALES, S.A.'),
            86 => array ('id' => 87, 'nombre' => 'LABORATORIOS QUIFARMA S.A.'),
            87 => array ('id' => 88, 'nombre' => 'LABORATORIOS SAN LUIS, S.A.'),
            88 => array ('id' => 89, 'nombre' => 'LABORATORIOS SANTA FE'),
            89 => array ('id' => 90, 'nombre' => 'LABORATORIOS SANTE, S.A.'),
            90 => array ('id' => 91, 'nombre' => 'LABORATORIOS UNIDOS, S.A.'),
            91 => array ('id' => 92, 'nombre' => 'LABORATORIOS ZEPOL, S.A.'),
            92 => array ('id' => 93, 'nombre' => 'LAFCO, S.A.'),
            93 => array ('id' => 94, 'nombre' => 'LAMFER LABORATORIOS'),
            94 => array ('id' => 95, 'nombre' => 'LANCASCO, S.A.'),
            95 => array ('id' => 96, 'nombre' => 'LAPRIN'),
            96 => array ('id' => 97, 'nombre' => 'LEGSA'),
            97 => array ('id' => 98, 'nombre' => 'LORALVA, S.A.'),
            98 => array ('id' => 99, 'nombre' => 'M&MS'),
            99 => array ('id' => 100, 'nombre' => 'MARS INCORPORATED'),
            100 => array ('id' => 101, 'nombre' => 'MEAD JOHN SANS'),
            101 => array ('id' => 102, 'nombre' => 'MEDIPRODUCTS, S.A.'),
            102 => array ('id' => 103, 'nombre' => 'MEDPHARMA'),
            103 => array ('id' => 104, 'nombre' => 'MERCK CENTROAMERICA, S.A.'),
            104 => array ('id' => 105, 'nombre' => 'MONERAUX FARMACEUTICA'),
            105 => array ('id' => 106, 'nombre' => 'MULTIPROFARMA, S.A.'),
            106 => array ('id' => 107, 'nombre' => 'NEOETHICALS, S.A. (Caplin)'),
            107 => array ('id' => 108, 'nombre' => 'NESTLE GUATEMALA, S.A.'),
            108 => array ('id' => 109, 'nombre' => 'NEX CARE 3 M'),
            109 => array ('id' => 110, 'nombre' => 'NOVARTIS FARMACEUTICA'),
            110 => array ('id' => 111, 'nombre' => 'NUN´Z LABORATORIOS, S.A.'),
            111 => array ('id' => 112, 'nombre' => 'OSTEOMEDIC, S.A.'),
            112 => array ('id' => 113, 'nombre' => 'PAILL LABORATORIOS'),
            113 => array ('id' => 114, 'nombre' => 'PAINSA'),
            114 => array ('id' => 115, 'nombre' => 'PERFUMERIA WALKYRIA, S.A.'),
            115 => array ('id' => 116, 'nombre' => 'PFIZZER'),
            116 => array ('id' => 117, 'nombre' => 'PHARMACEUTICAL'),
            117 => array ('id' => 118, 'nombre' => 'PHARMADEL'),
            118 => array ('id' => 119, 'nombre' => 'PHARMATON, S.A.'),
            119 => array ('id' => 120, 'nombre' => 'PIERSAN CENTROAMERICANA, S.A.'),
            120 => array ('id' => 121, 'nombre' => 'POLIFARMA, S.A.'),
            121 => array ('id' => 122, 'nombre' => 'PRICESMART GUATEMALA S.A.'),
            122 => array ('id' => 123, 'nombre' => 'PRODUCTORA DE GOLOSINAS'),
            123 => array ('id' => 124, 'nombre' => 'PROMEGAL'),
            124 => array ('id' => 125, 'nombre' => 'RIVAPHARMA GMBH INTERNACIONAL'),
            125 => array ('id' => 126, 'nombre' => 'ROEMMERS DE CENTRO AMERICA S.A.'),
            126 => array ('id' => 127, 'nombre' => 'ROLAND LOUIS, S.A.'),
            127 => array ('id' => 128, 'nombre' => 'ROWA'),
            128 => array ('id' => 129, 'nombre' => 'SABA'),
            129 => array ('id' => 130, 'nombre' => 'SANOFY WINTHROP DE GUATAMALA'),
            130 => array ('id' => 131, 'nombre' => 'SCHERING PLOUJH AMERICANA'),
            131 => array ('id' => 132, 'nombre' => 'SELECTPHARMA, S.A.'),
            132 => array ('id' => 133, 'nombre' => 'STEIN CORPORACION'),
            133 => array ('id' => 134, 'nombre' => 'SUPERIOR'),
            134 => array ('id' => 135, 'nombre' => 'THE HERSHEY COMPANY'),
            135 => array ('id' => 136, 'nombre' => 'TIA ANGELITA'),
            136 => array ('id' => 137, 'nombre' => 'UNILEVER'),
            137 => array ('id' => 138, 'nombre' => 'UNILEVER S.A.'),
            138 => array ('id' => 139, 'nombre' => 'UNIPHARM, S.A.'),
            139 => array ('id' => 140, 'nombre' => 'VARIOS LAB'),
            140 => array ('id' => 141, 'nombre' => 'VIJOSA'),
            141 => array ('id' => 142, 'nombre' => 'IMPORTADORA DE PRODUCTOS FARMACEUTICOS, S.A. (IPRO'),
            142 => array ('id' => 143, 'nombre' => 'PROCTER & GAMBLE INTERAMERICANA DE GUATEMALA, S.A.'),
        ));
        
        
    }
}