<?php

/**
 * generate the currency classes
 *
 * @codeCoverageIgnore
 */
class CurrencyGenerator {

    //currencies
    private $currencies = [
        'AED' => ['name' => 'UAE Dirham', 'code' => 784, 'precision' => 2, 'subunit' => 100,],
        'AFN' => ['name' => 'Afghani', 'code' => 971, 'precision' => 2, 'subunit' => 100,],
        'ALL' => ['name' => 'Lek', 'code' => 8, 'precision' => 2, 'subunit' => 100,],
        'AMD' => ['name' => 'Armenian Dram', 'code' => 51, 'precision' => 2, 'subunit' => 100,],
        'ANG' => [
            'name'      => 'Netherlands Antillean Guilder',
            'code'      => 532,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'AOA' => ['name' => 'Kwanza', 'code' => 973, 'precision' => 2, 'subunit' => 100,],
        'ARS' => ['name' => 'Argentine Peso', 'code' => 32, 'precision' => 2, 'subunit' => 100,],
        'AUD' => ['name' => 'Australian Dollar', 'code' => 36, 'precision' => 2, 'subunit' => 100,],
        'AWG' => ['name' => 'Aruban Florin', 'code' => 533, 'precision' => 2, 'subunit' => 100,],
        'AZN' => [
            'name'      => 'Azerbaijanian Manat',
            'code'      => 944,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'BAM' => ['name' => 'Convertible Mark', 'code' => 977, 'precision' => 2, 'subunit' => 100,],
        'BBD' => ['name' => 'Barbados Dollar', 'code' => 52, 'precision' => 2, 'subunit' => 100,],
        'BDT' => ['name' => 'Taka', 'code' => 50, 'precision' => 2, 'subunit' => 100,],
        'BGN' => ['name' => 'Bulgarian Lev', 'code' => 975, 'precision' => 2, 'subunit' => 100,],
        'BHD' => ['name' => 'Bahraini Dinar', 'code' => 48, 'precision' => 3, 'subunit' => 1000,],
        'BIF' => ['name' => 'Burundi Franc', 'code' => 108, 'precision' => 0, 'subunit' => 100,],
        'BMD' => ['name' => 'Bermudian Dollar', 'code' => 60, 'precision' => 2, 'subunit' => 100,],
        'BND' => ['name' => 'Brunei Dollar', 'code' => 96, 'precision' => 2, 'subunit' => 100,],
        'BOB' => ['name' => 'Boliviano', 'code' => 68, 'precision' => 2, 'subunit' => 100,],
        'BOV' => ['name' => 'Mvdol', 'code' => 984, 'precision' => 2, 'subunit' => 100,],
        'BRL' => ['name' => 'Brazilian Real', 'code' => 986, 'precision' => 2, 'subunit' => 100,],
        'BSD' => ['name' => 'Bahamian Dollar', 'code' => 44, 'precision' => 2, 'subunit' => 100,],
        'BTN' => ['name' => 'Ngultrum', 'code' => 64, 'precision' => 2, 'subunit' => 100,],
        'BWP' => ['name' => 'Pula', 'code' => 72, 'precision' => 2, 'subunit' => 100,],
        'BYR' => ['name' => 'Belarussian Ruble', 'code' => 974, 'precision' => 0, 'subunit' => 100,],
        'BZD' => ['name' => 'Belize Dollar', 'code' => 84, 'precision' => 2, 'subunit' => 100,],
        'CAD' => ['name' => 'Canadian Dollar', 'code' => 124, 'precision' => 2, 'subunit' => 100,],
        'CDF' => ['name' => 'Congolese Franc', 'code' => 976, 'precision' => 2, 'subunit' => 100,],
        'CHE' => ['name' => 'WIR Euro', 'code' => 947, 'precision' => 2, 'subunit' => 100,],
        'CHF' => ['name' => 'Swiss Franc', 'code' => 756, 'precision' => 2, 'subunit' => 100,],
        'CHW' => ['name' => 'WIR Franc', 'code' => 948, 'precision' => 2, 'subunit' => 100,],
        'CLF' => [
            'name'      => 'Unidades de fomento',
            'code'      => 990,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'CLP' => ['name' => 'Chilean Peso', 'code' => 152, 'precision' => 0, 'subunit' => 100,],
        'CNY' => ['name' => 'Yuan Renminbi', 'code' => 156, 'precision' => 2, 'subunit' => 100,],
        'COP' => ['name' => 'Colombian Peso', 'code' => 170, 'precision' => 2, 'subunit' => 100,],
        'COU' => [
            'name'      => 'Unidad de Valor Real',
            'code'      => 970,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'CRC' => ['name' => 'Costa Rican Colon', 'code' => 188, 'precision' => 2, 'subunit' => 100,],
        'CUC' => ['name' => 'Peso Convertible', 'code' => 931, 'precision' => 2, 'subunit' => 100,],
        'CUP' => ['name' => 'Cuban Peso', 'code' => 192, 'precision' => 2, 'subunit' => 100,],
        'CVE' => ['name' => 'Cape Verde Escudo', 'code' => 132, 'precision' => 2, 'subunit' => 100,],
        'CZK' => ['name' => 'Czech Koruna', 'code' => 203, 'precision' => 2, 'subunit' => 100,],
        'DJF' => ['name' => 'Djibouti Franc', 'code' => 262, 'precision' => 0, 'subunit' => 100,],
        'DKK' => ['name' => 'Danish Krone', 'code' => 208, 'precision' => 2, 'subunit' => 100,],
        'DOP' => ['name' => 'Dominican Peso', 'code' => 214, 'precision' => 2, 'subunit' => 100,],
        'DZD' => ['name' => 'Algerian Dinar', 'code' => 12, 'precision' => 2, 'subunit' => 100,],
        'EGP' => ['name' => 'Egyptian Pound', 'code' => 818, 'precision' => 2, 'subunit' => 100,],
        'ERN' => ['name' => 'Nakfa', 'code' => 232, 'precision' => 2, 'subunit' => 100,],
        'ETB' => ['name' => 'Ethiopian Birr', 'code' => 230, 'precision' => 2, 'subunit' => 100,],
        'EUR' => ['name' => 'Euro', 'code' => 978, 'precision' => 2, 'subunit' => 100,],
        'FJD' => ['name' => 'Fiji Dollar', 'code' => 242, 'precision' => 2, 'subunit' => 100,],
        'FKP' => [
            'name'      => 'Falkland Islands Pound',
            'code'      => 238,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'GBP' => ['name' => 'Pound Sterling', 'code' => 826, 'precision' => 2, 'subunit' => 100,],
        'GEL' => ['name' => 'Lari', 'code' => 981, 'precision' => 2, 'subunit' => 100,],
        'GHS' => ['name' => 'Ghana Cedi', 'code' => 936, 'precision' => 2, 'subunit' => 100,],
        'GIP' => ['name' => 'Gibraltar Pound', 'code' => 292, 'precision' => 2, 'subunit' => 100,],
        'GMD' => ['name' => 'Dalasi', 'code' => 270, 'precision' => 2, 'subunit' => 100,],
        'GNF' => ['name' => 'Guinea Franc', 'code' => 324, 'precision' => 0, 'subunit' => 100,],
        'GTQ' => ['name' => 'Quetzal', 'code' => 320, 'precision' => 2, 'subunit' => 100,],
        'GYD' => ['name' => 'Guyana Dollar', 'code' => 328, 'precision' => 2, 'subunit' => 100,],
        'HKD' => ['name' => 'Hong Kong Dollar', 'code' => 344, 'precision' => 2, 'subunit' => 100,],
        'HNL' => ['name' => 'Lempira', 'code' => 340, 'precision' => 2, 'subunit' => 100,],
        'HRK' => ['name' => 'Croatian Kuna', 'code' => 191, 'precision' => 2, 'subunit' => 100,],
        'HTG' => ['name' => 'Gourde', 'code' => 332, 'precision' => 2, 'subunit' => 100,],
        'HUF' => ['name' => 'Forint', 'code' => 348, 'precision' => 2, 'subunit' => 100,],
        'IDR' => ['name' => 'Rupiah', 'code' => 360, 'precision' => 2, 'subunit' => 100,],
        'ILS' => [
            'name'      => 'New Israeli Sheqel',
            'code'      => 376,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'INR' => ['name' => 'Indian Rupee', 'code' => 356, 'precision' => 2, 'subunit' => 100,],
        'IQD' => ['name' => 'Iraqi Dinar', 'code' => 368, 'precision' => 3, 'subunit' => 1000,],
        'IRR' => ['name' => 'Iranian Rial', 'code' => 364, 'precision' => 2, 'subunit' => 100,],
        'ISK' => ['name' => 'Iceland Krona', 'code' => 352, 'precision' => 0, 'subunit' => 100,],
        'JMD' => ['name' => 'Jamaican Dollar', 'code' => 388, 'precision' => 2, 'subunit' => 100,],
        'JOD' => ['name' => 'Jordanian Dinar', 'code' => 400, 'precision' => 3, 'subunit' => 100,],
        'JPY' => ['name' => 'Yen', 'code' => 392, 'precision' => 0, 'subunit' => 100,],
        'KES' => ['name' => 'Kenyan Shilling', 'code' => 404, 'precision' => 2, 'subunit' => 100,],
        'KGS' => ['name' => 'Som', 'code' => 417, 'precision' => 2, 'subunit' => 100,],
        'KHR' => ['name' => 'Riel', 'code' => 116, 'precision' => 2, 'subunit' => 100,],
        'KMF' => ['name' => 'Comoro Franc', 'code' => 174, 'precision' => 0, 'subunit' => 100,],
        'KPW' => ['name' => 'North Korean Won', 'code' => 408, 'precision' => 2, 'subunit' => 100,],
        'KRW' => ['name' => 'Won', 'code' => 410, 'precision' => 0, 'subunit' => 100,],
        'KWD' => ['name' => 'Kuwaiti Dinar', 'code' => 414, 'precision' => 3, 'subunit' => 1000,],
        'KYD' => [
            'name'      => 'Cayman Islands Dollar',
            'code'      => 136,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'KZT' => ['name' => 'Tenge', 'code' => 398, 'precision' => 2, 'subunit' => 100,],
        'LAK' => ['name' => 'Kip', 'code' => 418, 'precision' => 2, 'subunit' => 100,],
        'LBP' => ['name' => 'Lebanese Pound', 'code' => 422, 'precision' => 2, 'subunit' => 100,],
        'LKR' => ['name' => 'Sri Lanka Rupee', 'code' => 144, 'precision' => 2, 'subunit' => 100,],
        'LRD' => ['name' => 'Liberian Dollar', 'code' => 430, 'precision' => 2, 'subunit' => 100,],
        'LSL' => ['name' => 'Loti', 'code' => 426, 'precision' => 2, 'subunit' => 100,],
        'LTL' => ['name' => 'Lithuanian Litas', 'code' => 440, 'precision' => 2, 'subunit' => 100,],
        'LVL' => ['name' => 'Latvian Lats', 'code' => 428, 'precision' => 2, 'subunit' => 100,],
        'LYD' => ['name' => 'Libyan Dinar', 'code' => 434, 'precision' => 3, 'subunit' => 1000,],
        'MAD' => ['name' => 'Moroccan Dirham', 'code' => 504, 'precision' => 2, 'subunit' => 100,],
        'MDL' => ['name' => 'Moldovan Leu', 'code' => 498, 'precision' => 2, 'subunit' => 100,],
        'MGA' => ['name' => 'Malagasy Ariary', 'code' => 969, 'precision' => 2, 'subunit' => 5,],
        'MKD' => ['name' => 'Denar', 'code' => 807, 'precision' => 2, 'subunit' => 100,],
        'MMK' => ['name' => 'Kyat', 'code' => 104, 'precision' => 2, 'subunit' => 100,],
        'MNT' => ['name' => 'Tugrik', 'code' => 496, 'precision' => 2, 'subunit' => 100,],
        'MOP' => ['name' => 'Pataca', 'code' => 446, 'precision' => 2, 'subunit' => 100,],
        'MRO' => ['name' => 'Ouguiya', 'code' => 478, 'precision' => 2, 'subunit' => 5,],
        'MUR' => ['name' => 'Mauritius Rupee', 'code' => 480, 'precision' => 2, 'subunit' => 100,],
        'MVR' => ['name' => 'Rufiyaa', 'code' => 462, 'precision' => 2, 'subunit' => 100,],
        'MWK' => ['name' => 'Kwacha', 'code' => 454, 'precision' => 2, 'subunit' => 100,],
        'MXN' => ['name' => 'Mexican Peso', 'code' => 484, 'precision' => 2, 'subunit' => 100,],
        'MXV' => [
            'name'      => 'Mexican Unidad de Inversion (UDI)',
            'code'      => 979,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'MYR' => ['name' => 'Malaysian Ringgit', 'code' => 458, 'precision' => 2, 'subunit' => 100,],
        'MZN' => [
            'name'      => 'Mozambique Metical',
            'code'      => 943,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'NAD' => ['name' => 'Namibia Dollar', 'code' => 516, 'precision' => 2, 'subunit' => 100,],
        'NGN' => ['name' => 'Naira', 'code' => 566, 'precision' => 2, 'subunit' => 100,],
        'NIO' => ['name' => 'Cordoba Oro', 'code' => 558, 'precision' => 2, 'subunit' => 100,],
        'NOK' => ['name' => 'Norwegian Krone', 'code' => 578, 'precision' => 2, 'subunit' => 100,],
        'NPR' => ['name' => 'Nepalese Rupee', 'code' => 524, 'precision' => 2, 'subunit' => 100,],
        'NZD' => [
            'name'      => 'New Zealand Dollar',
            'code'      => 554,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'OMR' => ['name' => 'Rial Omani', 'code' => 512, 'precision' => 3, 'subunit' => 1000,],
        'PAB' => ['name' => 'Balboa', 'code' => 590, 'precision' => 2, 'subunit' => 100,],
        'PEN' => ['name' => 'Nuevo Sol', 'code' => 604, 'precision' => 2, 'subunit' => 100,],
        'PGK' => ['name' => 'Kina', 'code' => 598, 'precision' => 2, 'subunit' => 100,],
        'PHP' => ['name' => 'Philippine Peso', 'code' => 608, 'precision' => 2, 'subunit' => 100,],
        'PKR' => ['name' => 'Pakistan Rupee', 'code' => 586, 'precision' => 2, 'subunit' => 100,],
        'PLN' => ['name' => 'Zloty', 'code' => 985, 'precision' => 2, 'subunit' => 100,],
        'PYG' => ['name' => 'Guarani', 'code' => 600, 'precision' => 0, 'subunit' => 100,],
        'QAR' => ['name' => 'Qatari Rial', 'code' => 634, 'precision' => 2, 'subunit' => 100,],
        'RON' => ['name' => 'New Romanian Leu', 'code' => 946, 'precision' => 2, 'subunit' => 100,],
        'RSD' => ['name' => 'Serbian Dinar', 'code' => 941, 'precision' => 2, 'subunit' => 100,],
        'RUB' => ['name' => 'Russian Ruble', 'code' => 643, 'precision' => 2, 'subunit' => 100,],
        'RWF' => ['name' => 'Rwanda Franc', 'code' => 646, 'precision' => 0, 'subunit' => 100,],
        'SAR' => ['name' => 'Saudi Riyal', 'code' => 682, 'precision' => 2, 'subunit' => 100,],
        'SBD' => [
            'name'      => 'Solomon Islands Dollar',
            'code'      => 90,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'SCR' => ['name' => 'Seychelles Rupee', 'code' => 690, 'precision' => 2, 'subunit' => 100,],
        'SDG' => ['name' => 'Sudanese Pound', 'code' => 938, 'precision' => 2, 'subunit' => 100,],
        'SEK' => ['name' => 'Swedish Krona', 'code' => 752, 'precision' => 2, 'subunit' => 100,],
        'SGD' => ['name' => 'Singapore Dollar', 'code' => 702, 'precision' => 2, 'subunit' => 100,],
        'SHP' => [
            'name'      => 'Saint Helena Pound',
            'code'      => 654,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'SLL' => ['name' => 'Leone', 'code' => 694, 'precision' => 2, 'subunit' => 100,],
        'SOS' => ['name' => 'Somali Shilling', 'code' => 706, 'precision' => 2, 'subunit' => 100,],
        'SRD' => ['name' => 'Surinam Dollar', 'code' => 968, 'precision' => 2, 'subunit' => 100,],
        'SSP' => [
            'name'      => 'South Sudanese Pound',
            'code'      => 728,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'STD' => ['name' => 'Dobra', 'code' => 678, 'precision' => 2, 'subunit' => 100,],
        'SVC' => ['name' => 'El Salvador Colon', 'code' => 222, 'precision' => 2, 'subunit' => 100,],
        'SYP' => ['name' => 'Syrian Pound', 'code' => 760, 'precision' => 2, 'subunit' => 100,],
        'SZL' => ['name' => 'Lilangeni', 'code' => 748, 'precision' => 2, 'subunit' => 100,],
        'THB' => ['name' => 'Baht', 'code' => 764, 'precision' => 2, 'subunit' => 100,],
        'TJS' => ['name' => 'Somoni', 'code' => 972, 'precision' => 2, 'subunit' => 100,],
        'TMT' => [
            'name'      => 'Turkmenistan New Manat',
            'code'      => 934,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'TND' => ['name' => 'Tunisian Dinar', 'code' => 788, 'precision' => 3, 'subunit' => 1000,],
        'TOP' => ['name' => 'Pa’anga', 'code' => 776, 'precision' => 2, 'subunit' => 100,],
        'TRY' => ['name' => 'Turkish Lira', 'code' => 949, 'precision' => 2, 'subunit' => 100,],
        'TTD' => [
            'name'      => 'Trinidad and Tobago Dollar',
            'code'      => 780,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'TWD' => ['name' => 'New Taiwan Dollar', 'code' => 901, 'precision' => 2, 'subunit' => 100,],
        'TZS' => [
            'name'      => 'Tanzanian Shilling',
            'code'      => 834,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'UAH' => ['name' => 'Hryvnia', 'code' => 980, 'precision' => 2, 'subunit' => 100,],
        'UGX' => ['name' => 'Uganda Shilling', 'code' => 800, 'precision' => 0, 'subunit' => 100,],
        'USD' => ['name' => 'US Dollar', 'code' => 840, 'precision' => 2, 'subunit' => 100,],
        'USN' => [
            'name'      => 'US Dollar (Next day)',
            'code'      => 997,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'USS' => [
            'name'      => 'US Dollar (Same day)',
            'code'      => 998,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'UYI' => [
            'name'      => 'Uruguay Peso en Unidades Indexadas (URUIURUI)',
            'code'      => 940,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'UYU' => ['name' => 'Peso Uruguayo', 'code' => 858, 'precision' => 2, 'subunit' => 100,],
        'UZS' => ['name' => 'Uzbekistan Sum', 'code' => 860, 'precision' => 2, 'subunit' => 100,],
        'VEF' => ['name' => 'Bolivar', 'code' => 937, 'precision' => 2, 'subunit' => 100,],
        'VND' => ['name' => 'Dong', 'code' => 704, 'precision' => 0, 'subunit' => 10,],
        'VUV' => ['name' => 'Vatu', 'code' => 548, 'precision' => 0, 'subunit' => 1,],
        'WST' => ['name' => 'Tala', 'code' => 882, 'precision' => 2, 'subunit' => 100,],
        'XAF' => ['name' => 'CFA Franc BEAC', 'code' => 950, 'precision' => 0, 'subunit' => 100,],
        'XAG' => ['name' => 'Silver', 'code' => 961, 'precision' => 0, 'subunit' => 100,],
        'XAU' => ['name' => 'Gold', 'code' => 959, 'precision' => 0, 'subunit' => 100,],
        'XBA' => [
            'name'      => 'Bond Markets Unit European Composite Unit (EURCO)',
            'code'      => 955,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XBB' => [
            'name'      => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
            'code'      => 956,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XBC' => [
            'name'      => 'Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',
            'code'      => 957,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XBD' => [
            'name'      => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
            'code'      => 958,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XCD' => [
            'name'      => 'East Caribbean Dollar',
            'code'      => 951,
            'precision' => 2,
            'subunit'   => 100,
        ],
        'XDR' => [
            'name'      => 'SDR (Special Drawing Right)',
            'code'      => 960,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XFU' => ['name' => 'UIC-Franc', 'code' => 958, 'precision' => 0, 'subunit' => 100,],
        'XOF' => ['name' => 'CFA Franc BCEAO', 'code' => 952, 'precision' => 0, 'subunit' => 100,],
        'XPD' => ['name' => 'Palladium', 'code' => 964, 'precision' => 0, 'subunit' => 100,],
        'XPF' => ['name' => 'CFP Franc', 'code' => 953, 'precision' => 0, 'subunit' => 100,],
        'XPT' => ['name' => 'Platinum', 'code' => 962, 'precision' => 0, 'subunit' => 100,],
        'XSU' => ['name' => 'Sucre', 'code' => 994, 'precision' => 0, 'subunit' => 100,],
        'XTS' => [
            'name'      => 'Codes specifically reserved for testing purposes',
            'code'      => 963,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XUA' => [
            'name'      => 'ADB Unit of Account',
            'code'      => 965,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'XXX' => [
            'name'      => 'The codes assigned for transactions where no currency is involved',
            'code'      => 999,
            'precision' => 0,
            'subunit'   => 100,
        ],
        'YER' => ['name' => 'Yemeni Rial', 'code' => 886, 'precision' => 2, 'subunit' => 100,],
        'ZAR' => ['name' => 'Rand', 'code' => 710, 'precision' => 2, 'subunit' => 100,],
        'ZMW' => ['name' => 'Zambian Kwacha', 'code' => 967, 'precision' => 2, 'subunit' => 100,],
        'ZWL' => ['name' => 'Zimbabwe Dollar', 'code' => 932, 'precision' => 2, 'subunit' => 100,]
    ];

    /**
     * generate the files
     */
    public function generate(){

        //load template
        $template = file_get_contents('template.tpl');

        //change into currencies directory
        chdir('../currencies');

        //loop
        foreach($this->currencies as $currency => $properties){

            //replace
            $file =
                str_replace('{{$currency}}', $currency, str_replace('{{$name}}', $properties['name'], str_replace('{{$code}}', $properties['code'], str_replace('{{$precision}}', $properties['precision'], str_replace('{{$subunit}}', $properties['subunit'], $template)))));

            //file name
            $filename = $currency . '.php';

            //create file
            if(file_put_contents($filename, $file)){

                echo '+ Created ' . $filename;
            }

            else{
                echo '= Unable to create ' . $filename;
            }
            echo '<br />';

        }
    }

}