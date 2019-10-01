---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Error reasons management

APIs for managing error reasons
<!-- START_303577e8671ae83de45743ebc8ae0b02 -->
## List of reasons

This endpoint retrieves all reasons.
Order by code, ASC.
Get reasons according to language = user->interface_language

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/reasons" 
```

```javascript
const url = new URL("http://localhost/api/reasons");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "User not found."
}
```

### HTTP Request
`GET api/reasons`


<!-- END_303577e8671ae83de45743ebc8ae0b02 -->

<!-- START_2ac66414f529e06bc175c8483a5de8ca -->
## Create reason

This endpoint create a specific reason.

Parameters => name (text, mandatory), code (text, mandatory), language (text, mandatory)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X POST "http://localhost/api/reasons" 
```

```javascript
const url = new URL("http://localhost/api/reasons");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/reasons`


<!-- END_2ac66414f529e06bc175c8483a5de8ca -->

#Languages

APIs for retrieving languages
<!-- START_d29df5fd928092000b93edb0dadbff5d -->
## List of languages

Get all languages options availables in Amara (Amara API)

> Example request:

```bash
curl -X GET -G "http://localhost/api/languages" 
```

```javascript
const url = new URL("http://localhost/api/languages");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": true,
    "data": {
        "languages": {
            "gv": "Manx",
            "gu": "Gujarati",
            "scn": "Sicilian",
            "mfe": "Mauritian Creole",
            "szl": "Silesian",
            "nd": "North Ndebele",
            "sco": "Scots",
            "zh-hk": "Chinese, Traditional (Hong Kong)",
            "mnk": "Mandinka",
            "pt-br": "Portuguese, Brazilian",
            "hai": "Haida",
            "ga": "Irish",
            "es-ar": "Spanish, Argentinian",
            "gn": "Guarani",
            "gl": "Galician",
            "lld": "Ladin",
            "tsn": "Tswana",
            "lg": "Ganda",
            "pnb": "Western Punjabi",
            "lb": "Luxembourgish",
            "enq": "Enga",
            "haa": "Hän",
            "tt": "Tatar",
            "nso": "Northern Sotho",
            "tr": "Turkish",
            "skx": "Seko Padang",
            "bnt": "Ibibio",
            "lv": "Latvian",
            "to": "Tonga",
            "haz": "Hazaragi",
            "lu": "Luba-Katagana",
            "tsz": "Purepecha",
            "cly": "Eastern Chatino",
            "th": "Thai",
            "fy-nl": "Frisian",
            "su": "Sundanese",
            "lkt": "Lakota",
            "te": "Telugu",
            "zh-sg": "Chinese, Simplified (Singaporean)",
            "ksh": "Colognian",
            "fil": "Filipino",
            "haw": "Hawaiian",
            "ami": "Amis",
            "amh": "Amharic",
            "ty": "Tahitian",
            "tob": "Qom (Toba)",
            "ceb": "Cebuano",
            "mos": "Mooré (Mossi)",
            "de": "German",
            "da": "Danish",
            "za": "Zhuang, Chuang",
            "czn": "Zenzontepec Chatino",
            "moh": "Mohawk",
            "dz": "Dzongkha",
            "rm": "Romansh",
            "dv": "Divehi",
            "vls": "Flemish",
            "tw": "Twi",
            "shp": "Shipibo-Conibo",
            "crs": "Seselwa Creole French",
            "ro": "Romanian",
            "gug": "Paraguayan Guaraní",
            "uz": "Uzbek",
            "mni": "Manipuri",
            "wol": "Wolof",
            "ibo": "Igbo",
            "de-ch": "German (Switzerland)",
            "yor": "Yoruba",
            "gd": "Scottish Gaelic",
            "x-other": "Other",
            "wbl": "Wakhi",
            "bam": "Bambara",
            "trv": "Seediq",
            "arq": "Algerian Arabic",
            "eo": "Esperanto",
            "en": "English",
            "zh": "Chinese, Yue",
            "bo": "Tibetan",
            "pan": "Punjabi",
            "ee": "Ewe",
            "xho": "Xhosa",
            "arz": "Egyptian Arabic",
            "kaa": "Karakalpak",
            "mh": "Marshallese",
            "arc": "Aramaic",
            "meta-wiki": "Metadata: Wikipedia",
            "eu": "Basque",
            "et": "Estonian",
            "ur": "Urdu",
            "tet": "Tetum",
            "es": "Spanish",
            "en-gb": "English, British",
            "ru": "Russian",
            "lus": "Mizo",
            "lut": "Lushootseed",
            "mus": "Muscogee",
            "lua": "Luba-Kasai",
            "ry": "Rusyn",
            "zh-cn": "Chinese, Simplified",
            "aeb": "Tunisian Arabic",
            "tl": "Tagalog",
            "iro": "Iroquoian languages",
            "kau": "Kanuri",
            "got": "Gothic",
            "hch": "Huichol",
            "oji": "Ojibwe",
            "dsb": "Lower Sorbian",
            "jv": "Javanese",
            "cnh": "Hakha Chin",
            "luo": "Luo",
            "hsb": "Upper Sorbian",
            "be": "Belarusian",
            "bg": "Bulgarian",
            "run": "Rundi",
            "ba": "Bashkir",
            "wa": "Walloon",
            "ast": "Asturian",
            "fr-ca": "French (Canada)",
            "bn": "Bengali",
            "sby": "Soli",
            "bh": "Bihari",
            "bi": "Bislama",
            "orm": "Oromo",
            "meta-tw": "Metadata: Twitter",
            "br": "Breton",
            "bs": "Bosnian",
            "rup": "Macedo",
            "ss": "Swati",
            "ja": "Japanese",
            "zza": "Zazaki",
            "ctu": "Chol, Tumbalá",
            "umb": "Umbundu",
            "ace": "Acehnese",
            "fa": "Persian",
            "ilo": "Ilocano",
            "la": "Latin",
            "gwi": "Gwich'in",
            "ctd": "Chin, Tedim",
            "srp": "Montenegrin",
            "ltg": "Latgalian",
            "cta": "Tataltepec Chatino",
            "st": "Southern Sotho",
            "lo": "Lao",
            "yua": "Maya, Yucatán",
            "que": "Quechua",
            "aka": "Akan",
            "tlh": "Klingon",
            "os": "Ossetian, Ossetic",
            "or": "Oriya",
            "zul": "Zulu",
            "mad": "Madurese",
            "ch": "Chamorro",
            "co": "Corsican",
            "ase": "American Sign Language",
            "el": "Greek",
            "ca": "Catalan",
            "som": "Somali",
            "ug": "Uyghur",
            "ce": "Chechen",
            "meta-audio": "Metadata: Audio Description",
            "sm": "Samoan",
            "cy": "Welsh",
            "sr-latn": "Serbian, Latin",
            "sot": "Sotho",
            "sgn": "Sign Languages",
            "cs": "Czech",
            "cr": "Cree",
            "li": "Limburgish",
            "cv": "Chuvash",
            "cu": "Church Slavic",
            "ve": "Venda",
            "ps": "Pashto",
            "pt": "Portuguese",
            "kon": "Kongo",
            "swa": "Swahili",
            "zh-tw": "Chinese, Traditional",
            "yaq": "Yaqui",
            "lt": "Lithuanian",
            "cho": "Choctaw",
            "koy": "Koyukon",
            "chr": "Cherokee",
            "frp": "Franco-Provençal (Arpitan)",
            "tg": "Tajik",
            "vi": "Vietnamese",
            "loz": "Lozi",
            "dje": "Zarma",
            "wau": "Wauja",
            "pi": "Pali",
            "ncj": "Nahuatl, Northern Puebla",
            "pl": "Polish",
            "tk": "Turkmen",
            "hz": "Herero",
            "hy": "Armenian",
            "es-419": "Spanish (Latin America)",
            "hr": "Croatian",
            "raj": "Rajasthani",
            "pcm": "Nigerian Pidgin",
            "ht": "Creole, Haitian",
            "hu": "Hungarian",
            "nci": "Nahuatl, Classical",
            "hmn": "Hmong",
            "hi": "Hindi",
            "hup": "Hupa",
            "ho": "Hiri Motu",
            "hus": "Huastec, Veracruz",
            "hb": "HamariBoli (Roman Hindi-Urdu)",
            "meta-geo": "Metadata: Geo",
            "qvi": "Quichua, Imbabura Highland",
            "bug": "Buginese",
            "he": "Hebrew",
            "es-ni": "Spanish, Nicaraguan",
            "mlg": "Malagasy",
            "bem": "Bemba (Zambia)",
            "ml": "Malayalam",
            "mo": "Moldavian, Moldovan",
            "mn": "Mongolian",
            "mi": "Maori",
            "ik": "Inupia",
            "mk": "Macedonian",
            "hau": "Hausa",
            "cak": "Cakchiquel, Central",
            "mt": "Maltese",
            "toj": "Tojolabal",
            "pcd": "Picard",
            "ms": "Malay",
            "mr": "Marathi",
            "ber": "Berber",
            "inh": "Ingush",
            "ful": "Fula",
            "ta": "Tamil",
            "my": "Burmese",
            "aa": "Afar",
            "yi": "Yiddish",
            "ab": "Abkhazian",
            "ae": "Avestan",
            "io": "Ido",
            "tar": "Tarahumara, Central",
            "af": "Afrikaans",
            "oc": "Occitan",
            "is": "Icelandic",
            "iu": "Inuktitut",
            "it": "Italian",
            "an": "Aragonese",
            "ii": "Sichuan Yi",
            "ia": "Interlingua",
            "as": "Assamese",
            "ar": "Arabic",
            "rar": "Cook Islands Māori",
            "taa": "Benhti Kenaga’",
            "prs": "Dari",
            "av": "Avaric",
            "ay": "Aymara",
            "tzh": "Tzeltal, Oxchuc",
            "az": "Azerbaijani",
            "ie": "Interlingue",
            "id": "Indonesian",
            "tzo": "Tzotzil, Venustiano Carranza",
            "sat": "Santali",
            "pap": "Papiamento",
            "cku": "Koasati",
            "sr": "Serbian",
            "nl": "Dutch",
            "hoc": "Ho",
            "nn": "Norwegian Nynorsk",
            "na": "Naurunan",
            "lin": "Lingala",
            "nan": "Hokkien",
            "ne": "Nepali",
            "tir": "Tigrinya",
            "hoi": "Holikachuk",
            "efi": "Efik",
            "vo": "Volapuk",
            "sk": "Slovak",
            "zam": "Zapotec, Miahuatlán",
            "nr": "Southern Ndebele",
            "nya": "Chewa",
            "pam": "Kapampangan",
            "nv": "Navajo",
            "fr": "French",
            "meta-video": "Metadata: Video Description",
            "sto": "Stoney (Nakoda)",
            "ng": "Ndonga",
            "ts": "Tsonga",
            "sna": "Shona",
            "sv": "Swedish",
            "sl": "Slovenian",
            "hwc": "Hawai'i Creole English",
            "kik": "Gikuyu",
            "kar": "Karen",
            "kin": "Kinyarwanda",
            "ff": "Fulah",
            "fi": "Finnish",
            "fj": "Fijian",
            "sa": "Sanskrit",
            "uk": "Ukrainian",
            "fo": "Faroese",
            "es-mx": "Spanish, Mexican",
            "ka": "Georgian",
            "gsw": "Swiss German",
            "ckb": "Kurdish (Central)",
            "kk": "Kazakh",
            "kj": "Kuanyama, Kwanyama",
            "sq": "Albanian",
            "tao": "Yami (Tao)",
            "ko": "Korean",
            "kn": "Kannada",
            "km": "Khmer",
            "kl": "Greenlandic",
            "ks": "Kashmiri",
            "si": "Sinhala",
            "sh": "Serbo-Croatian",
            "kw": "Cornish",
            "kv": "Komi",
            "ku": "Kurdish",
            "luy": "Luhya",
            "sc": "Sardinian",
            "ky": "Kyrgyz",
            "sg": "Sango",
            "nb": "Norwegian Bokmal",
            "se": "Northern Sami",
            "sd": "Sindhi"
        }
    },
    "message": ""
}
```

