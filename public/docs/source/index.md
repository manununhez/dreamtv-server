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
<!-- START_c70be6706ce4270e72f389087f271c6d -->
## Show Subtitle

Show a specific subtitle according to Amara API.

Parameter => video_id, language_code, format, version

> Example request:

```bash
curl -X GET -G "http://localhost/api/subtitle/info" 
```

```javascript
const url = new URL("http://localhost/api/subtitle/info");

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
`GET api/subtitle/info`


<!-- END_c70be6706ce4270e72f389087f271c6d -->

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
            "id": 17,
            "name": "manuel.nunhez.pl@gmail.com",
            "type": "com.google",
            "token": "Bearer $2y$10$UrGOhYy.O84JU.vbTpnc0uz5KftUoOyL0NDmz0brE.cTd2NY5oacO",
            "interface_mode": "beginner",
            "interface_language": "en",
            "sub_language": "NN",
            "audio_language": "en",
            "created_at": "2019-01-11 12:27:31",
            "updated_at": "2019-01-11 12:33:31"
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

Parameters => task_id (mandatory, text), subtitle_version (mandatory, text), subtitle_position (mandatory, text)
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

<!-- START_b43c1ebb2aff30b7dd4327d93a9807a1 -->
## Show User Video Info

Display the specified resource.

Parameters => video_id (text, mandatory)

Requires user token - header 'Authorization'

> Example request:

```bash
curl -X GET -G "http://localhost/api/users/videos/info" 
```

```javascript
const url = new URL("http://localhost/api/users/videos/info");

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
`GET api/users/videos/info`


