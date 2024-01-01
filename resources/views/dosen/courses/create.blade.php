<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Create</title>
</head>
<body>
    <div style="width: 100%; height: 100%; position: relative; background: white">
        <div style="width: 1278px; height: 62.54px; left: 81px; top: 33px; position: absolute">
            <div style="width: 279px; height: 61px; left: 82px; top: 1px; position: absolute; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
                <img style="width: 62px; height: 47px" src="{!! asset('assets/external/dashimg/logo.svg') !!}" />
                <div style="color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; word-wrap: break-word">MAHAJAR</div>
            </div>
            <div style="width: 398px; height: 42px; left: 880px; top: 8px; position: absolute; justify-content: flex-start; align-items: flex-start; gap: 33px; display: inline-flex">
            </div>
            <div style="width: 55px; height: 0px; left: 63px; top: 0px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
            <div style="width: 63px; height: 61.54px; left: 0px; top: 1px; position: absolute">
                <div style="width: 63px; height: 61.54px; left: 0px; top: 0px; position: absolute; opacity: 0.87"></div>
                <a href="{{route('dosen.home')}}" style="position: absolute; left: 16.40px; top: 6.72px;">
                    <img style="width: 28.20px; height: 48.11px;" src="{!! asset('assets/external/dashimg/back.png') !!}" alt="Back to Dashboard">
                  </a>
            </div>
        </div>
        <form action="{{route('dosen.courses.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="left: 144px; top: 147px; position: absolute; color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; word-wrap: break-word">New Course</div>
            <div style="left: 650px; top: 353px; position: absolute; color: white; font-size: 48px; font-family: Acme; font-weight: 400; word-wrap: break-word">Jawab :</div>
            <input name="name" type="text" style="width: 827px; height: 92px; left: 532px; top: 277px; position: absolute; border-radius: 10px; border: 1px black solid; color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; padding-left: 30px;" autofocus>
            <input name="kelas" type="text" class="c1" style="width: 827px; height: 92px; left: 532px; top: 420px; position: absolute; border-radius: 10px; border: 1px black solid; color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; padding-left: 30px;">
            
            <div style="left: 335px; top: 293px; position: absolute; color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Name :</div>
            <div style="left: 335px; top: 436px; position: absolute; color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Kelas :</div>
          
            <button type="submit" style="width: 203px; height: 69px; left: 533px; top: 582px; position: absolute; background: #5271FF; border-radius: 10px; color: white; font-size: 40px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                Publish
            </button>
            
        </form>
    </div>
</body>
</html>