### HTTP Request
`GET api/languages`


<!-- END_d29df5fd928092000b93edb0dadbff5d -->

#Subtitles

APIs for retrieving subtitles
<!-- START_43c021228adb6b27fb7c1232579d25e3 -->
## Show Subtitle

Show a specific subtitle according to Amara API.

Parameter => video_id, language_code, format, version

> Example request:

```bash
curl -X GET -G "http://localhost/api/subtitle" 
```

```javascript
const url = new URL("http://localhost/api/subtitle");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Undefined index: video_id",
    "exception": "ErrorException",
    "file": "\/var\/www\/html\/dreamtv\/app\/AmaraAPI.php",
    "line": 1247,
    "trace": [
        {
            "file": "\/var\/www\/html\/dreamtv\/app\/AmaraAPI.php",
            "line": 1247,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/app\/Http\/Controllers\/SubtitleController.php",
            "line": 28,
            "function": "getSubtitle",
            "class": "App\\AmaraAPI",
            "type": "->"
        },
        {
            "function": "show",
            "class": "App\\Http\\Controllers\\SubtitleController",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 212,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 169,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 679,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 681,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 656,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 622,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 611,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 272,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 256,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 33,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php",
            "line": 54,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php",
            "line": 196,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php",
            "line": 57,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/subtitle`


