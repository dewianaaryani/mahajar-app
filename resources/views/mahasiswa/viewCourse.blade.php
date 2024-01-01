<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>
    @if(session('success'))
        <script>
            // Wait for the document to be ready
            document.addEventListener('DOMContentLoaded', function() {
                // Display success message in a dialog box
                alert("{{ session('success') }}");
            });
        </script>
    @endif
    <div style="width: 100%; height: 100%; position: relative; background: white">
        <div style="width: 1429.69px; height: 834.25px; left: 5px; top: 421px; position: absolute">
            <img style="width: 1400.13px; height: 770.58px; left: 29.56px; top: 63.67px; position: absolute; opacity: 0.30; box-shadow: 35.68241500854492px 35.68241500854492px 35.68241500854492px; filter: blur(35.68px)" src="{!! asset('assets/external/dashimg/back.png') !!}" />
            <img style="width: 1400.13px; height: 770.58px; left: 0px; top: 0px; position: absolute" src="{!! asset('assets/external/dashimg/org.svg') !!}" />
        </div>
        
        <div style="width: 1435px; height: 1676px; left: 5px; top: 0px; position: absolute; background: linear-gradient(252deg, rgba(255, 255, 255, 0.84) 27%, rgba(255, 255, 255, 0) 100%)"></div>
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
                <img style="width: 28.20px; height: 48.11px; left: 16.40px; top: 6.72px; position: absolute" src="{!! asset('assets/external/dashimg/back.png') !!}"/>
                <a href="{{route('home')}}" style="position: absolute; left: 16.40px; top: 6.72px;">
                    <img style="width: 28.20px; height: 48.11px;" src="{!! asset('assets/external/dashimg/back.png') !!}" alt="Back to Dashboard">
                  </a>
            </div>
        </div>
        @if($tasks->isNotEmpty())
            <div style="left: 486px; top: 148px; position: absolute; color: #002C6E; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{$tasks->first()->course->name}}</div>
            @for ($i = 0; $i < $tasksCount; $i++)
                <div class="course">
                    @if ($i == 0)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="1" style="width: 839px; height: 107px; left: 301px; top: 294px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 1)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="2" style="width: 839px; height: 107px; left: 301px; top: 458px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 2)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="3" style="width: 839px; height: 107px; left: 301px; top: 622px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 3)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="5" style="width: 839px; height: 107px; left: 301px; top: 786px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 4)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="6" style="width: 839px; height: 107px; left: 303px; top: 953px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 5)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="4" style="width: 839px; height: 107px; left: 301px; top: 1138px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 6)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="7" style="width: 839px; height: 107px; left: 301px; top: 1303px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @elseif($i == 7)
                        <a href="{{route('mahasiswa.viewTask',$tasks[$i]->id)}}"><div name="8" style="width: 839px; height: 107px; left: 303px; top: 1490px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
                    @endif           
                    <!-- Render each course -->
                </div>
            @endfor
            @for ($i = 0; $i < $tasksCount; $i++)
                <div class="course">
                    @if ($i == 0)
                        <div style="left: 356px; top: 312px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 1)
                        <div style="left: 356px; top: 476px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 2)
                        <div style="left: 356px; top: 641px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 3)
                        <div style="left: 356px; top: 807px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 4)
                        <div style="left: 356px; top: 971px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 5)
                        <div style="left: 356px; top: 1156px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 6)
                        <div style="left: 356px; top: 1321px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @elseif($i == 7)
                        <div style="left: 356px; top: 1508px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">{{ $tasks[$i]->title }}</div>
                    @endif           
                    <!-- Render each course -->
                </div>
            @endfor
        @else
            <div style="left: 486px; top: 148px; position: absolute; color: #002C6E; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word"></div>
                <div class="course">                   
                    <div name="1" style="width: 839px; height: 107px; left: 301px; top: 294px; position: absolute; background: rgb(215, 32, 32); border-radius: 20px"></div>
                </div>
                <div class="course">
                    <div style="left: 356px; top: 312px; position: absolute; color: white; font-size: 48px; font-family: Poppins; font-weight: 600; word-wrap: break-word">The Task Data is Empty</div>
                </div>
            </div>
        @endif
        {{-- <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 294px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 458px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 622px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 1138px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 786px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 301px; top: 1303px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 303px; top: 953px; position: absolute; background: #5271FF; border-radius: 20px"></div></a>
        <a href="task.html"><div style="width: 839px; height: 107px; left: 303px; top: 1490px; position: absolute; background: #5271FF; border-radius: 20px"></div></a> --}}
        
        
        
        {{-- <a href="{{route('dosen.tasks.create', $tasks->first()->course_id)}}" style="width: 300.77px; height: 64.31px; left: 950px; top: 40px; position: absolute; color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; text-decoration: none">
            + New Tasks
      </a> --}}
        
        
        
        
        
    </div>
</body>
</html>