<!-- END_b43c1ebb2aff30b7dd4327d93a9807a1 -->

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
            "id": "cx4wVZGOImfE",
            "video_type": "H",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "https:\/...\/975fdcaf5817b8a1f6ba233836ed4cc4.mp4",
            "description": "",
            "duration": null,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-05T21:52:05Z",
            "team": null,
            "project": null,
            "all_urls": [
                "https:\/\/mediahub.unl.edu\/uploads\/975fdcaf5817b8a1f6ba233836ed4cc4.mp4"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/cx4wVZGOImfE\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/cx4wVZGOImfE\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/cx4wVZGOImfE\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/cx4wVZGOImfE\/"
        },
        {
            "id": "y6cpKHW71P7v",
            "video_type": "Y",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "Lay it All Down (feat. Will Reagan)",
            "description": "get the new record on itunes: https:\/\/itunes.apple.com\/us\/album\/tell-all-my-friends\/id1196200097\nSpotify: https:\/\/open.spotify.com\/album\/0FCfSIukAiBXKLYFNugmIF\nApple Music: https:\/\/itun.es\/us\/Hcjthb\n\nEdited and directed by David Silverberg\n\nLyrics: \nbring your worry, grief and pain \nEvery cause you have for shame \nlay it all down, lay it all down\nWhen your cares have buried you\nand there’s nothing left to do\nlay it all down lay it all down\nat the feet of jesus, at the feet of jesus\n\nCarried on but your heart was tired\nFeared the worst and felt the fire\nlay it all down, lay it all down\nFilled with all those anxious thoughts\nall your doubts became your god\nlay it all down, lay it all down\nat the feet of jesus, at the feet of jesus\n\nLay it all down\nLay it all down\nLay it all down\nLay it all down\n\nat the feet of Jesus\nat the feet of Jesus\n\nWhen we’ve given up on better days\nthere are memories we can’t erase\nlay it all down, lay it all down\nWe’ve come to fear what we can’t explain\nthere’s nothing here that can ease the pain\nlay it all down, lay it all down\nat the feet of Jesus, at the feet of Jesus",
            "duration": 380,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/2f44316f54555c8d1f94d2720eceaabec78360cd_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T21:50:08Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=RNacm6zR8eU"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "pl",
                    "name": "Polish",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/languages\/pl\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/languages\/pl\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/y6cpKHW71P7v\/"
        },
        {
            "id": "f9H5yyaD9EyZ",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "El Papa en Santa Marta: Un sacerdote no es ni un empleado ni un funcionario, es un padre",
            "description": "Suscríbete al canal: http:\/\/smarturl.it\/RomeReportsESP\n\nVisita nuestra web: http:\/\/www.romereports.com\/es\nSuscríbete a nuestra newsletter: http:\/\/bit.ly\/1RLUQBz\nSíguenos en Facebook https:\/\/www.facebook.com\/RomeReportsESP\n\n[DESCRIPCIÓN DE LA NOTICIA]\n\n---------------------\n\nPara difusión del vídeo: sales@romereports.com\n\nROME REPORTS es una Agencia de Noticias para TV, internacional e independiente, especializada en la actividad del Papa, la vida del Vaticano y los debates de actualidad sobre temas sociales, culturales o religiosos.  Informar sobre la Iglesia Católica requiere cercanía a las fuentes, conocimiento en profundidad de la Institución, y elevados niveles de creatividad y competencia técnica.\n\nROME REPORTS informa directamente al público y cubre las necesidades de las emisoras mediante noticias diarias, programas informativos semanales y documentales especializados.\n\n---------------------\n\nVisítanos en...\nNuestra WEB http:\/\/es.romereports.com\/\nFACEBOOK https:\/\/www.facebook.com\/RomeReportsESP\nTWITTER https:\/\/twitter.com\/romereports",
            "duration": 134,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/6646d076ec7ae4cfb3fd7fa2125013b0c611aa0a_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T21:49:22Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=zX5XtIrFlRk"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/f9H5yyaD9EyZ\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/f9H5yyaD9EyZ\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/f9H5yyaD9EyZ\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/f9H5yyaD9EyZ\/"
        },
        {
            "id": "6qPxXWPP6SsE",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "SWITCHFOOT - ALL I NEED - Official Music Video",
            "description": "The official music video for \"ALL I NEED\" from SWITCHFOOT's forthcoming album, NATIVE TONGUE! The NATIVE TONGUE Tour with Colony House and Tyson Motsenbocker starts this February! Tickets and VIP Experiences are now available at https:\/\/www.switchfoot.com\n\nLyrics:\nALL I NEED\nSometimes I feel so small \nLike a picture on your wall\nLike I’m hanging on just to fall\nNo matter how I try\n\nSo love sing to me gentle\nThat I’m more than accidental\nMore than just inconsequential \nBurning out tonight\n\nAll I need is the air I breathe\nThe time we share\nAnd the ground beneath my feet\nAll I need is the love that I believe in\nTell me love, do you believe in me \n\nThere’s a place down by the ocean\nWhere I take my mixed emotions\nWhen my soul’s rocked by explosions \nOf these tired times\n\nWhere love sings to me slowly\nEven when I feel low and lonely\nEven when the road feels like \nThe only friend of mine\n\nOne light\nOne goal\nOne feeling in my soul\nOne fight \nOne hope\nOne twisting rope\nI’m ready to run where the ocean meets the sky\n\nDirected by Brad Davis\nProduced by Adventure Vision\nhttps:\/\/adventurevision.co\/",
            "duration": 191,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/5a639311934cbd465a7de9fcbe0a32c31ddb6f06_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T21:47:01Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=2LOmjNHb08I"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/6qPxXWPP6SsE\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/6qPxXWPP6SsE\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/6qPxXWPP6SsE\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/6qPxXWPP6SsE\/"
        },
        {
            "id": "PkYqMhTc6ydD",
            "video_type": "H",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "https:\/...\/1163e9ff62d826cfcf8239be13baaf69.mp4",
            "description": "",
            "duration": null,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-05T21:45:25Z",
            "team": null,
            "project": null,
            "all_urls": [
                "https:\/\/mediahub.unl.edu\/uploads\/1163e9ff62d826cfcf8239be13baaf69.mp4"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/PkYqMhTc6ydD\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/PkYqMhTc6ydD\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/PkYqMhTc6ydD\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/PkYqMhTc6ydD\/"
        },
        {
            "id": "0DL57qJr0tSu",
            "video_type": "Y",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "Kant Attack Ad",
            "description": "Kant Attack Ad by James DiGiovanna and Carey Burtt",
            "duration": 57,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/d90c19695c966f20a891cacaae9640c795308ba3_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T21:41:02Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=7M-cmNdiFuI"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/0DL57qJr0tSu\/"
        },
        {
            "id": "04VTPROUDpZp",
            "video_type": "H",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "https:\/...\/QkFoYkIxc0hhUVQ0R240RE1Hd3JCOFJUVzF3PS0tZDcxZWE5NWIxMzRhYjVhODU1OTE3NTM1NmE2OGE1MmMyNmE5M2VlYw.mp4",
            "description": "",
            "duration": 7,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-05T21:40:41Z",
            "team": null,
            "project": null,
            "all_urls": [
                "https:\/\/nv.instructuremedia.com\/fetch\/QkFoYkIxc0hhUVQ0R240RE1Hd3JCOFJUVzF3PS0tZDcxZWE5NWIxMzRhYjVhODU1OTE3NTM1NmE2OGE1MmMyNmE5M2VlYw.mp4"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/04VTPROUDpZp\/"
        },
        {
            "id": "C3Kw1lNbNxYP",
            "video_type": "H",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "https:\/...\/62a7a173f07272a9b952ae1699cc1d5a.mp4",
            "description": "",
            "duration": null,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-05T21:39:11Z",
            "team": null,
            "project": null,
            "all_urls": [
                "https:\/\/mediahub-test.unl.edu\/uploads\/62a7a173f07272a9b952ae1699cc1d5a.mp4"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/C3Kw1lNbNxYP\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/C3Kw1lNbNxYP\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/C3Kw1lNbNxYP\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/C3Kw1lNbNxYP\/"
        },
        {
            "id": "07tvEGUSQU5l",
            "video_type": "Y",
            "primary_audio_language_code": "ru",
            "original_language": "ru",
            "title": "Почему спорт вне политики? \/ Why do sports stay out of politics? | VASILIY UTKIN | TEDxRANEPA",
            "description": "ВАСИЛИЙ УТКИН\nРоссийский спортивный журналист и телекомментатор, теле- и радиоведущий, шоумен.\nТЕМА: Почему спорт вне политики\n\nVASILIY UTKIN\nRussian sport journalist and TV commentator, broadcast presenter, showman, actor \nTALK: Why do sports stay out of politics?\n Russian sport journalist and TV commentator, broadcast presenter, showman, actor This talk was given at a TEDx event using the TED conference format but independently organized by a local community. Learn more at https:\/\/www.ted.com\/tedx",
            "duration": 1121,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/e00db52e6a50773ce94a34e3e7fb03d71968e1ef_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T21:30:12Z",
            "team": "ted",
            "project": "tedxtalks",
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=XhuRnaSfz-o"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/07tvEGUSQU5l\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/07tvEGUSQU5l\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/07tvEGUSQU5l\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/07tvEGUSQU5l\/"
        },
        {
            "id": "vNKoHjkwBQsA",
            "video_type": "V",
            "primary_audio_language_code": "pl",
            "original_language": "pl",
            "title": "vimeo.com\/...\/313400067",
            "description": "",
            "duration": 354,
            "thumbnail": "https:\/\/static.amara.org\/7a48caf8\/images\/video-no-thumbnail-wide.png",
            "created": "2019-02-05T21:29:53Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/vimeo.com\/313400067"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "pl",
                    "name": "Polish",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/languages\/pl\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/languages\/pl\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/vNKoHjkwBQsA\/"
        }
    ]
}
```

### HTTP Request
`GET api/videos`


<!-- END_163aba6e8558a53b9c4ee0dfa18a20e9 -->

<!-- START_4b690ed1506401a2e000fba280685985 -->
## Retrieve metadata info about a video

The same info can be retrieved by video id or by video url,
since each video url is associated to a unique video id.
Listing an specific video from Amara.

> Example request:

```bash
curl -X GET -G "http://localhost/api/videos/info" 
```

```javascript
const url = new URL("http://localhost/api/videos/info");

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
`GET api/videos/info`


<!-- END_4b690ed1506401a2e000fba280685985 -->