<!-- END_43c021228adb6b27fb7c1232579d25e3 -->

#Tasks

APIs for retrieving tasks
<!-- START_4227b9e5e54912af051e8dd5472afbce -->
## List of tasks

Display a listing of the resource.

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/tasks" 
```

```javascript
const url = new URL("http://localhost/api/tasks");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "User not found."
}
```

### HTTP Request
`GET api/tasks`


<!-- END_4227b9e5e54912af051e8dd5472afbce -->

#User account

APIs for retrieving users account
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Get all user accounts

Display a listing of the resource.

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/users" 
```

```javascript
const url = new URL("http://localhost/api/users");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 2,
            "name": "HaystackTV",
            "type": "com.haystack.android.livechannel.account",
            "token": "Bearer $2y$10$n0ZtSOsiD7PnerFUEIj98OUPq7d0WVGF3VywKk1r1Tly7uqiDqROm",
            "interface_mode": "advanced",
            "interface_language": "en",
            "sub_language": "NN",
            "audio_language": "NN",
            "created_at": "2018-10-01 13:25:38",
            "updated_at": "2018-10-01 13:25:58"
        },
        {
            "id": 3,
            "name": "Bloomberg Live TV",
            "type": "com.bloomberg.btva.tvinput.account",
            "token": "Bearer $2y$10$C9SUOrvfRn6ejlAdo5zXieZctNMZ9sPkWozAtaEYU\/P0GMTRhmRAC",
            "interface_mode": "beginner",
            "interface_language": "en",
            "sub_language": "NN",
            "audio_language": "NN",
            "created_at": "2018-10-18 12:50:41",
            "updated_at": "2018-10-18 12:51:33"
        },
        {
            "id": 18,
            "name": "test",
            "type": "com.google",
            "token": "Bearer $2y$10$8EVrhHKG5hAJUy9zTYj0Nuy765N5.c1OUxRK15ym0Ua1H4UrmgXCq",
            "interface_mode": "beginner",
            "interface_language": "pl",
            "sub_language": "en",
            "audio_language": "NN",
            "created_at": "2019-02-04 23:51:07",
            "updated_at": "2019-02-04 23:56:58"
        },
        {
            "id": 20,
            "name": "manuel.nunhez.pl@gmail.com",
            "type": "com.google",
            "token": "Bearer $2y$10$SC59.rIXCVUmvB2wPzpTYuscT1k1D8nAUrvTyt0eNsl\/YCAKCsAt2",
            "interface_mode": "beginner",
            "interface_language": "pl",
            "sub_language": "es",
            "audio_language": "zh",
            "created_at": "2019-02-06 15:21:58",
            "updated_at": "2019-02-06 15:38:47"
        }
    ],
    "message": ""
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create user account

Store a newly created resource in storage.

Parameters => name (text, mandatory), type (text, mandatory), interface_mode (text, nullable, default: "beginner"), interface_language (text, nullable, default: "pl"), sub_language (text, nullable, default: All languages), audio_language (text, nullable, default: All languages)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X POST "http://localhost/api/users" 
```

