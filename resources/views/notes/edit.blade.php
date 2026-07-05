<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:linear-gradient(135deg,#EEF2FF,#F5F3FF,#FFFFFF);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        .card{

            width:700px;
            max-width:100%;
            background:white;
            border-radius:25px;
            padding:35px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);

        }

        .header{

            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:25px;

        }

        .header i{

            font-size:40px;
            color:#7C3AED;

        }

        h2{

            font-size:30px;
            color:#222;

        }

        p{

            color:#666;
            margin-top:5px;

        }

        textarea{

            width:100%;
            height:220px;
            margin-top:20px;
            border:2px solid #E5E7EB;
            border-radius:15px;
            padding:18px;
            resize:none;
            font-size:16px;
            transition:.3s;

        }

        textarea:focus{

            outline:none;
            border-color:#7C3AED;

        }

        .button-group{

            display:flex;
            justify-content:space-between;
            margin-top:25px;

        }

        .btn{

            padding:13px 28px;
            border:none;
            border-radius:12px;
            cursor:pointer;
            font-size:15px;
            text-decoration:none;
            transition:.3s;

        }

        .btn-back{

            background:#E5E7EB;
            color:#333;

        }

        .btn-back:hover{

            background:#D1D5DB;

        }

        .btn-save{

            background:#7C3AED;
            color:white;

        }

        .btn-save:hover{

            background:#6D28D9;

        }

        @media(max-width:768px){

            .button-group{

                flex-direction:column;
                gap:15px;

            }

            .btn{

                width:100%;
                text-align:center;

            }

        }

    </style>

</head>

<body>

<div class="card">

    <div class="header">

        <i class="bi bi-pencil-square"></i>

        <div>

            <h2>Edit Catatan</h2>

            <p>Perbarui isi catatan kemudian klik Simpan.</p>

        </div>

    </div>

    <form action="{{ route('notes.update',$id) }}" method="POST">

        @csrf
        @method('PUT')

        <textarea
            name="note"
            required>{{ $note }}</textarea>

        <div class="button-group">

            <a
                href="{{ route('notes.index') }}"
                class="btn btn-back">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

            <button
                type="submit"
                class="btn btn-save">

                <i class="bi bi-check-circle-fill"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

</body>

</html>