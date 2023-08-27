<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DISKEMINFOSTAN X METHODIST</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous') }}"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body id="page-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#"><img id="MDB-logo" src="{{ asset('assets/img/logox.png') }}"
                    alt="MDB Logo" draggable="false" height="70" /></a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <a class="btn btn-dark btn-sm" href="{{ route('landingpage') }}">Kembali</a>

        </div>
    </nav>
    <!-- Navbar -->



    <!-- Portfolio Grid-->
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-8">
                <div class="card custom-card custom-transpatant-card">
                    <div class="card-header">
                        <h1>{{ $news->judul }}</h1>
                        <p class="card-text ">Tanggal: {{ $news->tanggal }}</p>
                        <p class="card-text">Sumber: {{ $news->sumber }}</p>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('gambarberita/'.$news->gambar) }}" alt="{{ $news->judul }}" class="img-fluid mb-3">
                        <div class="card-text text-justify">{!! nl2br(e($news->deskripsi)) !!}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="p-2 text-center">
                            <h6>KOMENTAR</h6>
                        </div>
                        <form action="{{ route('Komentar.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="news_id" value="{{$news->id}}"/>
                            <div class="mt-3 d-flex flex-row align-items-center p-1 form-color">
                                <input type="text" name="komentar" class="form-control" placeholder="Enter your comment...">
                                <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false"
                                    autocomplete="off" id="btn-kirim">Kirim</button>
                            </div>
                        </form>
                        <div class="mt-2">
                            <div class="card custom-card">
                                <div class="p-3">
                                    @foreach ($berita->sortByDesc('created_at') as $comment)
                                        <div class="comment border p-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center">
                                                    <span class="mr-2 text-muted font-color-blue">{{ $comment->nama }}</span>
                                                </div>
                                                <div class="text-end">
                                                    @if ($comment->created_at)
                                                        <p class="text-muted mb-0">{{ $comment->created_at->format('d M Y H:i') }}</p>
                                                    @else
                                                        <p class="text-muted mb-0">No Date</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="comment-text mb-0">
                                                <p class="limited-text">{{ implode(' ', array_slice(explode(' ', $comment->komentar), 0, 10)) }}...</p>
                                                <p class="full-text" style="display: none;">{{ $comment->komentar }}</p>
                                                @if(str_word_count($comment->komentar) > 15)
                                             <button class="btn btn-link read-more-btn text-muted">Baca Selengkapnya</button>
                                                 @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    
                        <!-- Sertakan perpustakaan jQuery dan Bootstrap JavaScript -->
                        <script src="path/to/jquery.min.js"></script>
                        <script src="path/to/bootstrap.min.js"></script>
                    
                        <!-- Script JavaScript untuk "Baca Selengkapnya" -->
                        <script>
                            $(document).ready(function() {
                                $(".read-more-btn").on("click", function() {
                                    var limitedText = $(this).siblings(".limited-text");
                                    var fullText = $(this).siblings(".full-text");
                        
                                    limitedText.toggle();
                                    fullText.toggle();
                        
                                    if (limitedText.is(":visible")) {
                                        $(this).text("Baca Selengkapnya");
                                    } else {
                                        $(this).text("Tutup");
                                    }
                                });
                            });
                        </script>
                        
                        
                    </div>
                </div>
            </div>
            
            </div>
            
            

    <!-- Contact-->

    <!-- * * * * * * * * * * * * * * *-->
    <!-- * * SB Forms Contact Form * *-->
    <!-- * * * * * * * * * * * * * * *-->
    <!-- This form is pre-integrated with SB Forms.-->
    <!-- To make this form functional, sign up at-->
    <!-- https://startbootstrap.com/solution/contact-forms-->
    <!-- to get an API token!-->

    <!-- Footer-->
    <footer class="footer py-4 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
        
    </footer>
    
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->

    <!-- Bootstrap core JS-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="{{ asset('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>

</html>