```javascript
const url = new URL("http://localhost/api/users");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_c527dcd7f3e7400067a0c62602aeaf10 -->
## Update user

Update the specified resource in storage.

Parameters => audio_language (text, nullable), interface_mode (text, nullable), interface_language (text, nullable), sub_language (text, nullable)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X PUT "http://localhost/api/users" 
```

```javascript
const url = new URL("http://localhost/api/users");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/users`


<!-- END_c527dcd7f3e7400067a0c62602aeaf10 -->

#User tasks

APIs for retrieving user tasks
<!-- START_ac5935bd19f595d5a48d6eb55c08b9ed -->
## List of user tasks

Display a listing of the resource.

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/users/task" 
```

```javascript
const url = new URL("http://localhost/api/users/task");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "User not found."
}
```

### HTTP Request
`GET api/users/task`


<!-- END_ac5935bd19f595d5a48d6eb55c08b9ed -->

<!-- START_dd9d1f58556ef0b06cf19dbcb2b493c7 -->
## Save User task
Store a newly created resource in storage.

Parameters => task_id (mandatory, text), sub_version (mandatory, text), subtitle_position (mandatory, text)
Requires user token - header 'Authorization'

> Example request:

```bash
curl -X POST "http://localhost/api/users/task" 
```

```javascript
const url = new URL("http://localhost/api/users/task");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/users/task`


<!-- END_dd9d1f58556ef0b06cf19dbcb2b493c7 -->

#UservVideosList

APIs for retrieving users videos list
<!-- START_d5ccf352e65185783b8211147638797c -->
## Get all videos from user list.

Display a listing of the resource.
Pagination mode : Displays 16 items per page

QueryParams => 'page':<number_page>  integer

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/users/videos" 
```

