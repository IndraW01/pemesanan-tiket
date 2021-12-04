<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Struk</title>
    <style>
        .struk {
            font-size: 40px;
            text-align: center;
        }
        .row {
            display: flex;
            justify-content: center;
        }
        th{
            text-align: start
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="struk">Struk Ticket</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Nama</th>
                        <td>{{ \Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $booking->film->title }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ date('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Jam</th>
                        <td>{{ $booking->schedule->schedule }}</td>
                    </tr>
                    <tr>
                        <th>Ticket</th>
                        <td>{{ $booking->tiket }}</td>
                    </tr>
                    <tr>
                        <th>Harga/Tiket</th>
                        <td>{{ $booking->film->harga }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>{{ $booking->total }}</td>
                    </tr>
                    <tr>
                        <th>Seat</th>
                        <td>
                            @forelse ($booking->seats as $seats)
                                <a class="text-decoration-none text-dark">{{ $seats->seat->no_bangku }}</a>
                            @empty

                            @endforelse
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</body>
</html>
