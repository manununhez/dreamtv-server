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

#general
<!-- START_303577e8671ae83de45743ebc8ae0b02 -->
## Get all reasons

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
            "id": "f1QkhoqkFJIz",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Al-Qur'an: A Miracle of Miracles - by Sheikh Ahmed Deedat",
            "description": "Speaker: Sheikh Ahmed Deedat\nSource: High Truthway TV [Al-Quran A Miracle of Miracles]\nLocation: U.A.E (Lecture at the National Theater in Abu Dhabi on July 5th, 1987)\nDownload lectures and debates free at:\n\nhttp:\/\/english.truthway.tv\/\n\nIf you love Islam (the religion of peace), then why not share it with others?\n\nThe Holy Quran:\n\"And you [O Muhammad] did not recite before it any scripture, nor did you inscribe one with your right hand. Otherwise the falsifiers would have had [cause for] doubt.\" (V.29:48)\n\"Nay, here are Signs self-evident in the hearts of those endowed with knowledge, and none reject Our verses except the wrongdoers.\" (V.29:49)\n\"And they say: 'Why are not Signs sent down upon him from his Lord?' Say: 'The Signs are only with Allah, and I am only a clear warner.' \" (V.29:50)\n\"Is it not enough for them that We have revealed to you the Book which is recited to them? Verily, herein is mercy and a reminder for a people who believe.\" (V.29:51)\n\"Say, 'Sufficient is Allah between me and you as Witness; He knows what is in the heavens and earth. And they who have believed in falsehood and disbelieved in Allah - it is those who are the losers.' \" (V.29:52)",
            "duration": 5524,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/91e8faa28920ae65e83c2287cbda012322b2f42f_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:25:01Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=FZ_0Yk7XRL0"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/f1QkhoqkFJIz\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/f1QkhoqkFJIz\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/f1QkhoqkFJIz\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/f1QkhoqkFJIz\/"
        },
        {
            "id": "3lhT5SZDzKPD",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Chap4 Vid3",
            "description": "",
            "duration": 38,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/be2a66612127a78f5939bc85df8fea6657787f10_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:24:22Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=TBdVif6j784"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/3lhT5SZDzKPD\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/3lhT5SZDzKPD\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/3lhT5SZDzKPD\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/3lhT5SZDzKPD\/"
        },
        {
            "id": "F0Hi1B8bfXVB",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Cold Chain Companies in Hyderabad",
            "description": "http:\/\/www.coldman.in\/\nCOLDMAN Cold Chain Companies in Hyderabad is into providing Temperature-Controlled Warehousing & Logistic Services to Various Industries with a strong focus on technology driven operations .We offer End to End Solutions from Source to Consumption point. We offer you an array of warehousing, distribution, port centric logistics and business integrated solutions designed to be efficient, to lower supply chain costs.",
            "duration": 22,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/9b8c28aebb0b73f323bf83a5acd2cee075d0c879_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:22:45Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=Dn9iaCDqhN8"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/F0Hi1B8bfXVB\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/F0Hi1B8bfXVB\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/F0Hi1B8bfXVB\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/F0Hi1B8bfXVB\/"
        },
        {
            "id": "hHHYYYMGasWa",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Lee Bressler : Brief Description of Cloud Computing",
            "description": "Lee Bressler is a financial advisor who is working in the financial industry for more than three years. http:\/\/leebressler.webflow.io\/posts\/lee-bressler-the-importance-of-financial-advisor\n\nHe is the one, who got an opportunity to work with three investment firms at a time.",
            "duration": 51,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/a72b91beb902637d82b8d220b5945566002bd980_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:22:12Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=xa9FgUuk-44"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/hHHYYYMGasWa\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/hHHYYYMGasWa\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/hHHYYYMGasWa\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/hHHYYYMGasWa\/"
        },
        {
            "id": "GonW62YnxAnI",
            "video_type": "Y",
            "primary_audio_language_code": "en",
            "original_language": "en",
            "title": "Shallow - A Star is Born (Lady Gaga & Bradley Cooper)",
            "description": "Hi everyone! Here are some more of the song scenes from A Star is Born! \n\nBlack Eyes \nhttps:\/\/youtu.be\/ebwyzTLPwq8\n\nSomewhere Over the Rainbow\nhttps:\/\/youtu.be\/F78zS8_b6nI\n\nLa Vie En Rose\nhttps:\/\/youtu.be\/tZ7Gb-osYXs\n\nMaybe It’s Time\nhttps:\/\/youtu.be\/DHjxrdvmmQE\n\nShallow (Parking Lot Version)\nhttps:\/\/youtu.be\/tU0EShY2-t8\n\nOut of Time \/ Alibi\nhttps:\/\/youtu.be\/QGS0HWMSO20\n\nShallow\nhttps:\/\/youtu.be\/dNxCz-Iyu0g\n\nAlibi \/ Maybe It’s Time (Reprise)\nhttps:\/\/youtu.be\/zCC_TkK1OVo\n\nAlways Remember Us This Way\nhttps:\/\/youtu.be\/UuHZxKbcmWo\n\nLook What I Found\nhttps:\/\/youtu.be\/VyYMzzbxdUw\n\nHeal Me\nhttps:\/\/youtu.be\/9UsA46cxDOs\n\nWhy Did You Do That? \nhttps:\/\/youtu.be\/8jnjiQTIdBk\n\nPretty Woman\nhttps:\/\/youtu.be\/j1fqVV27GZQ\n\nI’ll Never Love Again \nhttps:\/\/youtu.be\/35i2s8TU6tU",
            "duration": 280,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/fbda1c50d42bd44ca7031a9b2e9b1385c0db76ae_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:15:20Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=dNxCz-Iyu0g"
            ],
            "metadata": {},
            "languages": [
                {
                    "code": "en",
                    "name": "English",
                    "published": false,
                    "dir": "ltr",
                    "subtitles_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/languages\/en\/subtitles\/",
                    "resource_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/languages\/en\/"
                }
            ],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/GonW62YnxAnI\/"
        },
        {
            "id": "3Z3cCcINAyMD",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Get to Know About Fresh Flowers for Special Floral Arrangements",
            "description": "This video provides you with the excellent knowledge of fresh flowers for special floral arrangements. Flowers are used for various occasions such as special wedding receptions, birthday parties, vase work, and other fantastic celebrations. There are various flowers available in the market like carnation flowers, sweet pea flower, scabiosa flower, statice flower, stock flower, succulents, and greenery garland which are used for all kinds of flower arrangements and eye-catching flower decorations. Whole Blossoms is the complete solution for wholesale fresh flowers and floral accessories where you can select and get fresh flowers for sale with authentic delivery services at your desired location. \n\nFollow Us:\n\nFacebook: https:\/\/web.facebook.com\/wholeblossoms\nPinterest: https:\/\/www.pinterest.com\/wholeblossoms\/\nInstagram:  https:\/\/www.instagram.com\/wholeblossoms\/\nTwitter: https:\/\/twitter.com\/wholeblossoms\n\n#cheapflowerdelivery #wheretobuyfreshflowers #wholesalefreshflowers",
            "duration": 41,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/07b3f242bde74c73167a75fe08d20abe50f72cd7_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:09:48Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=ZfJs6D28eeA"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/3Z3cCcINAyMD\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/3Z3cCcINAyMD\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/3Z3cCcINAyMD\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/3Z3cCcINAyMD\/"
        },
        {
            "id": "8Nu7gRZQrn0h",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Kitchen Units Online",
            "description": "The kitchen units have made massive popularity and many people are opting for it because of its advantages. If you are considering to get the kitchen unit for your home as well than make sure that you buy the best unit from a well-reputed provider. https:\/\/www.betterkitchens.co.uk",
            "duration": 20,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/4a587c6f55a537123526af148cb3af763f3d074e_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:08:41Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=lEzMg8XdOKE"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/8Nu7gRZQrn0h\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/8Nu7gRZQrn0h\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/8Nu7gRZQrn0h\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/8Nu7gRZQrn0h\/"
        },
        {
            "id": "HCtTVpZ67nqB",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "kate middleton age",
            "description": "Kate Middleton, also known as Catherine, Her Royal Highness the Duchess of Cambridge, married Prince William in 2011. Learn more at shindigweb.com. Visit http:\/\/www.shindigweb.com\/kate-middleton\/",
            "duration": 44,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/52a66bf57367270fa5126a963b097391dd9de965_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:05:29Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=NHEfyZ-TDYU"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/HCtTVpZ67nqB\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/HCtTVpZ67nqB\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/HCtTVpZ67nqB\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/HCtTVpZ67nqB\/"
        },
        {
            "id": "7siPdl4RBxpV",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Essential Facts to Know About House Property and Building Inspections",
            "description": "Visit - https:\/\/www.360degreespropertyinspections.com.au \nBuilding Inspections Services is required before making an investment in a property. This video describes about significant problems or building defects, the most useful to make a decision about a property.",
            "duration": 51,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/5d767111efdca2c8194f1c6a3e81cab8906076b0_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:02:51Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=WFEJ3y1iDSM"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/7siPdl4RBxpV\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/7siPdl4RBxpV\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/7siPdl4RBxpV\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/7siPdl4RBxpV\/"
        },
        {
            "id": "eTSPwJUH2o9W",
            "video_type": "Y",
            "primary_audio_language_code": null,
            "original_language": null,
            "title": "Correctement en colère",
            "description": "",
            "duration": 60,
            "thumbnail": "https:\/\/userdata.amara.org\/video\/thumbnail\/36ebed8cb9aa2b329b60a0cf8fe715a2f65f6312_480x270_crop-smart_upscale-True_q85.jpg",
            "created": "2019-02-05T06:02:47Z",
            "team": null,
            "project": null,
            "all_urls": [
                "http:\/\/www.youtube.com\/watch?v=9kL8lnJ9v-Y"
            ],
            "metadata": {},
            "languages": [],
            "activity_uri": "https:\/\/amara.org\/api\/videos\/eTSPwJUH2o9W\/activity\/",
            "urls_uri": "https:\/\/amara.org\/api\/videos\/eTSPwJUH2o9W\/urls\/",
            "subtitle_languages_uri": "https:\/\/amara.org\/api\/videos\/eTSPwJUH2o9W\/languages\/",
            "resource_uri": "https:\/\/amara.org\/api\/videos\/eTSPwJUH2o9W\/"
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
            "file": "\/var\/www\/html\/dreamtv\/app\/Http\/Controllers\/VideoApiController.php",
            "line": 53,
            "function": "getVideoInfo",
            "class": "App\\AmaraAPI",
            "type": "->"
        },
        {
            "function": "show",
            "class": "App\\Http\\Controllers\\VideoApiController",
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
Remove the specified resource from storage.

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
Verify If Video Is In UserList

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

<!-- START_d29df5fd928092000b93edb0dadbff5d -->
## Get languages from Amara

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

<!-- START_c70be6706ce4270e72f389087f271c6d -->
## Show Subtitle From Amara

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
            "line": 29,
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

<!-- START_ac5935bd19f595d5a48d6eb55c08b9ed -->
## api/users/task
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

<!-- START_4227b9e5e54912af051e8dd5472afbce -->
## Get all index tasks

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