```javascript
const url = new URL("http://localhost/api/users/videos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "User not found."
}
```

### HTTP Request
`GET api/users/videos`


<!-- END_d5ccf352e65185783b8211147638797c -->

<!-- START_8c260f0c232dc23d8da7f109cae8e344 -->
## Add video to user video list
Store a newly created resource in storage.

Parameters => video_id (text, mandatory)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X POST "http://localhost/api/users/videos" 
```

```javascript
const url = new URL("http://localhost/api/users/videos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/users/videos`


<!-- END_8c260f0c232dc23d8da7f109cae8e344 -->

<!-- START_b3b04092df632a3d232a76098d8677e3 -->
## Remove Video from UserVideoList

Parameters => video_id (text, mandatory)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X DELETE "http://localhost/api/users/videos" 
```

```javascript
const url = new URL("http://localhost/api/users/videos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/users/videos`


<!-- END_b3b04092df632a3d232a76098d8677e3 -->

<!-- START_8de571440893f6c98d94c8b46f645093 -->
## Show User Video Info

Display the specified resource.

Parameters => video_id (text, mandatory)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/users/video" 
```

```javascript
const url = new URL("http://localhost/api/users/video");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "User not found."
}
```

### HTTP Request
`GET api/users/video`


<!-- END_8de571440893f6c98d94c8b46f645093 -->

#Videos

APIs for retrieving videos
<!-- START_163aba6e8558a53b9c4ee0dfa18a20e9 -->
## Get information about all videos in a team/project

Note that this can take a long time on teams/projects
with many videos.

You can pass a callable function as $r['filter'] to perform an operation
during the loop. For example, set ->meta->next to null if a certain creation
date has been reached.

Use $params['offset'] and your own loop
if you'd rather not wait for this method to finish.

Listing videos from Amara

> Example request:

```bash
curl -X GET -G "http://localhost/api/videos" 
```

```javascript
const url = new URL("http://localhost/api/videos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "meta": {
        "previous": null,
        "next": "https:\/\/amara.org\/api\/videos\/?limit=10&offset=10",
        "offset": 0,
        "limit": 10,
        "total_count": 20
    },
    "objects": [
        {
            "id": "7usL0Qzpptj4",
            "video_type": "Y",
            "primary_audio_language_code": "ja",
            "original_language": "ja",
            "title": "Androidでゆっくり実況をする方法",
            "description": "Android端末でのゆっくり実況のやり方です。\nあくまでこれはPCが使える環境がない人やPCでのやり方がわからない人向けです向けです。\nPC環境がある人はゆっくりムービーメーカーを使用する方法を強くお勧めします。\n\nキネマスター https:\/\/play.google.com\/store\/apps\/details?id=com.nexstreaming.app.kinemasterfree\nトークロイド https:\/\/play.google.com\/store\/apps\/details?id=com.area513.android.talkroid\n\nTwitter：https:\/\/twitter.com\/Roa_zero_G\nニコニコ：69716972",
            "duration": 256,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/11ae9711ff6622a2fcc039c925778b95c010cd46_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:49:23Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=3allbUzy750"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/7usL0Qzpptj4\/"
        },
        {
            "id": "tUW1jSoOqcUx",
            "video_type": "Y",
            "primary_audio_language_code": "nl",
            "original_language": "nl",
            "title": "Financieel medewerker vacature in Best",
            "description": "Find out more: http:\/\/bit.ly\/2RSZbgf",
            "duration": 38,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/e166c4b5f30e11aec6b4a49333ee3b02273533a4_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:48:12Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=TBokIlXG2Zo"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "nl",
                    "name": "Dutch",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/languages\/nl\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/languages\/nl\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/tUW1jSoOqcUx\/"
        },
        {
            "id": "UZvkLp2AvqJM",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "FEL FOGUNK ROBBANNI!!! l Keep Talking And Nobody Explodes Tamarával",
            "description": "Sziasztok!\nRemélem tetszett ez a videó, mert ha igen akkor nyomjatok egy likeot, és egy feliratkozást! Írjatok és kövessetek az alábbi platformokon:\n\nFacebook: https:\/\/www.facebook.com\/adam.komjathi\nInstagram: https:\/\/www.instagram.com\/adamkomjathi\/\nE-mail: komjathiadam@gmail.com\n\nLegyen szép napotok, na szevasztok!",
            "duration": 894,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/c3e6774ad101da0acebb1cdf7702a6886ca59b4c_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:47:29Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=yPve1EUt4YQ"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/UZvkLp2AvqJM\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/UZvkLp2AvqJM\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/UZvkLp2AvqJM\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/UZvkLp2AvqJM\/"
        },
        {
            "id": "MZC1unevvkwb",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Basic Split Brain Science Primer - Alan Alda with Michael Gazzaniga",
            "description": "1996 Special on the \"Split Brain\" with Alan Alda and Michael Gazzaniga, called by many the \"Father\" of Cogitive Neuroscience.",
            "duration": 604,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/842e2d8d2d180089bb790c3be9cce0e3c13a500f_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:47:22Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=4CdmvNKwNjM"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/MZC1unevvkwb\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/MZC1unevvkwb\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/MZC1unevvkwb\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/MZC1unevvkwb\/"
        },
        {
            "id": "OWJOdqFV6nlv",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "www.youtube.com\/...\/watch?v=3Qi6CVQmvrE",
            "description": "",
            "duration": null,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-06T17:45:07Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=3Qi6CVQmvrE"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/OWJOdqFV6nlv\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/OWJOdqFV6nlv\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/OWJOdqFV6nlv\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/OWJOdqFV6nlv\/"
        },
        {
            "id": "E3dMNmRRjZeA",
            "video_type": "Y",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "John Mayer - Heart Of Life (Live in LA) [High Def!]",
            "description": "From the live album and concert film \"Where the light is\". Live in Los Angeles at the Nokia Theatre on December 8 2007. Enjoy :)",
            "duration": 223,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/7ed841dee9124612661ddec3d7ac33126dba75ca_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:43:59Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=3uA_ya8DcLs"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": true,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/E3dMNmRRjZeA\/"
        },
        {
            "id": "V4InnIWBH30m",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Libertad y Punto: Tornado y circo constituyente",
            "description": "",
            "duration": 2006,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/ce6d206a86bcbfd8a7e50df560083b7fe33bc811_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:41:19Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=i7cunk1fVcE"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/V4InnIWBH30m\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/V4InnIWBH30m\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/V4InnIWBH30m\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/V4InnIWBH30m\/"
        },
        {
            "id": "mVkvyLmfIdFH",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Easterseals Autism Therapy and Disability Services Center in Irvine Grand Opening",
            "description": "#GrandOpening #Irvine #autism #parent \nA parent of an Autism Services participant shares her story.",
            "duration": 152,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/3097d217b0a4a260ae9e0fe71f486fcbdd981b05_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:41:05Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=JLlhFZzEb3w"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/mVkvyLmfIdFH\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/mVkvyLmfIdFH\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/mVkvyLmfIdFH\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/mVkvyLmfIdFH\/"
        },
        {
            "id": "ISLZmp5EmWmq",
            "video_type": "Y",
            "primary_audio_language_code": "fa",
            "original_language": "fa",
            "title": "Funny Iranian clip (eide emsaal)",
            "description": "",
            "duration": 238,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/985e97097136fd111370903636ccf2ee1e94921d_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:40:38Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=OqOSNI5LLx8"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/ISLZmp5EmWmq\/"
        },
        {
            "id": "7YYqMbWY3Eie",
            "video_type": "Y",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "Lizzo: Juice",
            "description": "Music guest Lizzo puts on a dazzling performance of \"Juice\" for the Tonight Show audience.\n\nSubscribe NOW to The Tonight Show Starring Jimmy Fallon: http:\/\/bit.ly\/1nwT1aN\n\nWatch The Tonight Show Starring Jimmy Fallon Weeknights 11:35\/10:35c\nGet more Jimmy Fallon: \nFollow Jimmy: http:\/\/Twitter.com\/JimmyFallon\nLike Jimmy: https:\/\/Facebook.com\/JimmyFallon\n\nGet more The Tonight Show Starring Jimmy Fallon: \nFollow The Tonight Show: http:\/\/Twitter.com\/FallonTonight\nLike The Tonight Show: https:\/\/Facebook.com\/FallonTonight\nThe Tonight Show Tumblr: http:\/\/fallontonight.tumblr.com\/\n\nGet more NBC: \nNBC YouTube: http:\/\/bit.ly\/1dM1qBH\nLike NBC: http:\/\/Facebook.com\/NBC\nFollow NBC: http:\/\/Twitter.com\/NBC\nNBC Tumblr: http:\/\/nbctv.tumblr.com\/\nNBC Google+: https:\/\/plus.google.com\/+NBC\/posts\n\nThe Tonight Show Starring Jimmy Fallon features hilarious highlights from the show including: comedy sketches, music parodies, celebrity interviews, ridiculous games, and, of course, Jimmy's Thank You Notes and hashtags! You'll also find behind the scenes videos and other great web exclusives.\n\nLizzo: Juice\nhttp:\/\/www.youtube.com\/fallontonight\n\n#FallonTonight\n#Lizzo\n#JimmyFallon",
            "duration": 232,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/45bfabe430f2efc22c96c3dcca96cc70450596e7_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-06T17:40:12Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=6lsJIeazws8"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": true,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/7YYqMbWY3Eie\/"
        }
    ]
}
```

### HTTP Request
`GET api/videos`


<!-- END_163aba6e8558a53b9c4ee0dfa18a20e9 -->

<!-- START_64746d3437f524a2386fd24d151ce582 -->
## Retrieve metadata info about a video

The same info can be retrieved by video id or by video url,
since each video url is associated to a unique video id.
Listing an specific video from Amara.

> Example request:

```bash
curl -X GET -G "http://localhost/api/video" 
```

```javascript
const url = new URL("http://localhost/api/video");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Undefined variable: res",
    "exception": "ErrorException",
    "file": "\/var\/www\/html\/dreamtv\/app\/AmaraAPI.php",
    "line": 649,
    "trace": [
        {
            "file": "\/var\/www\/html\/dreamtv\/app\/AmaraAPI.php",
            "line": 649,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/app\/Http\/Controllers\/VideoController.php",
            "line": 52,
            "function": "getVideoInfo",
            "class": "App\\AmaraAPI",
            "type": "->"
        },
        {
            "function": "show",
            "class": "App\\Http\\Controllers\\VideoController",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 212,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 169,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 679,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 681,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 656,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 622,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 611,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 272,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 256,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php",
            "line": 33,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php",
            "line": 54,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php",
            "line": 196,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php",
            "line": 57,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 564,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 251,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 886,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/symfony\/console\/Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/var\/www\/html\/dreamtv\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/video`


<!-- END_64746d3437f524a2386fd24d151ce582 -->

#general
<!-- START_75c37ccb66511985eb2074e1e050ad98 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/videotests" 
```

```javascript
const url = new URL("http://localhost/api/videotests");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "video_id": "tNE5imiv27uA",
            "version": 13,
            "language_code": "pl",
            "created_at": "2019-02-06 17:51:02",
            "updated_at": "2019-02-06 17:51:02"
        }
    ]
}
```

### HTTP Request
`GET api/videotests`


<!-- END_75c37ccb66511985eb2074e1e050ad98 -->

<!-- START_81932f5e4a46a0d795fc17f64fa1c77a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/videotests" 
```

```javascript
const url = new URL("http://localhost/api/videotests");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/videotests`


<!-- END_81932f5e4a46a0d795fc17f64fa1c77a -->

<!-- START_190bdc6b772e859b234d4c797fa3c7f3 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/videotests/{videotest}" 
```

```javascript
const url = new URL("http://localhost/api/videotests/{videotest}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/videotests/{videotest}`


<!-- END_190bdc6b772e859b234d4c797fa3c7f3 -->

<!-- START_9db2495f8ec703446b684f3fa0a10ee5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/videotests/{videotest}" 
```

```javascript
const url = new URL("http://localhost/api/videotests/{videotest}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/videotests/{videotest}`

`PATCH api/videotests/{videotest}`


<!-- END_9db2495f8ec703446b684f3fa0a10ee5 -->

<!-- START_a17936c820b65c2b4f8e48bc075ba891 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/videotests/{videotest}" 
```

```javascript
const url = new URL("http://localhost/api/videotests/{videotest}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/videotests/{videotest}`


<!-- END_a17936c820b65c2b4f8e48bc075ba891 -->


