<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager PDF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fastly.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        font-family: "Kanit", sans-serif;
    }

    @page {
        margin-top: 100px;
        margin-bottom: 70px;
    }

    header {
        /* position: relative; */
        top: -60px;
        left: 0;
        right: 0;
        height: 50px;
    }

    footer {
        position: fixed;
        bottom: -50px;
        left: 0;
        right: 0;
        height: 50px;
        text-align: center;
        font-size: 12px;
        font-family: 'Kanit', sans-serif;
        color: #666;
    }

    main {
        margin-top: 240px;
    }
</style>


<body class="font-Kanit ">
    <header>
        {{-- <div class="text-center"><img
                src="https://i.redd.it/karina-looks-so-cute-with-glasses-v0-ggqk3ewcjojc1.jpg?width=1010&format=pjpg&auto=webp&s=c9a1622b5f98379e21eac52944245436e090ca73"
                alt="" width="40%" height="40%"></div> --}}
        <p class="text-md text-right" align="right">วันที่
            {{ \Carbon\Carbon::parse($today)->format('d') }}
            {{ \Carbon\Carbon::parse($today)->locale('th')->monthName }}
            {{ \Carbon\Carbon::parse($today)->year + 543 }}
        </p>
        <h1 align='center' class="text-5xl font-bold -mb-5">รายงาน</h1>
        <h4 align='center' class="text-xl text-red-400 -mb-5" style="color: red">ระบบการจัดการ การแข่งขัน E-Sport</h4>
        <h6 align='center' class="text-xl text-red-400" style="color: red">{{ $title }}</h6>
        <div class="grid grid-cols-2 gap-y-24">
            <div class="col-span-1 bg-beige p-4">
                <p class="text-md -mb-4">ชื่อผู้จัดการแข่งขัน : {{ Auth::user()->name }}</p>
                <p class="text-md -mb-4">E-mail : {{ $email }}</p>
                <p class="text-md -mb-4">เบอร์โทร : {{ $tel }}</p>
            </div>
        </div>
        <hr>
    </header>
    <footer>
        <p>Copyright &copy; <?php echo date('Y'); ?></p>
    </footer>
    <main>
        <table class="min-w-full  rounded-md border-collapse border-[1px]">
            <thead class="text-xs">
                <tr>
                    <th scope="col" class="border px-4 py-2 text-left text-base font-medium ">
                        ชื่อรายการแข่งขัน
                    </th>
                    <th scope="col" class="border px-4 py-2 text-left text-base font-medium ">
                        จำนวนทีมที่รับเข้าแข่งขัน
                    </th>
                    <th scope="col" class="border px-4 py-2 text-left text-base font-medium ">
                        จำนวนทีมที่เข้าแข่งขัน
                    </th>
                    <th scope="col" class="border px-2 py-2 text-center">จำนวนคนในทีม</th>
                    <th scope="col" class="border px-2 py-2 text-center">วันที่จบการแข่งขัน</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() > 0)
                    @foreach ($data as $item)
                        <tr>
                            <td class="border px-3 " scope="row">
                                <div class="text-sm">{{ $item->competition_name }}</div>
                            </td>
                            <td class="border px-3  text-center" scope="row">
                                <div class="text-sm">{{ $item->competition_amount }}</div>
                            </td>
                            <td class="border px-3 text-center" scope="row">
                                <div class="text-sm">
                                    @foreach ($count_teams as $count)
                                        @if ($count->cl_id == $item->id)
                                            {{ $count->team_count }}
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="border px-2 text-center">{{ $item->amount_contestant }}</td>
                            <td class="border px-2 text-center">
                                {{ \Carbon\Carbon::parse($item->competition_end_date)->format('d') }}
                                {{ \Carbon\Carbon::parse($item->competition_end_date)->locale('th')->monthName }}
                                {{ \Carbon\Carbon::parse($item->competition_end_date)->year + 543 }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">ไม่พบข้อมูล</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </main>


</body>

</html>
