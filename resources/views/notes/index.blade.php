<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Notes</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

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
    padding:40px;

}

.container{

    max-width:950px;
    margin:auto;

}

.header{

    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;

}

.title{

    display:flex;
    gap:15px;
    align-items:center;

}

.title i{

    font-size:42px;
    color:#7C3AED;

}

.title h1{

    font-size:35px;
    color:#222;
    font-weight:700;

}

.subtitle{

    color:#666;
    margin-top:3px;

}

.theme-btn{

    width:55px;
    height:55px;
    border:none;
    border-radius:15px;
    background:white;
    cursor:pointer;
    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.theme-btn i{

    font-size:22px;
    color:#7C3AED;

}

.card{

    background:white;
    border-radius:22px;
    padding:30px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    margin-bottom:25px;

}

.card-title{

    font-size:23px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:20px;

}

.card-title i{

    color:#7C3AED;

}

textarea{

    width:100%;
    border:2px solid #E5E7EB;
    border-radius:15px;
    padding:18px;
    resize:none;
    height:120px;
    transition:.3s;
    font-size:15px;

}

textarea:focus{

    border-color:#7C3AED;
    outline:none;

}

.btn-primary{

    margin-top:18px;
    background:#7C3AED;
    color:white;
    border:none;
    padding:13px 28px;
    border-radius:12px;
    cursor:pointer;
    transition:.3s;
    float:right;

}

.btn-primary:hover{

    background:#6D28D9;

}

.info-bar{

    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;

}

.badge{

    background:#EEF2FF;
    color:#4F46E5;
    padding:8px 18px;
    border-radius:30px;
    font-weight:600;

}

select{

    border:2px solid #E5E7EB;
    border-radius:10px;
    padding:8px 15px;

}

.note{

    background:#F8FAFC;
    border-radius:18px;
    padding:18px;
    margin-bottom:18px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    transition:.3s;

}

.note:hover{

    transform:translateY(-4px);
    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.note-left{

    display:flex;
    gap:15px;
    align-items:center;

}

.icon-box{

    width:52px;
    height:52px;
    background:#EDE9FE;
    border-radius:15px;
    display:flex;
    justify-content:center;
    align-items:center;

}

.icon-box i{

    color:#7C3AED;
    font-size:22px;

}

.note-title{

    font-weight:600;
    font-size:18px;

}

.note-date{

    color:#777;
    margin-top:5px;
    font-size:13px;

}

.action{

    display:flex;
    gap:10px;

}

.edit{

    border:none;
    background:#EEF2FF;
    color:#4338CA;
    padding:10px 15px;
    border-radius:10px;
    cursor:pointer;

}

.delete{

    border:none;
    background:#FEE2E2;
    color:#DC2626;
    padding:10px 15px;
    border-radius:10px;
    cursor:pointer;

}

.empty{

    text-align:center;
    padding:70px;

}

.empty i{

    font-size:70px;
    color:#A78BFA;

}

.empty h2{

    margin-top:15px;

}

.footer{

    margin-top:35px;
    text-align:center;
    color:#888;

}

@media(max-width:768px){

.header{

flex-direction:column;
gap:20px;

}

.info-bar{

flex-direction:column;
gap:15px;

}

.note{

flex-direction:column;
align-items:flex-start;
gap:15px;

}

.action{

width:100%;

}

.action button{

flex:1;

}

}

</style>

</head>

<body>

<div class="container">
    {{-- HEADER --}}
<div class="header">

    <div class="title">
        <i class="bi bi-journal-richtext"></i>

        <div>
            <h1>My Notes</h1>
            <div class="subtitle">
                Catat semua ide dan aktivitasmu dengan mudah.
            </div>
        </div>

    </div>

    <button class="theme-btn">
        <i class="bi bi-moon-stars-fill"></i>
    </button>

</div>

{{-- FORM TAMBAH CATATAN --}}
<div class="card">

    <div class="card-title">
        <i class="bi bi-plus-circle-fill"></i>
        Tambah Catatan
    </div>

    <form action="{{ route('notes.store') }}" method="POST">

        @csrf

        <textarea
            name="note"
            placeholder="Tulis catatan baru di sini..."
            required></textarea>

        <button class="btn-primary">

            <i class="bi bi-plus-lg"></i>
            Tambah Catatan

        </button>

        <div style="clear:both"></div>

    </form>

</div>

{{-- INFO --}}
<div class="info-bar">

    <div class="badge">

        <i class="bi bi-stickies-fill"></i>

        Total Catatan :
        <strong>{{ count($notes) }}</strong>

    </div>

    <select>

        <option>Terbaru</option>
        <option>Terlama</option>

    </select>

</div>

{{-- LIST CATATAN --}}
@if(count($notes))

@foreach($notes as $index => $note)

<div class="note">

    <div class="note-left">

        <div class="icon-box">
            <i class="bi bi-file-earmark-text-fill"></i>
        </div>

        <div>

            <div class="note-title">

                {{ $note }}

            </div>

            <div class="note-date">

                Catatan #{{ $index+1 }}

            </div>

        </div>

    </div>

    <div class="action">

        {{-- EDIT --}}
        <form
            action="{{ route('notes.edit',$index) }}"
            method="GET">

            <button
                class="edit">

                <i class="bi bi-pencil-square"></i>

                Edit

            </button>

        </form>

        {{-- HAPUS --}}
        <form
            action="{{ route('notes.destroy',$index) }}"
            method="POST">

            @csrf

            @method('DELETE')

            <button
                class="delete"
                onclick="return confirm('Yakin ingin menghapus catatan ini?')">

                <i class="bi bi-trash-fill"></i>

                Hapus

            </button>

        </form>

    </div>

</div>

@endforeach

@else

<div class="card">

    <div class="empty">

        <i class="bi bi-journal-x"></i>

        <h2>Belum Ada Catatan</h2>

        <p>

            Tambahkan catatan pertamamu menggunakan form di atas.

        </p>

    </div>

</div>

@endif
{{-- FOOTER --}}
<div class="footer">

    © {{ date('Y') }} My Notes • Dibuat menggunakan Laravel ❤️

</div>

</div>

<script>

const themeBtn = document.querySelector(".theme-btn");

let dark = false;

themeBtn.addEventListener("click", function(){

    dark = !dark;

    if(dark){

        document.body.style.background="#111827";

        document.querySelectorAll(".card").forEach(function(card){

            card.style.background="#1F2937";
            card.style.color="white";

        });

        document.querySelectorAll(".note").forEach(function(note){

            note.style.background="#374151";
            note.style.color="white";

        });

        document.querySelector(".title h1").style.color="white";

        document.querySelector(".subtitle").style.color="#D1D5DB";

        document.querySelector(".footer").style.color="#D1D5DB";

        themeBtn.innerHTML='<i class="bi bi-sun-fill"></i>';

    }else{

        location.reload();

    }

});

</script>

</body>

</html>