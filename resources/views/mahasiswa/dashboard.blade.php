<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div style="width: 100%; height: 100%; position: relative; background: white">
        <div style="width: 1579.20px; height: 1640px; left: -28px; top: 96px; position: absolute">
            <img style="width: 1579.20px; height: 1122.79px; left: 0px; top: 517.21px; position: absolute; background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%)" src="" />
            <img style="width: 1207.55px; height: 664.59px; left: 210.33px; top: 54.91px; position: absolute; opacity: 0.30; box-shadow: 35.68241500854492px 35.68241500854492px 35.68241500854492px; filter: blur(35.68px)" src="{!! asset('assets/external/dashimg/org.svg') !!}" />
            <img style="width: 1207.55px; height: 664.59px; left: 184.83px; top: 0px; position: absolute" src="{!! asset('assets/external/dashimg/org.svg') !!}" />
        </div>
        <div style="width: 1440px; height: 1736px; left: 0px; top: 0px; position: absolute; background: linear-gradient(253deg, white 0%, rgba(244.37, 246.28, 255, 0.70) 71%, rgba(244.37, 246.28, 255, 0) 100%)"></div>
        <div style="left: 78px; top: 34px; position: absolute; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
            <img style="width: 62px; height: 47px" src="{!! asset('assets/external/dashimg/logo.svg') !!}" />
            <div style="color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; word-wrap: break-word">MAHAJAR</div>
        </div>
        <div style="left: 948px; top: 54px; position: absolute; justify-content: flex-start; align-items: flex-start; gap: 33px; display: inline-flex">
            <div style="color: #fff; font-size: 36px; font-family: Andada Pro; font-weight: 400; word-wrap: break-word">
                <a href="index.html"></a>
              </div>
              <div style="color: #002C6E; font-size: 36px; font-family: Andada Pro; font-weight: 400; word-wrap: break-word">
              <a href="about.html"></a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf <!-- Add CSRF token for security -->
                <button type="submit" style="color: #fff; font-size: 20px; font-family:poppins; font-weight: 400; word-wrap: break-word; background-color: #6184b9; border-radius: 10px;padding: 10px; margin-left: 90px">Logout</button>
            </form>
            {{-- <div style=>
                <a href="{{ route('logout') }}"></a>
              </div> --}}
        </div>
        <div style="width: 1042.86px; height: 1340px; left: 199px; top: 294px; position: absolute">
            <div style="width: 1042.86px; height: 1263.48px; left: 0px; top: 76.52px; position: absolute; background: rgba(255, 255, 255, 0); box-shadow: 0px 4px 13.199999809265137px 4px rgba(0, 0, 0, 0.25); border-radius: 44px; border: 7px #166DAC solid">  </div>
            <div style="width: 390.77px; height: 64.31px; left: 19.54px; top: 0px; position: absolute; color: black; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Course’s Overview</div>
            
            @for ($i = 0; $i < $coursesCount; $i++)
                <div class="course">
                    @php
                        $randomIndex = array_rand($imageFiles);
                        $randomImage = $imageFiles[$randomIndex];
                        unset($imageFiles[$randomIndex]); // Remove the selected image to prevent duplication
                        $imageFiles = array_values($imageFiles); // Re-index the array
                    @endphp
                    @if ($i == 0)
                    <img src="{{ asset('assets/external/dashimg/course/' . basename($randomImage)) }}" alt="Random Image {{ $i }}" style="width: 412.75px; height: 250.74px; left: 76.52px; top: 166.08px; position: absolute; background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%); border-radius: 0px; border: 0px #166DAC solid">
                    @elseif($i == 1)
                    <img style="width: 411.93px; height: 250.74px; left: 552.77px; top: 166.08px; position: absolute; background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%); border-radius: 0px; border: 0px #166DAC solid" src="{{ asset('assets/external/dashimg/course/' . basename($randomImage)) }}" alt="Random Image {{ $i }}"  />
                    @elseif($i == 2)
                    <img style="width: 412.75px; height: 249.93px; left: 76.52px; top: 555.21px; position: absolute; background: linear-gradient(0deg, #D9D9D9 0%, #D9D9D9 100%); border-radius: 0px; border: 0px #166DAC solid" src="{{ asset('assets/external/dashimg/course/' . basename($randomImage)) }}" alt="Random Image {{ $i }}"  />

                    @endif
                    
                    <!-- Render each course -->
                </div>
            @endfor
            @for ($i = 0; $i < $coursesCount; $i++)
                @if ($i == 0)
                <div style="width: 277.61px; height: 38.26px; left: 144.09px; top: 446.12px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{$courses[$i]->name}}</div>
                <a href="{{route('mahasiswa.viewCourse', $courses[$i]->id)}}" style="width: 277.61px; height: 38.26px; left: 144.09px; top: 446.12px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word; text-decoration: none;">
                    <div>{{ $courses[$i]->name }}</div>
                </a>    
                @elseif($i == 1)
                    <div style="width: 258.88px; height: 38.26px; left: 629.30px; top: 446.12px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $courses[$i]->name }}</div>
                    <a href="{{route('mahasiswa.viewCourse', $courses[$i]->id)}}" style="width: 258.88px; height: 38.26px; left: 629.30px; top: 446.12px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word; text-decoration: none;">
                        <div>{{ $courses[$i]->name }}</div>
                    </a>    
                @elseif($i == 2)
                    <div style="width: 238.53px; height: 38.26px; left: 153.86px; top: 834.45px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $courses[$i]->name }}</div>
                    <a href="{{route('mahasiswa.viewCourse', $courses[$i]->id)}}" style="width: 238.53px; height: 38.26px; left: 153.86px; top: 834.45px; position: absolute; color: black; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word; text-decoration: none;">
                        <div>{{ $courses[$i]->name }}</div>
                    </a>   
                @endif
            @endfor
        </div>
    </div>
</body>
</html>